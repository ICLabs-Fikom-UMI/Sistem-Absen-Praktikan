<?php


include_once '../model/user.php';
include_once '../database/connect.php';
include_once '../exception/connectException.php';
include_once '../model/frekuensiMatkul.php';
include_once '../model/kelas.php';

class controllerUser {

    private function cekStatusConnect($conn){
        if($conn){
            return true;
        }

        throw new connectException("gagal terhubung");
    }

    public function insertDataUser(user $objectUser, frekuensiMatkul $objectFrekuensi, kelas $objectKelas){

        $objectConnect = new connect();


        $stb = $objectUser->getStb();
        $name = $objectUser->getName();

        $frekuensi = $objectFrekuensi->getFrekuensi();

        $kodeKelas = $objectKelas->getKodeKelas();

        $conn = $objectConnect->getDB();

        try{

            $this->cekStatusConnect($conn);

            $password = $stb."123";

            mysqli_query($conn, "INSERT INTO tbl_user (stb, nama, password, jenis_user) 
            VALUE ('$stb', '$name', '$password', 'PRAKTIKAN')");


            // mysql_query($conn, "UPDATE tbl_kelas SET stb = '$stb' WHERE kode_kelas = '$kodeKelas'");

        }catch (connectException $exception){
            throw new connectException($exception);
        }

    }

}


?>