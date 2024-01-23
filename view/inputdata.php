
<?php

include_once '../controller/controllerUser.php';

    if(isset($_POST["sub"])){
        $objectControllerUser = new controllerUser();
        $objectUser = new user();

        $name = $_POST["nama"];
        $stb = $_POST["NIM"];
        $frekuensi = $_POST["frekuensi"];
        $kodeKelas = $_POST["kodeKelas"];

        $objectUser->setName($name);
        $objectUser->setStb($stb);
        $objectUser->setFrekuensi($frekuensi);
        $objectUser->setKodeKelas($kodeKelas);

        $objectControllerUser->insertDataUser($objectUser); 
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/inputdata.css">
    <title>Document</title>
</head>
<body class="body">
    <div class="container">
        <div class="container-logo-text">
            <div class="logo">
                <img src="../view/asset/image/logo.png" alt="" height="40px">
            </div>
            <div class="text-logo">
                <h4 style="color: white;">Sistem Absen Praktikan</h4>
            </div>
        </div>

        <div class="display-select">
            <div class="select">
                <a href="inputdata.php" class="font-select">Input Data</a>
            </div>
            <div class="select">
                <a href="datamahasiswaAdmin.php" class="font-select">Data Mahasiswa</a>
            </div>
            <div class="select">
                <a href="daftarkehadiranAdmin.php" class="font-select">Daftar Kehadiran</a>
            </div>
            <div class="select">
                <a href="daftarperizinanAdmin.php" class="font-select">Daftar Perizinan</a>
            </div>

        </div>
    </div>
    <div class="container-2">
        <div class="ket-hal">
            <h3>Penginputan Data Mahasiswa</h3>
        </div>
        <div class="form-input">
            <form action="" method="post" class="form">
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Nama</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="nama" id="" placeholder="Masukkan Nama Mahasiswa">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">NIM</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="NIM" id="" placeholder="Masukkan NIM">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Kode Kelas</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="kodeKelas" id="" placeholder="Masukkan Kode Kelas">
                    </div>
                </div>
                <!-- <div class="display-input">
                    <div class="ket-input">
                        <label for="">Kode Matkul</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="" id="" placeholder="Masukkan Kode Matkul">
                    </div>
                </div> -->
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Frekuensi</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="frekuensi" id="" placeholder="Masukkan Frekuensi">
                    </div>
                </div>
                <!-- <div class="display-input">
                    <div class="ket-input">
                        <label for="">Kode Ruangan</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="" id="" placeholder="Masukkan Kode Ruangan">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Kode Asisten 1</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="" id="" placeholder="Masukkan Kode Asisten Pertama">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Kode Asisten 2</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="" id="" placeholder="Masukkan Kode Asisten Kedua">
                    </div>
                </div> -->
                <div class="button">
                    <div class="display-button-simpan">
                        <!-- <button class="button-simpan"  name="submit">Simpan</button> -->
                        <input type="submit" name="sub" class="button-simpan" value="Simpan" >
                    </div>
                    <div class="display-button-batal">
                        <button class="button-batal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>