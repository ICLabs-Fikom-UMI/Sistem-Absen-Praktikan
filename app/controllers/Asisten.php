<?php
session_start();

class Asisten extends Controller {

    public function index(){
        if($_SESSION['asisten']){
            $this->view('template/header');
            $this->view('asisten/daftarKehadiran', $data);
            $this->view('template/footer');
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
            $this->view('asisten/daftarKehadiran', $data);
            $this->view('template/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function daftarPerizinan(){
        if($_SESSION['asisten']){
            $data['mhs'] = $this->model('User')->daftarPerizinan($_POST);
            
            $this->view('template/header');
            $this->view('asisten/daftarPerizinan', $data);
            $this->view('template/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function viewUpdateDataAbsen($stb, $frekuensi){
        if($_SESSION['asisten']){

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
            $this->view('asisten/editDataAbsen', $data);
            $this->view('template/footer');  
        }
    }

    public function uploadGambar($image){

        $directory = '../public/img/uploads/';

        $namaFile = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $error =  $_FILES['file']['error'];
        $tempName = $_FILES['file']['tmp_name'];
      
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
          echo "<script>
                    alert('jenis file tidak valid');
                </script>";
                return false;
        }
        echo $ekstensiGambar;
      
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
      
        echo $namaFileBaru;

        if(file_exists($directory)){
            echo "folder tesedia";
        }else {
            echo "tidak tersedia";
        }
        
      
        $error =  $_FILES['gambar']['error'];
            // Lanjutkan proses unggahan file
            $move = move_uploaded_file($tempName, $directory . $namaFileBaru);
            if ($move) {
                echo "berhasil";
            } else {
                echo "Gagal menyimpan file";
            }
      
        
        return $namaFileBaru;
    }

    public function perizinan(){
        if($_SESSION['asisten']){
            $this->uploadGambar($_FILES);
            // $this->model('User')->buatPerizinan($_POST, $_FILES);
            $this->view('template/header');
            $this->view('asisten/perizinan');
            $this->view('template/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function barkode(){
        if($_SESSION['asisten']){
            $data = $this->model('User')->buatBarcode($_POST);

            $this->view('template/header');
            $this->view('asisten/barcode', $data);
            $this->view('template/footer');
        }
        else {
            header('Location: http://localhost/tubes/public/Login/index');
        }
    }

    public function scan(){
        if($_SESSION['asisten']){
            $this->view('template/header');
            $this->view('asisten/scan');
            $this->view('template/footer');
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

    public function updateData(){
        $this->model('User')->updateDataAbsen($_POST);
        $this->Kehadiran();
    }


}