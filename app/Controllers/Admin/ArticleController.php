<?php namespace Controllers\Admin;

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Translation\Translator;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;
use Pardisan\Repositories\Eloquent\ArticleRepository;
use Symfony\Component\CssSelector\Exception\ExpressionErrorException;

class ArticleController extends BaseController {

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var AuthManager
     */
    protected $auth;

    /**
     * @var Translator
     */
    protected $lang;


    protected $artcl;
    /**
     * @param Request $request
     * @param AuthManager $auth
     * @param Translator $lang
     */
    public function __construct(
        Request $request,
        AuthManager $auth,
        Translator $lang,
        ArticleRepositoryInterface $artcl
    ){
        $this->request = $request;
        $this->auth = $auth;
        $this->lang = $lang;
        $this->artcl = $artcl;
    }

    /**
     * Storing an article in repository
     *
     * @return Redirect
     */
    public function store()
    {
        $input = $this->request->only(
            'first_title',
            'second_title',
            'important_title',
            'summary',
            'body',
            'publish_date',
            'status_id',
            'author',
            'category'
        );
        
        $input['user_id'] = Auth::user()->id;
        $input['publish_date'] = $this->jalali_to_gregorian($input['publish_date']);

         try {

            $newArticle = $this->execute('Pardisan\Commands\Article\NewCommand', $input);

            return $this->redirectRoute('admin.articles.index');
               // ->with(
               // 'success_message',
               // $this->lang->get('messages.articles.success_store', ['article_id' => $newArticle->id])
           // );


        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors())->withInput();

        }

    }

    public function delete($id)
    {

        $id = (array)$id;
        try {

            $deleted = $this->execute(
                'Pardisan\Commands\Article\DeleteCommand',
                ['deleteables' => $id]
            );

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get('حذف با موفقیت انجام شد')
            );

        } catch (NotFoundException $e) {

            App::abort(404);

        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());

        } catch (RepositoryException $e) {

            return $this->redirectBack()->with(
                'error_message',
                $this->lang->get(
                    'messages.roles.single_delete_relation_error',
                    ['article_id' => $id[0]]
                )
            );

        }

    }


    public function showAll()
    {

        try {

            $articles = $this->artcl->getAll();

        return $this->view('salgado.pages.article.index')->with(
                'articles',$articles
            );
        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());
        }
    }

    /**
     * Delete a role from repo
     *
     * @return Redirect
     */
    public function bulkDelete()
    {
        $deletables = $this->request->input('selectable',[]);

        try {

            $count = $this->execute(
                'Pardisan\Commands\Article\DeleteCommand',
                ['deleteables' => $deletables]
            );

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get(
                    'آیتم (ها)با موفقیت حذف شدند',
                    ['count' => $count]
                )
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }catch(FormValidationException $e){

            return $this->redirectBack()->withErrors($e->getErrors());

        }catch(RepositoryException $e){

            return $this->redirectBack()->with(
                'error_message',
                $this->lang->get('messages.articles.bulk_delete_relation_error')
            );

        }
    }


    public function update()
    {
        $updateData = $this->request->only(
            'id',
            'first_title',
            'important_title',
            'second_title',
            'body',
            'summary',
            'author',
            'publish_date'

        );

        $updateData[ 'status_id' ] = null;
       // $updateData[ 'user_id' ] = Auth::user()->id;
        $updateData[ 'publish_date' ] = $this->jalali_to_gregorian($updateData['publish_date']);
         try {

             $update_article = $this->execute(
              'Pardisan\Commands\Article\EditCommand',
              $updateData
           );
                 return $this->redirectRoute('admin.articles.index')->with(
                     'success_message',
                     'ویرایش با موفقیت انجام شد'
                 );
             } catch (FormValidationException $e) {

                 return $this->redirectBack()->withErrors($e->getErrors())->withInput();
             }
    }

    function jalali_to_gregorian($publish_date){

        $pdate = explode(" ",$publish_date);
        $plist = explode("-", $pdate[0]);
        $year  = $plist[0];
        $month = $plist[1];
        $day   = $plist[2];

        $j_y = $year;
        $j_m = $month;
        $j_d = $day;

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
        $jdate = ($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;

        return $jdate ." ".$pdate[1];
    }

} 