
<?php

include_once '../controller/controllerUser.php';

    if(isset($_POST["submit"])){

        $objcetControllerUser = new controllerUser();
        $objectSurat = new surat();

        $stb = $_POST['stb'];
        $frekuensi = $_POST['frekuensi'];
        $file = $_FILES["file"]["name"];

        $objectSurat->setStb($stb);
        $objectSurat->setFrekuensi($frekuensi);
        $objectSurat->setFile($file);

        $objcetControllerUser->insert_surat($objectSurat);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/perizinanPrak.css">
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
                <a href="perizinanPrak.php" class="font-select">Perizinan</a>
            </div>
            <div class="select">
                <a href="buatbarcodePrak.php" class="font-select">Buat Barcode</a>
            </div>
        </div>
    </div>
    <div class="container-2">
        <div class="ket-hal">
            <h3>Perizinan</h3>
        </div>
        <div class="column-input-2">
            <form action="" method="post" class="form" enctype="multipart/form-data" >
                <div class="display-form">
                    <div class="ket-input">
                        <label for="">NIM</label>
                    </div>
                    <div class="input">
                        <input class="input-2" type="text" name="stb" placeholder="Masukkan NIM">
                    </div>
                </div>
                <div class="display-form">
                    <div class="ket-input">
                        <label for="">Frekuensi</label>
                    </div>
                    <div class="input">
                        <input class="input-2" type="text" name="frekuensi" placeholder="Masukkan Frekuensi">
                    </div>
                </div>
                <div class="display-form">
                    <div class="ket-input">
                       <label for="">Foto</label>
                    </div>
                    <div class="input">
                        <input type="file" accept=".jpeg, .jpg, .png" name="file" value="Pilih Foto">
                    </div>
                </div>
                <div class="display-form">
                    <div class="button-potision">
                        <input class="button-input" type="submit" name="submit" value="Kirim">
                        <input class="button-input" type="reset" value="Batal">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>