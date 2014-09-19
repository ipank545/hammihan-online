<?php namespace Controllers\Admin; 

use Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index(){
        return $this->view('salgado.pages.dashboard.dash');
    }
} 
