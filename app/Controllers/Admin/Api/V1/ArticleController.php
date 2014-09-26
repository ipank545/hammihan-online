<?php namespace Controllers\Admin\Api\V1;

use Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Translation\Translator;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\RepositoryException;
use Illuminate\Auth\AuthManager;

class ArticleController extends BaseController {

    use CommanderTrait;

    /**
     * @var AuthManager
     */
    protected $auth;
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @param Request $request
     * @param Translator $lang
     */
    public function __construct(
        Request $request,
        Translator $lang
    ){
        $this->request = $request;
        $this->lang = $lang;

    }

    /**
     * Store an article in db
     */
    public function store()
    {
        sleep(2);
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


        try {
            $created = $this->execute(
                'Pardisan\Commands\Article\NewCommand',
                $input
           );

            return $this->responseJson($created, 200);

        }catch (RepositoryException $e){

            return $this->responseJson(['errors' => [[$this->lang->get('messages.repository_error')]]], 422);

        }catch (FormValidationException $e){

            return $this->responseJson(['errors' => $e->getErrors()], 422);

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
            'publish_date',
            'category'
        );

        $updateData[ 'status_id' ] = 1;
        $updateData[ 'user_id' ] = Auth::user()->id;
        print_r($updateData['id']);
       // try {

          //  $article = $this->execute(
          //      'Pardisan\Commands\Article\EditCommand',
          //      $updateData
         //   );

         //   return $this->responseJson($article, 200);

      //  }catch (RepositoryException $e){

      //      return $this->responseJson(['errors' => [[$this->lang->get('messages.repository_error')]]], 422);

      //  }catch(FormValidationException $e){

     //       return $this->responseJson(['errors' => $e->getErrors()], 422);

     //   }
    }
} 