
<?php
// Tangkap data yang dikirim dari JavaScript
    $receivedData = $_POST['data'];

// Sekarang, Anda bisa melakukan apa pun yang Anda inginkan dengan $receivedData
// Misalnya, Anda bisa menyimpannya di database atau memprosesnya sesuai kebutuhan aplikasi Anda.

// Sekarang, kita akan mengirimkan kembali data yang diterima sebagai respons.

    if(isset($receivedData) != NULL){
        echo "Data yang diterima dari JavaScript: " . $receivedData;
    }

    echo $_COOKIE['gfg'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/scanAsisten.css">
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
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
                <a href="daftarkehadiranAsisten.php" class="font-select">Daftar Kehadiran</a>
            </div>
            <div class="select">
                <a href="daftarperizinanAsisten.php" class="font-select">Daftar Perizinan</a>
            </div>
            <div class="select">
                <a href="perizinanAsisten.php" class="font-select">Perizinan</a>
            </div>
            <div class="select">
                <a href="buatbarcodeAsisten.php" class="font-select">Buat Barcode</a>
            </div>
            <div class="select">
                <a href="scanAsisten.php" class="font-select">Scan</a>
            </div>
        </div>
    </div>
    <div class="container-2">
        <div class="ket-hal">
            <h4>Scan Barcode</h4>
        </div>
        <div class="scan">
            <div class="scan-2">
                <video id="preview"></video>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    
            scanner.addListener('scan', function (content) {
                alert('Hasil Scanning: ' + content);
                // sendDataToPHP(content);
                // createCookie("gfg", content);
                $(document).ready(function () {
                createCookie("gfg", "GeeksforGeeks", "10");
                });
            });

            

            function createCookie(name, value, day) {
                let expires;
            
                if (days) {
                    let date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toGMTString();
                }
                else {
                    expires = "";
                }
            
                document.cookie = escape(name) + "=" +
                    escape(value) + expires + "; path=/";
            }



            // function sendDataToPHP(content) {
            //     // Membuat objek XMLHTTPRequest
            //     var xhr = new XMLHttpRequest();

            //     // Menentukan metode, URL, dan apakah akan dilakukan secara asinkron atau tidak
            //     xhr.open('POST', 'scanAsisten.php', true);

            //     // Mengatur tipe konten yang akan dikirim
            //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            //     // Menangani respon dari server
            //     xhr.onreadystatechange = function () {
            //         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            //             // Respon dari server (jika diperlukan)
            //             console.log(xhr.responseText);
            //             // document.getElementById('result').innerHTML = xhr.responseText;
            //         }
            //     };
            //     // // Mengirim data ke server
            //     xhr.send('data=' +  encodeURIComponent(content));
            // }
    
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
    
            // Panggil fungsi startScanning otomatis saat halaman dimuat
            startScanning();
        });
    </script>

    
</body>
</html>