<?php


include_once '../model/user.php';
include_once '../database/connect.php';
include_once '../exception/connectException.php';
include_once '../helper/viewDataMahasiswa.php';

class controllerUser {

    private function cekStatusConnect($conn){
        if($conn){
            return true;
        }

        throw new connectException("gagal terhubung");
    }

    public function insertDataUser(user $objectUser){

        $objectConnect = new connect();

        $stb = $objectUser->getStb();
        $name = $objectUser->getName();
        $frekuensi = $objectUser->getFrekuensi();
        $kodeKelas = $objectUser->getKodeKelas();
        $jenisUser = "PRAKTIKAN";
        $password = $stb."-123";

        $conn = $objectConnect->getDB();

        try{

            $this->cekStatusConnect($conn);

            $stmt = $conn->prepare("INSERT INTO tbl_user(stb, kode_kelas, frekuensi, nama,passwords, jenis_user) VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssssss", $stb, $kodeKelas, $frekuensi, $name,$password, $jenisUser);

            try{
                $stmt->execute();
            }catch (Exception $exception){
                echo "Error : " . $exception->getMessage();
            }

            $stmt->close();
            $conn->close();

        }catch (connectException $exception){
            throw new connectException($exception);
        }

    }



    public function cariDataMahasisiwa($cari){

        $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas
        FROM tbl_user
        INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        WHERE tbl_user.frekuensi = ?
        ";

        $objectConnect = new connect();
        $conn = $objectConnect->getDB();

        $stmt = $conn->prepare($query);

        $stmt->bind_param("s", $cari);

        $stmt->execute();

        $result = $stmt->get_result();

        $resultArray = array();

        $count = 0;

        while ($row = $result->fetch_assoc()){
            $objectDataMahasiswa = new viewDataMahasiswa();
            $count++;
            $objectDataMahasiswa->setNo($count);
            $objectDataMahasiswa->setStb($row['stb']);
            $objectDataMahasiswa->setNama($row['nama']);
            $objectDataMahasiswa->setKelas($row['kelas']);

            array_push($resultArray, $objectDataMahasiswa);
        }

        return $resultArray;

    }

}


?>