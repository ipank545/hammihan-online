<?php namespace Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

class BaseController extends \Controller {

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
            "~{$replaceable}(?!.*{$replaceable})~", "{$locale}{$delimiter}{$replaceable}", $name
        );

        if (View::exists($replaced)){
            return $replaced;
        }
        return $name;

    }

}
