<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/perizinanPrak.css">
    <title>Document</title>
</head>
<body class="body">
    <div class="container-1">
        <div class="container-logo-text">
            <div class="logo">
                <img src="<?= BASEURL ?>/img/logo.png" alt="" height="40px">
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
        <div class="ket-hal">
            <h3>Perizinan</h3>
        </div>
        <div class="column-input-2">
            <form action="<?= BASEURL;?>/Praktikan/perizinan" method="post" class="form" enctype="multipart/form-data" >
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