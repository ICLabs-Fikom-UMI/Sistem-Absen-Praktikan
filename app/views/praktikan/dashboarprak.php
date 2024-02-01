<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/prak.css">
    <title>Document</title>
</head>
<body class="body">
    <div class="container">
        <div class="container-logo-text">
            <div class="logo">
                <img src="<?= BASEURL; ?>/img/logo.png" alt="" height="40px">
            </div>
            <div class="text-logo">
                <h4 style="color: white;">Sistem Absen Praktikan</h4>
            </div>
        </div>
        <div class="display-select">
            <div class="select">
                <a href="<?= BASEURL; ?>/Praktikan/perizinan" class="font-select">Perizinan</a>
            </div>
            <div class="select">
                <a href="<?= BASEURL ?>/Praktikan/barcode" class="font-select">Buat Barcode</a>
            </div>
        </div>
        <div class="out">
            <a class="text-out" href="<?= BASEURL;?>/Login/index">logout</a>
        </div>
    </div>
    <div class="container-2">

    </div>
</body>
</html>