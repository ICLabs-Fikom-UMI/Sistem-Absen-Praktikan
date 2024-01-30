
    <div class="container-1">
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
    </div>
    <div class="container-2">
        <div class="ket-hal">
            <h3>Daftar Kehadiran Mahasiswa</h3>
        </div>
        <form action="<?= BASEURL;?>/Asisten/Kehadiran" method="post">
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
                </div>
            </div>
        </form>
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
                    <?php foreach ($data['mhst'] as $value): ?>
                            <div class="display-view-3">
                                <div class="display-no-2">
                                    <h3 class="font-view">
                                    </h3>
                                </div>
                                <div class="display-NIM-2">
                                    <h3 class="font-view">
                                        <?php echo $value['stb']; ?>
                                    </h3>
                                </div>
                                <div class="display-nama-2">
                                    <h3 class="font-view">
                                        <?php echo $value['nama'] ?>
                                    </h3>
                                </div>
                                <div class="display-kelas-2">
                                    <h3 class="font-view">
                                        <?php echo $value['kelas']; ?>
                                    </h3>
                                </div>
                                <div class="display-pertemuan-22">
                                    <?php foreach($value['status'] as $status): ?>
                                         <div class="display-jumlah-pertemuan-1">
                                            <h4 class="font-pertemuan">
                                            <?php echo $status; ?>
                                            </h4>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                    <div>
                                        <button type="button" class="button-delete">Edit</button>
                                    </div>
                                    <div>
                                    <button type="button" class="button-delete">Delete</button>
                                </div>
                            </div>
                    <?php endforeach; ?>  
                </div>
           </div> 
        </div>

    </div>
</body>
</html>