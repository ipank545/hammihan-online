<?php namespace Controllers; 

use Laracasts\Commander\CommanderTrait;

class HomeController extends BaseController
{
    use CommanderTrait;

    public function index()
    {
        $cats = $this->execute('Pardisan\Commands\Article\HomePageCommand');
        return $this->view('hammihan.pages.home.index', ['cats' => $cats]);
    }
} 
