<?php

class Praktikan extends Controller{


    public function index(){
        $this->view('praktikan/dashboarprak');
    }

    public function perizinan(){
        $this->model('User')->buatPerizinan($_POST, $_FILES);
        $this->view('praktikan/perizinanPrak');
    }

    public function barcode(){
        $data = $this->model('User')->buatBarcode($_POST);
        $this->view('praktikan/buatbarcodePrak', $data);
    }
}