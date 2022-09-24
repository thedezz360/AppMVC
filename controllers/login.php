<?php
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        error_log('Login::construct -> inicio de login');
    }

    function render(){
        error_log('Login::render -> carga el index de login');
        $this->view->render('login/index');
    }
}
