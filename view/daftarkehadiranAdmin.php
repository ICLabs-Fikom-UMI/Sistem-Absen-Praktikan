

<?php
    include_once '../controller/controllerUser.php';
    if(isset($_POST["submit"])){

        $stb = $_POST['stb'];
        $frekuensi = $_POST['frekuensi'];

        $objectControllerUser = new controllerUser();

        try{

            $result = $objectControllerUser->cariDataAbsen($stb, $frekuensi);
        }catch (NotFoundException $exception){

        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/daftarkehadiranAdmin.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <title>Document</title>
</head>
<body class="body">
    <div class="container-1">
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
            <h3>Daftar Kehadiran Mahasiswa</h3>
        </div>
        <!-- <div class="display-input">
            <div class="ket-hal-2">
                <h3 class="font-ket-hal-2">NIM</h3>
            </div>
            <div class="column-input">
                <input class="ket-column-input" type="text" placeholder="Masukkan NIM">
            </div>
        </div> -->
        <form action="" method="post">
            <div class="column-input-2">
                <div class="display-input">
                    <div class="ket-hal-2">
                        <h3 class="font-ket-hal-2">NIM</h3>
                    </div>
                    <div class="column-input">
                        <input class="ket-column-input" name="stb" type="text" placeholder="Masukkan NIM">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-hal-2">
                        <h3 class="font-ket-hal-2">Frekuensi</h3>
                    </div>
                    <div class="column-input">
                        <input class="ket-column-input" name="frekuensi" type="text" placeholder="Masukkan Frekuensi">
                    </div>
                </div>
            </div>
            <div class="display-search">
                <div class="ket-hal-3">
                    <input type="submit" name="submit" value="search" class="button">
                    <!-- <button class="button">search</button> -->
                </div>
            </div>
        </form>
        <!-- <div class="column-input-2">
            <div class="display-input">
                <div class="ket-hal-2">
                    <h3 class="font-ket-hal-2">NIM</h3>
                </div>
                <div class="column-input">
                    <input class="ket-column-input" type="text" placeholder="Masukkan NIM">
                </div>
            </div>
            <div class="display-input">
                <div class="ket-hal-2">
                    <h3 class="font-ket-hal-2">Frekuensi</h3>
                </div>
                <div class="column-input">
                    <input class="ket-column-input" type="text" placeholder="Masukkan Frekuensi">
                </div>
            </div>
        </div>
        <div class="display-search">
            <div class="ket-hal-3">
                <button class="button">search</button>
            </div>
        </div> -->

        <div class="display-view">
            <div class="display-view-1">
                <div class="display-no">
                    <h3 class="font-view">No</h3>
                </div> 
                <div class="display-NIM">
                    <h3 class="font-view">NIM</h3>
                </div> 
                <div class="display-nama">
                    <h3 class="font-view">Nama</h3>
                </div>
                <div class="display-kelas">
                    <h3 class="font-view">Kelas</h3>
                </div>     
                <div class="display-pertemuan">
                    <div class="display-pertemuan-2">
                        <h4 class="font-pertemuan">Jumlah Pertemuan</h4>
                    </div>
                    <div class="display-pertemuan-3">
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">1</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">2</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">3</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">4</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">5</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">6</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">7</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">8</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">9</h4>
                        </div>
                        <div class="display-jumlah-pertemuan">
                            <h4 class="font-pertemuan">10</h4>
                        </div>
                    </div>
                    <!-- <h3 class="font-view">Jumlah Pertemuan</h3> -->
                </div>
                <div class="display-buka">
                    <h3 class="font-view">Edit</h3>
                </div>      
                <div class="display-delete">
                    <h3 class="font-view">Delete</h3>
                </div>
            </div>
            <div class="scroll-view-data" style="height: 250px;">
                <!-- batas  -->
                <div class="display-view-2">
                    <div class="display-view-3">
                        <div class="display-no-2">
                            <h3 class="font-view">
                                <?php echo $result->getNo() ?>
                            </h3>
                        </div>
                        <div class="display-NIM-2">
                            <h3 class="font-view">
                                 <?php echo $result->getStb() ?>
                            </h3>
                        </div>
                        <div class="display-nama-2">
                            <h3 class="font-view">
                                <?php echo $result->getNama() ?>
                            </h3>
                        </div>
                        <div class="display-kelas-2">
                            <h3 class="font-view">
                                <?php echo $result->getKelas() ?>
                            </h3>
                        </div>
                        <div class="display-pertemuan-22">
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[0] ?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[1] ?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[2] ?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[3]?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[4]?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[5]?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[6]?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[7]?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[8]?>
                                </h4>
                            </div>
                            <div class="display-jumlah-pertemuan-1">
                                <h4 class="font-pertemuan">
                                    <?php echo $result->getStatus()[9]?>
                                </h4>
                            </div>
                        </div>
                            <div>
                                <button type="button" class="button-delete">Edit</button>
                            </div>
                            <div>
                            <button type="button" class="button-delete">Delete</button>
                        </div>
                     </div>
                </div>
           </div> 
        </div>

    </div>
</body>
</html>