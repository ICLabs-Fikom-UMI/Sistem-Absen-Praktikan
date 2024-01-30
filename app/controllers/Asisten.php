<?php


class Asisten extends Controller {

    public function index(){
        $this->view('template/asisten/headerDashoard');
        $this->view('asisten/dashboardAsisten');
        $this->view('template/asisten/footer');
    }

    public function Kehadiran(){

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

    public function daftarPerizinan(){
        $data['mhs'] = $this->model('User')->daftarPerizinan($_POST);
        $this->view('asisten/daftarperizinanAsisten', $data);
    }

    public function perizinan(){
        $this->model('User')->buatPerizinan($_POST, $_FILES);
        $this->view('asisten/perizinanAsisten');
    }

    public function barkode(){
        $data = $this->model('User')->buatBarcode($_POST);

        $this->view('asisten/buatbarcodeAsisten', $data);
    }

    public function scan(){
        $this->view('asisten/scanAsisten');
    }

    public function data(){
        $data = $_POST['data'];
        $this->model('User')->updateAbsen($data);
    }


}