<?php

class viewDataMahasiswa {
    private $no;
    private $stb;
    private $nama;
    private $kelas;


    public function setNo($no){
        $this->no = $no;
    }

    public function getNo(){
        return $this->no;
    }

    public function setStb($stb){
        $this->stb = $stb;
    }

    public function getStb(){
        return $this->stb;
    }

    public function setNama($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }

    public function setKelas($kelas){
        $this->kelas = $kelas;
    }

    public function getKelas(){
        return $this->kelas;
    }
}

?>