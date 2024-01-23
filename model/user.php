<?php


class user {
    private $stb;
    private $name;
    private $password;
    private $jenisUser;
    private $frekuensi;
    private $kode_kelas;



    public function setStb($stb){
        $this->stb = $stb;
    }

    public function getStb(){
        return $this->stb;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }


    public function setJenisUser($jenisUser){
        $this->jenisUser = $jenisUser;
    }

    public function getJenisUser(){
        return $this->jenisUser;
    }


    public function setFrekuensi($frekuensi){
        $this->frekuensi = $frekuensi;
    }

    public function getFrekuensi(){
        return $this->frekuensi;
    }

    public function setKodeKelas($kodeKelas){
        $this->kodeKelas = $kodeKelas;
    }

    public function getKodeKelas(){
        return $this->kodeKelas;
    }
}

?>