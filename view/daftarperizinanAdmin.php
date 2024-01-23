
<?php

include_once '../controller/controllerPerizinan.php';

    if(isset($_POST["submit"])){

        $objectData = new controllerPerizinan();

        $cari = $_POST['cari'];
        $result = $objectData->cariDataPerizinan($cari);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/daftarperizinanAdmin.css">
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
            <h3>Daftar Perizinan</h3>
        </div>
        <form action="" method="post">
            <div class="display-input">
                <div class="ket-hal-2">
                    <h3 class="font-ket-hal-2">NIM</h3>
                </div>
                <div class="column-input">
                    <input class="ket-column-input" name="cari" type="text" placeholder="Masukkan NIM">
                </div>
            </div>
            <div class="display-search">
                <div class="ket-hal-3">
                    <input type="submit" class="button" name="submit" value="search">
                </div>
            </div>
        </form>
        <!-- <div class="display-input">
            <div class="ket-hal-2">
                <h3 class="font-ket-hal-2">NIM</h3>
            </div>
            <div class="column-input">
                <input class="ket-column-input" type="text" placeholder="Masukkan NIM">
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
                <div class="display-tanggal">
                    <h3 class="font-view">Tanggal</h3>
                </div>
                <div class="display-buka">
                    <h3 class="font-view">Buka</h3>
                </div>      
            </div>
            <div class="scroll-view-data" style="height: 250px;">
                <div class="display-view-2">

                    <?php foreach ($result as $value): ?>

                        <div class="display-view-3">
                            <div class="display-no-2">
                                <h3 class="font-view">
                                    <?php echo $value->getNo(); ?>
                                </h3>
                            </div>
                            <div class="display-NIM-2">
                                <h3 class="font-view">
                                    <?php echo $value->getStb(); ?>
                                </h3>
                            </div>
                            <div class="display-nama-2">
                                <h3 class="font-view">
                                    <?php echo $value->getNama(); ?>
                                </h3>
                            </div>
                            <div class="display-kelas-2">
                                <h3 class="font-view">
                                    <?php echo $value->getKelas(); ?>
                                </h3>
                            </div>
                            <div class="display-tanggal-2">
                                <h3 class="font-view">
                                    <?php echo $value->getTanggal(); ?>
                                </h3>
                            </div>
                            <div class="display-buka-2">
                                <h3 class="font-view">Buka</h3>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <!-- <div class="display-view-3">
                        <div class="display-no-2">
                            <h3 class="font-view">1</h3>
                        </div>
                        <div class="display-NIM-2">
                            <h3 class="font-view">13020210048</h3>
                        </div>
                        <div class="display-nama-2">
                            <h3 class="font-view">Ahmad Rendi</h3>
                        </div>
                        <div class="display-kelas-2">
                            <h3 class="font-view">A1</h3>
                        </div>
                        <div class="display-tanggal-2">
                            <h3 class="font-view">21-1-2024</h3>
                        </div>
                        <div class="display-buka-2">
                            <h3 class="font-view">Buka</h3>
                        </div>
                    </div> -->

                </div>
           </div> 
        </div>

    </div>
</body>
</html>