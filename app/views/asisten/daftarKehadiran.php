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
                            <img src="<?= BASEURL; ?>/img/out.png" alt=""> Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="content-beranda">
                <div class="container d-flex justify-content-center">
                    <label class="jenis-font-label fs-4" for="">Daftar Kehadiran Mahasiswa</label>
                </div>
                <form class="mt-5 jarak-form" action="<?= BASEURL; ?>/Asisten/Kehadiran" method="post">
                        <div container d-flex>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-1 col-form-label jenis-font-label">NIM</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control border border-black jenis-font-label" name="stb" placeholder="Masukkan NIM">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-1 col-form-label jenis-font-label">frekuensi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control border border-black jenis-font-label" name="frekuensi" placeholder="Masukkan Frekuensi">
                                </div>
                            </div>
                        </div>
                    <div class="container mt-5 ms-5 jarak">
                        <div class="mt-5 ms-5">
                            <input class="button-simpan jenis-font-label" type="submit" name="cari" value="Kirim">
                        </div>
                    </div>
                </form>
                <div class="container mt-5">
                        <div class="row">
                            <div class="col">
                                <div class="overflow-auto" style="height: 300px;">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                            <th>Jumlah Pertemuan</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['mhst'] as $value): ?>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <?php echo $value['stb'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['nama'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['kelas'] ?>
                                                </td>
                                                    <?php foreach ($value['status'] as $status): ?>
                                                        <td>
                                                            <?php echo $status ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                <td>10</td>
                                                <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($data['mhst'] as $value): ?>
                                <form method="post" action="<?= BASEURL;?>/Asisten/updateData">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">NIM:</label>
                                        <input type="text" class="form-control" name="stb" value="<?php echo $value['stb'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama:</label>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $value['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Kelas:</label>
                                        <input type="text" class="form-control" name="kelas" value="<?php echo $value['kelas'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Kelas:</label>
                                        <input type="text" class="form-control" name="frekuensi" value="<?php echo $value['frekuensi'] ?>">
                                    </div>
                                    
                                        <?php foreach ($value['status'] as $status): ?>
                                            <td>
                                                <?php
                                                    $i;
                                                    $i++;
                                                    echo "Pertemuan " . $i;
                                                ?>
                                                <select class="form-select" aria-label="Default select example" name="status[]">
                                                <option selecteds style="width: 200px; !important"> <?php echo $status; ?></option>
                                                <option value="A">A</option>
                                                <option value="H">H</option>
                                                <option value="I">I</option>
                                                <option value="S">S</option>
                                                </select>
                                            </td>
                                        <?php endforeach; ?>
                                    <div class="modal-footer">
                                        <button type="button" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label">Simpan</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>