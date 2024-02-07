<?php

session_start();

class Admin extends Controller {

    public function index(){
        if($_SESSION['admin']){
            $this->view('template/header');
            $this->view('admin/inputDataMahasiswa');
            $this->view('template/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function inputData(){
        if($_SESSION['admin']){
            $this->model('User')->insertData($_POST);
            $this->view('template/header');
            $this->view('admin/inputDataMahasiswa');
            $this->view('template/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function inputDataPraktikum(){
        if($_SESSION['admin']){
            if(!$_POST == NULL){
                $this->model('User')->insertDataPraktikum($_POST);
            }
            $this->view('template/header');
            $this->view('admin/inputDataPraktikum');
            $this->view('template/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function dataMahasiswa(){
        if($_SESSION['admin']){
            $search = $_POST['cari'];
            $data['mhs'] = $this->model('User')->getDataMahasiswa($search);

            $this->view('template/header');
            $this->view('admin/dataMahasiswa', $data);
            $this->view('template/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function daftarAbsen(){
        if($_SESSION['admin']){

            $data['mhs'] = $this->model('User')->getDataAbsen($_POST);
            $groupedData = array();

            foreach ($data['mhs'] as $value) {
                $key = $value['nama'] . '-' . $value['stb'] . '-' . $value['kelas'] . '-' . $value['frekuensi'];

                if (!isset($groupedData[$key])) {
                    $groupedData[$key] = array(
                        'nama' => $value['nama'],
                        'stb' => $value['stb'],
                        'kelas' => $value['kelas'],
                        'frekuensi' => $value['frekuensi'],
                        'status' => array_fill(0, 10, '') 
                    );
                }

                $index = array_search('', $groupedData[$key]['status']);

                if ($index !== false) {
                    $groupedData[$key]['status'][$index] = $value['status'];
                }
            }

            $groupedData = array_values($groupedData);
            
            $data['mhst'] = $groupedData;

            $this->view('template/header');
            $this->view('admin/daftarKehadiran', $data);
            $this->view('template/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }

        
    }

    public function daftarPerizinan(){

        if($_SESSION['admin']){
            $data['mhs'] = $this->model('User')->daftarPerizinan($_POST);

            $this->view('template/header');
            $this->view('admin/daftarPerizinan', $data);
            $this->view('template/footer');  
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function viewUpdateDataAbsen($stb, $frekuensi){
        if($_SESSION['admin']){

            $data['mhs'] = $this->model('User')->getDataAbsenForUpdate($stb, $frekuensi);

            $groupedData = array();

            foreach ($data['mhs'] as $value) {
                $key = $value['nama'] . '-' . $value['stb'] . '-' . $value['kelas'] . '-' . $value['frekuensi'];

                if (!isset($groupedData[$key])) {
                    $groupedData[$key] = array(
                        'nama' => $value['nama'],
                        'stb' => $value['stb'],
                        'kelas' => $value['kelas'],
                        'frekuensi' => $value['frekuensi'],
                        'status' => array_fill(0, 10, '') 
                    );
                }

                $index = array_search('', $groupedData[$key]['status']);

                if ($index !== false) {
                    $groupedData[$key]['status'][$index] = $value['status'];
                }
            }

            $groupedData = array_values($groupedData);
            
            $data['mhst'] = $groupedData;

            $this->view('template/header');
            $this->view('admin/editDataAbsen', $data);
            $this->view('template/footer');  
        }
    }

    public function deleteData($stb){
        $this->model('User')->deleteAbsen($stb);
        $this->daftarAbsen();
    }

    public function deleteDataMahasiswa($stb){
        $this->model('User')->deleteDatamahasiswa($stb);
        $this->dataMahasiswa();  
    }

    public function updateDataAbsen(){
        $this->model('User')->updateDataAbsen($_POST);
        $this->daftarAbsen();
    }

    public function updateDataMahasiswa(){
        $this->model('User')->updateDataMahasiswa($_POST);
        $this->dataMahasiswa();
    }
}