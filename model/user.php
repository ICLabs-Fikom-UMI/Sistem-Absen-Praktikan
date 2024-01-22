<?php


class user {
    private $stb;
    private $name;
    private $password;
    private $jenisUser;



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
}

?>