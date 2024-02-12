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
            $_SESSION['stb'] = $_POST['stb'];
            $_SESSION['frekuensi'] = $_POST['frekuensi'];

            $_SESSION['campur'] = $_POST;

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


    public function viewUpdateDataMahasiswa($stb, $frekuensi){
        $data['mhs'] = $this->model('User')->getDataMahasiswaByStb($stb, $frekuensi);
        $this->view('template/header');
        $this->view('admin/editDataMahasiswa', $data);
        $this->view('template/footer');
    }

    public function updateDataMahasiswa(){
        $this->model('User')->updateDataMahasiswa($_POST);
        $this->dataMahasiswa();
    }

    public function viewImagePerizinan($data){
        $this->view('template/header');
        $this->view('admin/viewImagePerizinan', $data);
        $this->view('template/footer');
    }

    public function cetak(){
        $data['mhs'] = $this->model('User')->getDataAbsen($_SESSION);

        $groupedData = array();
        
        foreach ($data['mhs'] as $value) {
            $key = $value['nama'] . '-' . $value['stb'] . '-' . $value['kelas'] . '-' . $value['frekuensi'];
        
            if (!isset($groupedData[$key])) {
                $groupedData[$key] = array(
                    'nama' => $value['nama'],
                    'stb' => $value['stb'],
                    'kelas' => $value['kelas'],
                    'frekuensi' => $value['frekuensi'],
                    'status' => array_fill(0, 10, ''), // Inisialisasi status dengan array kosong
                    'alpa' => 0,
                    'izin' => 0,
                    'sakit' => 0,
                    'hadir' => 0
                );
            }
        
            $index = array_search('', $groupedData[$key]['status']);
        
            if ($index !== false) {
                $groupedData[$key]['status'][$index] = $value['status'];
        
                // Memeriksa status dan menghitung jumlahnya
                if ($value['status'] == 'A') {
                    $groupedData[$key]['alpa']++;
                } elseif ($value['status'] == 'I') {
                    $groupedData[$key]['izin']++;
                } elseif ($value['status'] == 'S') {
                    $groupedData[$key]['sakit']++;
                } elseif ($value['status'] == 'H') {
                    $groupedData[$key]['hadir']++;
                }
            }
        }
        
        $groupedData = array_values($groupedData);
        
        $data['mhst'] = $groupedData;

        $this->view('template/header');
        $this->view('admin/cetak', $data);
        $this->view('template/footer');
    }
}