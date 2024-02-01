<?php

session_start();

class Admin extends Controller {

    public function index(){
        if($_SESSION['admin']){
            $this->view('template/admin/headerDashboard');
            $this->view('admin/dashboardadmin');
            $this->view('template/admin/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function inputData(){

        if($_SESSION['admin']){
            $this->model('User')->insertData($_POST);

            $this->view('template/admin/headerInputData');
            $this->view('admin/inputdata');
            $this->view('template/admin/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function dataMahasiswa(){
        if($_SESSION['admin']){
            $search = $_POST['cari'];
            $data['mhs'] = $this->model('User')->getDataMahasiswa($search);
            $this->view('template/admin/headerDataMahasiswa');
            $this->view('admin/datamahasiswaAdmin', $data);
            $this->view('template/admin/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
        
    }

    public function daftarAbsen(){
        if($_SESSION['admin']){
            $data['mhs'] = $this->model('User')->getDataAbsen($_POST);
            $groupedData = array();

            foreach ($data['mhs'] as $value) {
                $key = $value['nama'] . '-' . $value['stb'] . '-' . $value['kelas'];

                if (!isset($groupedData[$key])) {
                    $groupedData[$key] = array(
                        'nama' => $value['nama'],
                        'stb' => $value['stb'],
                        'kelas' => $value['kelas'],
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

            $this->view('template/admin/headerDaftarkehadiran');
            $this->view('admin/daftarkehadiranAdmin', $data);
            $this->view('template/admin/footer');
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }

        
    }

    public function daftarPerizinan(){

        if($_SESSION['admin']){
            $data['mhs'] = $this->model('User')->daftarPerizinan($_POST);

            $this->view('template/admin/headerDafterPerizinan');
            $this->view('admin/daftarperizinanAdmin', $data);
            $this->view('template/admin/footer');   
        }else {
            header('Location: http://localhost/tubes/public/Login/index');
        }

       
    }


}