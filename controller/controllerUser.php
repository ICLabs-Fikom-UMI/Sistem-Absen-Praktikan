<?php


include_once '../model/user.php';
include_once '../database/connect.php';
include_once '../exception/connectException.php';
include_once '../helper/viewDataMahasiswa.php';
include_once '../model/surat.php';

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
        // $conn2 = $objectConnect->getDB();

        try{

            $this->cekStatusConnect($conn);

            $stmt = $conn->prepare("INSERT INTO tbl_user(stb, kode_kelas, nama,passwords, jenis_user) VALUES (?, ?, ?, ?, ?)");

            $query = "INSERT INTO tbl_frekuensi_matkul(stb, frekuensi) VALUES (?,?)";
            $stmt2 = $conn->prepare($query);
        
            $stmt->bind_param("sssss", $stb, $kodeKelas, $name,$password, $jenisUser);
            $stmt2->bind_param("ss", $stb, $frekuensi);

            try{
                $stmt->execute();
                $stmt2->execute();
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
        FROM tbl_frekuensi_matkul
        INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        WHERE tbl_frekuensi_matkul.frekuensi = ?
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



    public function insert_surat(surat $objectSurat){

        $stb = $objectSurat->getStb();
        $frekuensi = $objectSurat->getFrekuensi();
        $file = $objectSurat->getFile();


        echo $file;

        $objectConnect = new connect();

        $conn = $objectConnect->getDB();



        $query = "CALL insert_surat(?,?,?)";

            $stmt = $conn->prepare($query);

            $stmt->bind_param("sss", $stb, $frekuensi, $file);  

            try{
                $stmt->execute(); 
            }catch(Exception $exception) {
                echo $exception->getMessage();  
            }
            
            $stmt->close();

        $conn->close();
    }

}


?>