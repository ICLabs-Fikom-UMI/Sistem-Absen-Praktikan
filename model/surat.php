<?php

class surat{
    private $stb;
    private $frekuensi;
    private $file;


    public function setStb($stb){
        $this->stb = $stb;
    }

    public function getStb(){
        return $this->stb;
    }

    public function setFrekuensi($frekuensi){
        $this->frekuensi = $frekuensi;
    }

    public function getFrekuensi(){
        return $this->frekuensi;
    }

    public function setFile($file){
        $this->file = $file;
    }

    public function getFile(){
        return $this->file;
    }
}

?>