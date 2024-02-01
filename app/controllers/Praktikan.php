<?php

session_start();

class Praktikan extends Controller{


    public function index(){
        if($_SESSION['praktikan']){
            $this->view('praktikan/dashboarprak');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function perizinan(){
        if($_SESSION['praktikan']){
            $this->model('User')->buatPerizinan($_POST, $_FILES);
            $this->view('praktikan/perizinanPrak');
        }else{
            header('Location: http://localhost/tubes/public/Login/index');
        }
       
    }

    public function barcode(){
        if($_SESSION['praktikan']){
            $data = $this->model('User')->buatBarcode($_POST);
            $this->view('praktikan/buatbarcodePrak', $data);
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }
}