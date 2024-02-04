    <div class="body-beranda">
        <div class="side-bar">
            <div class="d-flex mt-4 align-items-center mr-5">
                <img class="size-logo" src="<?= BASEURL; ?>/img/logo.png" alt="">
                <h5 class="jenis-font-label text-left fs-6 text-white">Sistem Absen<br>Praktikan</h5>
            </div>
            <div class="menu">
                <ul class="list-group">
                    <li>
                        <a href="<?= BASEURL; ?>/Asisten/Kehadiran" class="list-group-item list-group-item-action font-select color-bg border border-0">Daftar Kehadiran</a>
                   </li>
                    <li>
                         <a href="<?= BASEURL; ?>/Asisten/daftarPerizinan" class="list-group-item list-group-item-action font-select color-bg border border-0">Daftar Perizinan</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Asisten/perizinan" class="list-group-item list-group-item-action font-select color-bg border border-0">Perizinan</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Asisten/barkode" class="list-group-item list-group-item-action font-select color-bg border border-0">Buat Barkode</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Asisten/scan" class="list-group-item list-group-item-action font-select color-bg border border-0">Scan</a>
                    </li>
                </ul>
            </div>
            <div class="menu-2 d-flex align-items-center">
                <ul>
                    <li>
                        <a 
                            href="<?= BASEURL; ?>/Login/index" class="list-group-item list-group-item-action font-select border border-0">
                            <img src="<?= BASEURL;?>/img/out.png" alt=""> Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="content-beranda">
                <div class="container d-flex justify-content-center">
                    <label class="jenis-font-label fs-4" for="">Scan</label>
                </div>
                <div class="container mt-5">
                    <div class="container p-5 mt-5 d-flex justify-content-center">
                        <video id="preview"></video>
                        <audio id="scanSound" src="<?= BASEURL?>/music/Bike Ride.mp3"></audio>
                    </div>
                </div>
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