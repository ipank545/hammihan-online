<?php namespace Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Laracasts\Commander\CommanderTrait;

class BaseController extends \Controller {

    /**
     * Laracasts Commander package
     */
    use CommanderTrait;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    /**
     * Translate view name
     *
     * @param $name
     * @param string $delimiter
     * @return string
     */
    protected function translateView($name, $delimiter = '.')
    {
        $locale = App::getLocale();
        $explodedName = (array) explode($delimiter, $name);

        $replaceable  = end($explodedName);
        $replaced = preg_replace(
            "~{$replaceable}(?!.*{$replaceable})~",
            "{$locale}{$delimiter}{$replaceable}",
            $name
        );

        if (View::exists($replaced)){
            return $replaced;
        }

        return $name;
    }

    /**
     * Redirect to a route with params
     *
     * @param $route
     * @param array $params
     * @return mixed
     */
    protected function redirectRoute($route, array $params = null)
    {
        return Redirect::route($route, $params);
    }

    /**
     * Redirect back
     *
     * @return mixed
     */
    protected function redirectBack()
    {
        return Redirect::back();
    }

    /**
     * Redirect to last page user has been , Redirect::guest()
     * should be used to put the callback url in session
     *
     * @return mixed
     */
    protected function redirectIntended()
    {
        return Redirect::intended('admin/dash');
    }

    /**
     * Redirect to a defined address
     *
     * @param $url
     * @return mixed
     */
    protected function redirectTo($url)
    {
        return Redirect::to($url);
    }

    /**
     * Create view
     *
     * @param $bladeablePath
     * @param $data
     * @return mixed
     */
    protected function view($bladeablePath, $data = [])
    {
        return View::make($bladeablePath, $data);
    }

    /**
     * Send json responses
     *
     * @param $data
     * @param int $status
     * @return Response
     */
    protected function responseJson($data, $status = 200)
    {
        return Response::json($data, $status);
    }

}
