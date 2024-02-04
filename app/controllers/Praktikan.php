<?php

session_start();

class Praktikan extends Controller{


    public function index(){
        if($_SESSION['praktikan']){
            $this->view('template/header');
            $this->view('praktikan/perizinan');
            $this->view('template/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function perizinan(){
        if($_SESSION['praktikan']){
            $this->model('User')->buatPerizinan($_POST, $_FILES);
            // $this->view('praktikan/perizinanPrak');
            $this->view('template/header');
            $this->view('praktikan/perizinan');
            $this->view('template/footer');
        }else{
            header('Location: http://localhost/tubes/public/Login/index');
        }
       
    }

    public function barcode(){
        if($_SESSION['praktikan']){
            $data = $this->model('User')->buatBarcode($_POST);
            // $this->view('praktikan/buatbarcodePrak', $data);
            $this->view('template/header');
            $this->view('praktikan/barcode', $data);
            $this->view('template/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }
}