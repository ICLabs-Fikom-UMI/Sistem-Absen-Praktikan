<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/scanAsisten.css">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <title>Document</title>
</head>
<body class="body" >
        <div class="container">
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
                    <a href="<?= BASEURL; ?>/Asisten/kehadiran" class="font-select">Daftar Kehadiran</a>
                </div>
                <div class="select">
                    <a href="<?= BASEURL; ?>/Asisten/daftarPerizinan" class="font-select">Daftar Perizinan</a>
                </div>
                <div class="select">
                    <a href="<?= BASEURL; ?>/Asisten/perizinan" class="font-select">Perizinan</a>
                </div>
                <div class="select">
                    <a href="<?= BASEURL; ?>/Asisten/barkode" class="font-select">Buat Barcode</a>
                </div>
                <div class="select">
                    <a href="<?= BASEURL; ?>/Asisten/scan" class="font-select">Scan</a>
                </div>
            </div>
            <div class="out">
            <a class="text-out" href="<?= BASEURL;?>/Login/index">logout</a>
            </div>
        </div>
        <div class="container-2">
            <div class="ket-hal">
                <h4>Scan Barcode</h4>
            </div>
            <div class="scan">
                <div class="scan-2">
                    <video id="preview"></video>
                    <audio id="scanSound" src="<?= BASEURL?>/music/Bike Ride.mp3"></audio>
                </div>
            </div>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        
            scanner.addListener('scan', function (content) {
                // alert('Hasil Scanning: ' + content);
                sendDataToPHP(content);
                playScanSound(); 
            });

            function sendDataToPHP(content) {
                var xhr = new XMLHttpRequest();

                xhr.open('POST', "<?= BASEURL ?>/Asisten/data", true);

                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };

                xhr.send('data=' + encodeURIComponent(content));
            }

            function playScanSound() {
            let audio = document.getElementById('scanSound');
            audio.play();
            }
        
            function startScanning() {
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        alert('Tidak ditemukan kamera.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });
            }
            startScanning();
        });
    </script>


    
</body>
</html>