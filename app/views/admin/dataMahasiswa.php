    <div class="body-beranda">
        <div class="side-bar">
            <div class="d-flex mt-4 align-items-center mr-5">
                <img class="size-logo" src="<?= BASEURL; ?>/img/logo.png" alt="">
                <h5 class="jenis-font-label text-left fs-6 text-white">Sistem Absen<br>Praktikan</h5>
            </div>
            <div class="menu">
                <ul class="list-group">
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/inputData" class="list-group-item list-group-item-action font-select color-bg border border-0">Input Data Mahasiswa</a>
                   </li>
                    <li>
                         <a href="<?= BASEURL; ?>/Admin/inputDataPraktikan" class="list-group-item list-group-item-action font-select color-bg border border-0">Input Data Praktikum</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/dataMahasiswa" class="list-group-item list-group-item-action font-select color-bg border border-0">Data Mahasiswa</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/daftarAbsen" class="list-group-item list-group-item-action font-select color-bg border border-0">Daftar Kehadiran</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>/Admin/daftarPerizinan" class="list-group-item list-group-item-action font-select color-bg border border-0">Daftar Perizinan</a>
                    </li>
                </ul>
            </div>
            <div class="menu-2 d-flex align-items-center">
                <ul>
                    <li>
                        <a 
                            href="<?= BASEURL; ?>/Login/index" class="list-group-item list-group-item-action font-select border border-0">
                            <img src="<?= BASEURL?>/img/out.png" alt=""> Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="content-beranda">
                <div class="container d-flex justify-content-center">
                    <label class="jenis-font-label fs-4" for="">Data Mahasiswa</label>
                </div>
                <form class="mt-5 jarak-form">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-1 col-form-label jenis-font-label">Frekuensi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control border border-black jenis-font-label" name="stb" placeholder="Masukkan Frekuensi" required>
                        </div>
                    </div>
                    <div class="container mt-5 ms-5 jarak">
                        <div class="mt-5 ms-5">
                            <input class="button-simpan jenis-font-label" type="submit" name="cari" value="Simpan">
                        </div>
                    </div>
                </form> 
                <div class="container mt-5">
                        <div class="row">
                            <div class="col">
                                <div class="overflow-auto" style="height: 300px;">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Edit  </th>
                                        <th>Buka</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>13020210048</td>
                                            <td>Ahmad Rendi</td>
                                            <td>A1</td>
                                            <td><button type="button" class="btn btn-primary btn-sm">Edit</button></td>
                                            <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>          
            </div>
        </div>
    </div>