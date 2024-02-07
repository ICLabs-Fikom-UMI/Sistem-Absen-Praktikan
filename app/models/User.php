<?php

session_start();

class User {

    private $db;

    public function __construct(){
        $this->db = new Database();
        $this->db2 = new Database();
    }

    public function getDataMahasiswa($cari){

        $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas,
                tbl_frekuensi_matkul.frekuensi, tbl_kelas.kode_kelas
        FROM tbl_frekuensi_matkul
        INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
        INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        WHERE tbl_frekuensi_matkul.frekuensi =:frekuensi
        ";  
        $this->db->query($query);

        $this->db->bind('frekuensi', $cari);
        return $this->db->resultSet();
    }

    public function insertData($data){
        $query1 = "INSERT INTO tbl_user(stb, kode_kelas, nama,passwords, jenis_user)
         VALUES (:stbk, :kodeKelas, :namas, :passwords , 'PRAKTIKAN')";

        

        $this->db->query($query1);
        $this->db->bind('stbk', $data['stb']);
        $this->db->bind('kodeKelas', $data['kodeKelas']);
        $this->db->bind('namas', $data['nama']);
        $this->db->bind('passwords', $data['stb'] . "-123");
        try{
            $this->db->execute();
        }catch (Exception $exception){
            // echo $exception->getMessage();
        }
    }

    public function insertDataPraktikum($data){

        $query2 = "INSERT INTO tbl_frekuensi_matkul(stb, frekuensi) VALUE (:stbkk, :frekuensi)";

        $this->db2->query($query2);
        $this->db2->bind('stbkk', $data['stb']);
        $this->db2->bind('frekuensi', $data['frekuensi']);

        try{
            $this->db2->execute();
        }catch (Exception $exception){
            // echo $exception->getMessage();
        }
    }


    public function getDataAbsen($data){

        if($data['stb'] != NULL){

            $query = "SELECT tbl_user.nama, tbl_user.stb, tbl_kelas.kelas,
                        tbl_absen.status, tbl_frekuensi_matkul.frekuensi
                FROM tbl_absen
                INNER JOIN tbl_frekuensi_matkul ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
                INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
                INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
                WHERE tbl_frekuensi_matkul.stb = :stbk";

            $this->db->query($query);
            $this->db->bind('stbk', $data['stb']);
            return $this->db->resultSet();
        }else {

            $query = "SELECT tbl_user.nama, tbl_user.stb, tbl_kelas.kelas, tbl_absen.status, tbl_frekuensi_matkul.frekuensi
            FROM tbl_absen
            INNER JOIN tbl_frekuensi_matkul ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
            INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
            INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
            WHERE tbl_frekuensi_matkul.frekuensi = :frekuensik";

            $this->db->query($query);
            $this->db->bind('frekuensik', $data['frekuensi']);
            try{
                return $this->db->resultSet();
            }catch(Exception $exception){
            }
        }
    }

    public function getDataAbsenForUpdate($stb, $frekuensi){

            $query = "SELECT tbl_user.nama, tbl_user.stb, tbl_kelas.kelas,
                        tbl_absen.status, tbl_frekuensi_matkul.frekuensi
                FROM tbl_absen
                INNER JOIN tbl_frekuensi_matkul ON tbl_frekuensi_matkul.kode_frekuensi = tbl_absen.kode_frekuensi
                INNER JOIN tbl_user ON tbl_frekuensi_matkul.stb = tbl_user.stb
                INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
                WHERE tbl_frekuensi_matkul.stb = :stbk and tbl_frekuensi_matkul.frekuensi = :frekuensi";

            $this->db->query($query);
            $this->db->bind('stbk', $stb);
            $this->db->bind('frekuensi', $frekuensi );

            try {
                return $this->db->resultSet();
            }catch (Exception $exception){
                // echo $exception->getMessage();
            }
            
    }

    public function daftarPerizinan($data){

        $query = "SELECT tbl_user.stb, tbl_user.nama, tbl_kelas.kelas, tbl_surat.waktu
        FROM tbl_surat
        INNER JOIN tbl_user ON tbl_surat.stb = tbl_user.stb
        INNER JOIN tbl_kelas ON tbl_user.kode_kelas = tbl_kelas.kode_kelas
        WHERE tbl_surat.stb = :stbk";

        $this->db->query($query);
        $this->db->bind('stbk', $data['cari']);
        try{
            return $this->db->resultSet();
        }catch(Exception $exception){
            // echo $exception->getMessage();
        }
    }


    public function buatPerizinan($data, $file){

        $query = "CALL insert_surat(:stbk, :frekuensis, :files)";

        $this->db->query($query);
        $this->db->bind('stbk', $data['stb']);
        $this->db->bind('frekuensis', $data['frekuensi']);
        $this->db->bind('files', $file['file']['tmp_file'] . $file['file']['name']);

        try{
            $this->db->execute();
        }catch (Exception $exception){
            // echo $exception->getMessage();
        }   
    }

    public function buatBarcode($data){

        $query = "SELECT searchKodeFrekuensi(:stb, :frekuensi) AS hasil";


        $this->db->query($query);
        $this->db->bind('stb', $data['stb']);
        $this->db->bind('frekuensi', $data['frekuensi']);        
        try{
            return $this->db->single();
        }catch(Exception $exception){
            // echo $exception->getMessage();
        }
    }

    public function updateAbsen($data){

        $query = "CALL updateDataAbsen(:kode_frekuensi)";

        $this->db->query($query);
        $this->db->bind('kode_frekuensi', $data);
        try{
            $this->db->execute();
        }catch(Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function login($data){

        $query = "SELECT login(:stb, :passwords) AS result";

        $this->db->query($query);
        $this->db->bind('stb', $data['stb']);
        $this->db->bind('passwords', $data['password']);        
        try{
            $data = $this->db->single();
            return $data;
        }catch(Exception $exception){
            // echo $exception->getMessage();
        }
    }

    public function deleteAbsen($stbk){

        $query = "CALL deleteAbsenUseKodeFrekuensi(:stbk)";

        $this->db->query($query);
        $this->db->bind('stbk', $stbk);

        try{
            $this->db->execute();
        }catch(Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function deleteDatamahasiswa($stbk){
        $query = "CALL deleteDataMahasiswa(:stbk)";

        $this->db->query($query);
        $this->db->bind('stbk', $stbk);

        try{
            $this->db->execute();
        }catch(Exception $exception){
            echo $exception->getMessage();
        }
    }

    public function updateDataAbsen($data){

        $query = "CALL updateTableAbsen(:stb, :frekuensi, :value, :interasi)";

        $stb = $data['stb'];
        $frekuensi = $data['frekuensi'];
        $status = $data['status'];
        $i = 0;

        foreach ($status as $value){

            $this->db->query($query);
            $this->db->bind('stb', $stb);
            $this->db->bind('frekuensi', $frekuensi);
            $this->db->bind('value', $value);
            $this->db->bind('interasi', $i);
    
            try{
                $this->db->execute();
            }catch(Exception $exception){
                echo $exception->getMessage();
            }

            $i++;
        }
    }
    
    
    public function updateDataMahasiswa($data){

        $query = "CALL updateDataMahasiswa(:stb, :frekuensi, :frekuensiBaru, :nama, :kelas)";


        $this->db->query($query);

        $this->db->bind('stb', $data['stb']);
        $this->db->bind('frekuensi', $data['frekuensi']);
        $this->db->bind('frekuensiBaru', $data['frekuensiBaru']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas', $data['kelas']);
    
        try{
            $this->db->execute();
        }catch(Exception $exception){
            echo $exception->getMessage();
        }
    }
}
