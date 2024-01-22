<?php


class frekuensiMatkul {
    private $frekuensi;
    private $kodeRuangan;
    private $kodeAsisten;
    private $kodeAsistenKedua;
    private $kodeMatkul;
    private $hari;
    private $diMulai;
    private $berakhir;


    public function setFrekuensi($frekuensi){
        $this->frekuensi = $frekuensi;
    }

    public function getFrekuensi(){
        return $this->frekuensi;
    }

    public function setKodeRuangan($kodeRuangan){
        $this->kodeRuangan = $kodeRuangan;
    }

    public function getKodeRuangan(){
        return $this->kodeRuangan;
    }

    public function setKodeAsisten($kodeAsisten){
        $this->kodeAsisten = $kodeAsisten;
    }

    public function getKodeAsisten(){
        return $this->kodeAsisten;
    }

    public function setKodeAsistenKedua($kodeAsistenKedua){
        $this->KodeAsistenKedua = $kodeAsistenKedua;
    }

    public function getKodeAsistenKedua(){
        return $this->kodeAsistenKedua;
    }


    public function setKodeMatkul($kodeMatkul){
        $this->kodeMatkul = $kodeMatkul;
    }

    public function getKodeMatkul(){
        return $this->kodeMatkul;
    }

    public function setHari($hari){
        $this->hari = $hari;
    }

    public function getHari(){
        return $this->hari;
    }

    public function setDiMulai($diMulai){
        $this->diMulai = $diMulai;
    }

    public function getDiMulai(){
        return $this->diMulai;
    }

    public function setBerakhir($akhir){
        $this->berakhir = $akhir;
    }

    public function getBerakhir(){
        return $this->berakhir;
    }
}

?>