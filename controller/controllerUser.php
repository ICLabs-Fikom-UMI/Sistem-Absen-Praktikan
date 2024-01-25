<?php


include_once '../model/user.php';
include_once '../database/connect.php';
include_once '../exception/connectException.php';
include_once '../helper/viewDataMahasiswa.php';
include_once '../model/surat.php';
include_once '../exception/NotFoundException.php';
include_once '../helper/viewDataAbsen.php';
include_once '../controller/controllerFrekuensi.php';

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

        $objectConnect = new connect();

        $conn = $objectConnect->getDB();

        $query = "CALL insert_surat(?,?,?)";

            $stmt = $conn->prepare($query);

            $stmt->bind_param("sss", $stb, $frekuensi, $file);  

            try{
                $stmt->execute(); 
            }catch(Exception $exception) {
                // echo $exception->getMessage();  
            }
            
            $stmt->close();

        $conn->close();
    }


    public function cariStb($cari){
        $objectConnect = new connect();

        $conn = $objectConnect->getDB();

        $query = "SELECT searchStb(?) AS hasil";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $cari);

        try{
            $stmt->execute();

            
            $resutl = $stmt->get_result();

            $row = $resutl->fetch_assoc();

            $hasil = $row['hasil'];

            return $hasil;
        } catch (NotFoundException $exception){
            throw new NotFoundException("data tidak ditemukan");
        }
    }


    private function cekData($result){
        echo $result;
        if($result != NULL){
            return true;
        }
        echo "disini";
        throw new NotFoundException("data tidak ditemukan");
    }


    public function cariDataAbsen($stb, $frekuensi){

        // $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas AS kelas, tbl_absen.status AS status 
        // FROM tbl_frekuensi_matkul
        // INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        // INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        // INNER JOIN tbl_absen ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
        // WHERE tbl_frekuensi_matkul.frekuensi = ? AND tbl_frekuensi_matkul.stb = ? ";


        // SELECT tbl_user.nama, tbl_user.stb, tbl_kelas.kelas, tbl_absen.status
        // FROM tbl_absen
        // INNER JOIN tbl_frekuensi_matkul ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
        // INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        // INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        // WHERE tbl_frekuensi_matkul.stb = '13020210048' AND tbl_frekuensi_matkul.frekuensi = 'TI_ALPRO-2';

        $query = "SELECT tbl_user.nama, tbl_user.stb, tbl_kelas.kelas, tbl_absen.status
                FROM tbl_absen
                INNER JOIN tbl_frekuensi_matkul ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
                INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
                INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
                WHERE tbl_frekuensi_matkul.stb = ? AND tbl_frekuensi_matkul.frekuensi = ? ";

        // $query = "SELECT tbl_user.nama, tbl_user.stb, tbl_kelas.kelas, tbl_absen.status
        // FROM tbl_absen
        // INNER JOIN tbl_frekuensi_matkul ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
        // INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        // INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        // WHERE tbl_absen.kode_frekuensi = ?";

        // $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas
        // FROM tbl_frekuensi_matkul
        // INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        // INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        // -- INNER JOIN tbl_absen ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
        // WHERE tbl_frekuensi_matkul.frekuensi = ? AND tbl_frekuensi_matkul.stb = ?";

        // $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas
        // FROM tbl_frekuensi_matkul
        // INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        // INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        // WHERE tbl_frekuensi_matkul.stb = ? AND tbl_frekuensi_matkul.frekuensi = ?
        // ";

        // echo $stb;

        $objectConnect = new connect();
        $conn = $objectConnect->getDB();
        $stmt = $conn->prepare($query);
        // $stmt->bind_param("s", $stb);
        $stmt->bind_param("ss", $stb, $frekuensi);

        $count = 0;
        $resultArray = array();
        $objectFrekuensi = new controllerFrekuensi();

        try{
            $objectFrekuensi->cariFrekuensi($stb, $frekuensi);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()){

                $objectViewDataAbsen = new viewDataAbsen();

                $count++;
                $objectViewDataAbsen->setNo($count);
                $objectViewDataAbsen->setStb($row['stb']);
                $objectViewDataAbsen->setNama($row['nama']);
                $objectViewDataAbsen->setKelas($row['kelas']);
                $objectViewDataAbsen->setStatus($row['status']);
                array_push($resultArray, $objectViewDataAbsen);

            }
        }catch(NotFoundException $exception){
            echo $exception->getMessage();
        }
        
        return $resultArray;
    }

}


?>