<?php

include_once '../database/connect.php';
include_once '../exception/NotFoundException.php';
// include_once '../'


class controllerFrekuensi {


    private function cekData($result){
        echo $result;
        if($result != NULL){
            return true;
        }

        throw new NotFoundException("data tidak ditemukan");
    }


    public function cariFrekuensi($stb, $frekuensi){

        $objectConnect = new connect();

        $conn = $objectConnect->getDB();

        $query = "SELECT searchKodeFrekuensi(?, ?) AS hasil";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $stb, $frekuensi);

        try{
            $stmt->execute();

            $resutl = $stmt->get_result();

            $row = $resutl->fetch_assoc();

            $hasil = $row['hasil'];

            $this->cekData($hasil);

            return $hasil;
        } catch (NotFoundException $exception){
            throw new NotFoundException($exception->getMessage());
        }
    }

}

?>