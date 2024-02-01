<?php
session_start();

class Asisten extends Controller {

    public function index(){
        if($_SESSION['asisten']){
            $this->view('template/asisten/headerDashoard');
            $this->view('asisten/dashboardAsisten');
            $this->view('template/asisten/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function Kehadiran(){

        if($_SESSION['asisten']){
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

            $this->view('template/asisten/headerDaftarKehadiran');
            $this->view('asisten/daftarkehadiranAsisten', $data);
            $this->view('template/asisten/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function daftarPerizinan(){
        if($_SESSION['asisten']){
            $data['mhs'] = $this->model('User')->daftarPerizinan($_POST);
            $this->view('asisten/daftarperizinanAsisten', $data);
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function perizinan(){
        if($_SESSION['asisten']){
            $this->model('User')->buatPerizinan($_POST, $_FILES);
            $this->view('asisten/perizinanAsisten');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function barkode(){
        if($_SESSION['asisten']){
            $data = $this->model('User')->buatBarcode($_POST);

            $this->view('asisten/buatbarcodeAsisten', $data);
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function scan(){
        if($_SESSION['asisten']){
            $this->view('asisten/scanAsisten');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function data(){
        $data = $_POST['data'];
        $this->model('User')->updateAbsen($data);
    }

    public function deleteData($stb){
        $this->model('User')->deleteAbsen($stb);
        $this->Kehadiran();
    }


}