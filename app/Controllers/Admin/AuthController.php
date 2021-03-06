<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Translation\Translator;
use Laracasts\Validation\FormValidationException;
use Pardisan\Commands\Auth\Exceptions\InvalidCredentialsException;

class AuthController extends BaseController
{
    /**
     * @var AuthManager
     */
    protected $auth;

    /**
     * @var Translator
     */
    protected $trans;


    /**
     * @var Request
     */
    protected $request;

    /**
     * @param AuthManager $authManager
     * @param Translator $trans
     * @param Request $request
     */
    public function __construct(
        AuthManager $authManager,
        Translator $trans,
        Request $request
    ){
        $this->auth = $authManager;
        $this->trans = $trans;
        $this->request = $request;
    }

    /**
     * Login page for system users
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->view('salgado.pages.auth.signin');
    }

    /**
     * Do user system login here
     *
     * @return mixed
     */
    public function postLogin()
    {
        $credentials = $this->request->only([
            'identifier',
            'password',
            'remember'
        ]);

        try {

            $this->execute('Pardisan\Commands\Auth\LoginCommand', $credentials);

            return $this->redirectIntended()->with(
                'success_message',
                $this->trans->get(
                    'messages.auth.success_login',
                    ['user' => Auth::user()->identifier()]
                )
            );

        }catch(FormValidationException $e){

            return $this->redirectBack()->withErrors($e->getErrors());

        }catch(InvalidCredentialsException $e){

            return $this->redirectBack()->with(
                'error_message',
                $this->trans->get("messages.auth.{$e->getLangKey()}")
            );

        }

    }

    /**
     * Logout user
     *
     * @return mixed
     */
    public function getLogout()
    {
        $this->auth->logout();

        return $this->redirectRoute('admin.auth.get_login')->with(
            'success_message',
            $this->trans->get('messages.auth.success_logout')
        );
    }
} 
