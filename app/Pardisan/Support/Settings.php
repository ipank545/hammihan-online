<?php namespace Pardisan\Support;

use Carbon\Carbon;
use Illuminate\Config\Repository;
use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Translation\Translator;
use Illuminate\View\Factory as View;
use Miladr\Jalali\jDate;

class Settings {

    /**
     * Query parameter for defining lang
     *
     * @var string
     */
    const LANG_QUERY_PARAM = 'lang';

    /**
     * Name of locale variable in session
     *
     * @var string
     */
    const SESSION_LOCALE = 'locale';

    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @var View
     */
    protected $view;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Repository
     */
    protected $config;

    /**
     * @param Translator $translator
     * @param View $view
     * @param Application $app
     * @param Request $request
     * @param Router $router
     * @param Repository $config
     * @param SessionManager $session
     */
    public function __construct(
        Translator $translator,
        View $view,
        Application $app,
        Request $request,
        Router $router,
        Repository $config,
        SessionManager $session
    ){
        $this->lang = $translator;
        $this->view = $view;
        $this->app = $app;
        $this->input = $request;
        $this->router = $router;
        $this->config = $config;
        $this->session = $session;
    }

    /**
     * Perform some jobs to set application settings
     *
     * @return void
     */
    public function perform ()
    {
        $this->setLocale();
        $this->setViewVariables();
    }

    /**
     * Set app locale if we have a query parameter named
     * lang then it will be used else we check for sub domain
     * If nothing found fallback will be used
     *
     * @return void
     */
    private function setLocale()
    {
        $availableLangs = $this->config->get('app.available_languages',[]);
        if ($this->input->has('lang')){
            $lang = $this->input->input('lang');
            if (in_array($this->input->input('lang'), $availableLangs)){
                $this->app->setLocale($lang);
                Session::put(self::SESSION_LOCALE, $lang);
                return;
            }
        }

        $subDomain = $this->router->getCurrentRoute();
        if (! empty($subDomain)) {
            $subDomain = $subDomain->getParameter('locale');
            $this->app->setLocale($subDomain);
            return;
        }

        if ($this->session->has(self::SESSION_LOCALE)){
            $this->app->setLocale(
                $this->session->get(self::SESSION_LOCALE)
            );
            return;
        }
    }

    /**
     * Share view variables
     *
     * @return void
     */
    private function setViewVariables()
    {
        $this->view->share(
            'defaultTitle',
            $this->lang->get('default_title')
        );

        $this->view->share(
            'defaultAdminTitle',
            $this->lang->get('default_admin_title')
        );

        $this->view->share(
            'defaultDescription',
            $this->lang->get('default_description')
        );

        $this->view->share(
            'defaultAdminDescription',
            $this->lang->get('default_admin_description')
        );

        $this->shareDates();
        $this->shareUser();
    }

    /**
     * Share view variables
     *
     * @return void
     */
    private function shareDates(){
        $now = jDate::forge();
        $nowGregorian = Carbon::createFromTimestamp(time())->format('%d %B %Y');

        $this->view->share(
            'currentJalaliDate',
            $now->format('%d %B %Y')
        );

        $this->view->share(
            'currentGregorianDate',
            $nowGregorian
        );
    }

    /**
     * Share current user in view
     *
     * @return null || User
     */
    private function shareUser()
    {
        $this->view->share(
            'currentUser',
            $this->app['auth']->check() ? $this->app['auth']->user() : null
        );
    }
} 
