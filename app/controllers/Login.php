<?php

session_start();

class Login extends Controller{

    public function index(){
        session_destroy();
        $this->view('template/header');
        $this->view('login/login');
        $this->view('template/footer');
    }


    public function session(){
        $data = $this->model('User')->login($_POST);
        $result = $data['result'];
        if($result == "ADMIN"){
            $_SESSION['admin'] = true;
            header('Location: http://localhost/tubes/public/Admin/index');
        }else if ($result == "ASISTEN"){
            $_SESSION['asisten'] = true;
            header('Location: http://localhost/tubes/public/Asisten/index');
        }else if ($result == "PRAKTIKAN"){
            $_SESSION['praktikan'] = true;
            header('Location: http://localhost/tubes/public/Praktikan/index');
            exit;
        }
        else {
            $_SESSION['login'] = false;
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }
}