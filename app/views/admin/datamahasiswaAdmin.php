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
                <a href="<?= BASEURL; ?>/Admin/inputData" class="font-select">Input Data</a>
            </div>
            <div class="select">
                <a href="<?= BASEURL; ?>/Admin/dataMahasiswa" class="font-select">Data Mahasiswa</a>
            </div>
            <div class="select">
                <a href="<?= BASEURL; ?>/Admin/daftarAbsen" class="font-select">Daftar Kehadiran</a>
            </div>
            <div class="select">
                <a href="<?= BASEURL; ?>/Admin/daftarPerizinan" class="font-select">Daftar Perizinan</a>
            </div>
        </div>
        <div class="out">
            <a class="text-out" href="<?= BASEURL;?>/Login/index">logout</a>
        </div>
    </div>
    <div class="container-2">
        <div class="ket-hal">
            <h3>Data Mahasiswa</h3>
        </div>
        <form action="<?= BASEURL; ?>/Admin/dataMahasiswa" method="post">
            <div class="display-input">
                <div class="ket-hal-2">
                    <h3 class="font-ket-hal-2">Frekuensi</h3>
            </div>
                <div class="column-input">
                    <input class="ket-column-input" type="text" name="cari" placeholder="Masukkan Frekuensi">
                </div>
            </div>
            <div class="display-search">
                <div class="ket-hal-3">
                    <button class="button" id="search" name="search">search</button>
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
                <div class="display-edit">
                    <h3 class="font-view">Edit</h3>
                </div>
                <div class="display-delete">
                    <h3 class="font-view">Delete</h3>
                </div>      
            </div>
            <div class="scroll-view-data" style="height: 250px;">
                <div class="display-view-2">
                    <?php foreach ($data['mhs'] as $value): ?>
                        
                        <div class="display-view-3">
                            <div class="display-no-2">
                                <h3 class="font-view">
                                    <?php 
                                    $no = 1;
                                    $no++;
                                    // echo $no;
                                    ?>
                                </h3>
                            </div>
                            <div class="display-NIM-2">
                                <h3 class="font-view">
                                    <?php echo $value['stb']; ?>
                                </h3>
                            </div>
                            <div class="display-nama-2">
                                <h3 class="font-view">
                                     <?php echo $value['nama']; ?>
                                </h3>
                            </div>
                            <div class="display-kelas-2">
                                <h3 class="font-view">
                                    <?= $value['kelas']; ?>
                                </h3>
                            </div>
                            <div class="display-edit-2">
                                <h3 class="font-view">edit</h3>
                            </div>
                            <div class="display-delete-2">
                            <a class="button-delete" style="background-color: red; text-decoration: none; color: white;" href="<?= BASEURL; ?>/Admin/deleteDataMahasiswa/<?= $value['stb'] ?>">Delete</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
           </div> 
        </div>

    </div>
</body>
</html>