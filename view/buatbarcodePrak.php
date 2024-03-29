
<?php


include_once '../controller/controllerFrekuensi.php';
include_once '../controller/controllerUser.php';


    if(isset($_POST["submit"])){
        $stb = $_POST['stb'];
        $frekuensi = $_POST['frekuensi'];

        $objectControllerFrekuensi = new controllerFrekuensi();
        $objectControllerUser = new controllerUser();
        try{
            $resultFrekuensi = $objectControllerFrekuensi->cariFrekuensi($stb, $frekuensi);
        }catch (NotFoundException $exception){
            // echo $exception->getMesaage();
            $error = $exception->getMessage();
        }
        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/buatbarcodePrak.css">
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
            <h3>Buat Barcode</h3>
        </div>
        <div class="column-input-2">
            <form action="" class="form" method="post">
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
                <div>
                    <?php if($error != NULL) : ?>
                        <h4>
                            <?php echo $error ?>
                        </h4>
                    <?php endif; ?>
                </div>
                <div class="display-form">
                    <div class="button-potision">
                        <!-- <button class="button-input" name="submit">Buat</button> -->
                        <input type="submit" name="submit" value="Buat" class="button-input">
                        <button class="button-input" type="reset">Batal</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="image-2">
            <!-- <img class="image-3" src="../asisten/asset/Group.png" alt=""> -->
            <?php if ($resultFrekuensi != NULL): ?>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data= <?php echo $resultFrekuensi.$reusltStb ?>" alt="">
            <?php endif; ?>
        </div>
        
    </div>
</body>
</html>