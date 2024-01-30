<?php

class Login extends Controller{

    public function index(){
        $this->view('template/login/header');
        $this->view('login/login');
        $this->view('template/login/footer');
    }

}