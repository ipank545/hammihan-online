<?php namespace Pardisan\Commands\Article;

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

/**
 * @property mixed publish_date
 */
class NewCommandHandler extends AbstractCommandHandler implements CommandHandler {

    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepo;

    protected $date;
    /**
     * @param ArticleRepositoryInterface $article
     */
    public function __construct(ArticleRepositoryInterface $article){

        $this->articleRepo = $article;
    }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {

        $command->url_slug = null;
        $command->status_id = null;
        $this->publish_date = $this->convertPublishDate();
        return $this->articleRepo->createRaw(get_object_vars($command));
    }

    /**
     * @param $pdate
     * @return string
     */
    public function convertPublishDate()
    {
        $jdate = array();
        $jd = '';
        $jt = '';
        $d = $this->command->publish_date;
        $jdate=preg_split ( '/ /', $d );

        $jd=$jdate[0];  //date
        $jt=$jdate[1];  //time
        $jd=$this->jalali_to_gregorian($jd);
        $publish_date = $jd ."  ".$jd;

        return $publish_date;
    }

    function jalali_to_gregorian($jdate){

        list( $j_y, $j_m, $j_d ) = preg_split ( '/-/', $jdate );

        $mod='-';
        $d_4=($j_y+1)%4;
        $doy_j=($j_m<7)?(($j_m-1)*31)+$j_d:(($j_m-7)*30)+$j_d+186;
        $d_33=(int)((($j_y-55)%132)*.0305);
        $a=($d_33!=3 and $d_4<=$d_33)?287:286;
        $b=(($d_33==1 or $d_33==2) and ($d_33==$d_4 or $d_4==1))?78:(($d_33==3 and $d_4==0)?80:79);
        if((int)(($j_y-19)/63)==20){$a--;$b++;}
        if($doy_j<=$a){
            $gy=$j_y+621; $gd=$doy_j+$b;
        }else{
            $gy=$j_y+622; $gd=$doy_j-$a;
        }
        foreach(array(0,31,($gy%4==0)?29:28,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
            if($gd<=$v)break;
            $gd-=$v;
        }
        return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;
    }

}