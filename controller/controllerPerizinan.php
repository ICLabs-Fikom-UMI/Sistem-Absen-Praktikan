<?php

include_once '../helper/viewDataPerizinan.php';
include_once '../database/connect.php';

class controllerPerizinan {

    public function cariDataPerizinan($cari){
        $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas, tbl_surat.waktu
        FROM tbl_surat
        INNER JOIN tbl_user ON tbl_surat.stb = tbl_user.stb
        INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        WHERE tbl_surat.stb = ?
        ";

        $objectConnect = new connect();

        $conn = $objectConnect->getDB();

        $stmt = $conn->prepare($query);

        $stmt->bind_param("s", $cari);

        $stmt->execute();

        $result = $stmt->get_result();

        $resultArray = array();

        $count = 0;


        while($row = $result->fetch_assoc()){
            $objectDataPerizinan = new viewDataPerizinan();

            $count++;

            $objectDataPerizinan->setNo($count);

            $objectDataPerizinan->setStb($row['stb']);
            $objectDataPerizinan->setNama($row['nama']);
            $objectDataPerizinan->setKelas($row['kelas']);
            $objectDataPerizinan->setTanggal($row['waktu']);

            array_push($resultArray, $objectDataPerizinan);
        }

        return $resultArray;
    }
    
}

?>