<?php namespace Controllers\Admin\Api\V1;

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Laracasts\Validation\FormValidationException;
use Pardisan\Commands\User\Exceptions\InvalidOldPasswordException;
use Pardisan\Repositories\Exceptions\RepositoryException;

class UserController extends BaseController
{
    protected $request;
    protected $auth;
    protected $lang;

    /**
     * @param Request $request
     * @param AuthManager $auth
     * @param Translator $lang
     */
    public function __construct(
        Request $request,
        AuthManager $auth,
        Translator $lang
    ){
        $this->request = $request;
        $this->auth = $auth;
        $this->lang = $lang;
    }

    /**
     * Update current user
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function profileUpdate()
    {
        $updateData = $this->request->only(
            'name',
            'username',
            'password',
            'email',
            'old_password',
            'password_confirmation',
            'voip_id',
            'phone'
        );

        try {

            $user = $this->execute(
                'Pardisan\Commands\User\ProfileUpdateCommand',
                $updateData
            );

            return $this->responseJson($user, 200);

        }catch (RepositoryException $e){

            return $this->responseJson(['errors' => [[$this->lang->get('messages.repository_error')]]], 422);

        }catch(FormValidationException $e){

            return $this->responseJson(['errors' => $e->getErrors()], 422);

        }catch(InvalidOldPasswordException $e){

            return $this->responseJson(['errors' => [[$this->lang->get('messages.user.invalid_old_password')]]], 422);

        }
    }
} 
