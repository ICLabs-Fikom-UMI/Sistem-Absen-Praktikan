
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
            <h3>Penginputan Data Mahasiswa</h3>
        </div>
        <div class="form-input">
            <form action="<?= BASEURL; ?>/Admin/inputData" method="post" class="form">
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Nama</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="nama" id="" placeholder="Masukkan Nama Mahasiswa">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">NIM</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="NIM" id="" placeholder="Masukkan NIM">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Kode Kelas</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="kodeKelas" id="" placeholder="Masukkan Kode Kelas">
                    </div>
                </div>
                <div class="display-input">
                    <div class="ket-input">
                        <label for="">Frekuensi</label>
                    </div>
                    <div class="column-input">
                        <input class="input" type="text" name="frekuensi" id="" placeholder="Masukkan Frekuensi">
                    </div>
                </div>
                <div class="button">
                    <div class="display-button-simpan">
                        <input type="submit" name="sub" class="button-simpan" value="Simpan" >
                    </div>
                    <div class="display-button-batal">
                        <button class="button-batal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>