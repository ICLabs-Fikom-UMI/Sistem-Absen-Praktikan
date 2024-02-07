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
                         <a href="<?= BASEURL; ?>/Admin/inputDataPraktikum" class="list-group-item list-group-item-action font-select color-bg border border-0">Input Data Praktikum</a>
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
                <form class="mt-5 jarak-form" action="<?= BASEURL; ?>/Admin/dataMahasiswa" method="post">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-1 col-form-label jenis-font-label">Frekuensi</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control border border-black jenis-font-label" name="cari" placeholder="Masukkan Frekuensi" required>
                        </div>
                    </div>
                    <div class="container mt-5 ms-5 jarak">
                        <div class="mt-5 ms-5">
                            <input class="button-simpan jenis-font-label" type="submit">
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
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['mhs'] as $value): ?>
                                            <tr>
                                                <td>
                                                    <?php  ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['stb'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['nama'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['kelas'] ?>
                                                </td>
                                                <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button></td>
                                                <td><button type="button" class="btn btn-danger btn-sm" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Delete</button></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- model untuk edit data -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= BASEURL;?>/Admin/updateDataMahasiswa">
                                <?php foreach($data['mhs'] as $value): ?>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">NIM</label>
                                        <input type="text" class="form-control" name="stb" value= <?php echo $value['stb']?> readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" value= <?php echo $value['nama'] ?>>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Kode Kelas</label>
                                        <input type="text" class="form-control" name="kelas" value= <?php echo $value['kode_kelas']?>>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Frekuensi</label>
                                        <input type="text" class="form-control" name="frekuensi" value= <?php echo $value['frekuensi'] ?> readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Frekuensi Baru</label>
                                        <input type="text" class="form-control" name="frekuensiBaru" value="NULL">
                                    </div>
                                <?php endforeach; ?>
                               
                                <div class="modal-footer">
                                    <button type="button" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" data-bs-dismiss="modal">Simpan</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>


                    <!-- model untuk delete data -->
                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Yakin Ingin Menghapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container d-flex justify-content-center">
                                    <img class="" src="<?= BASEURL; ?>/img/Delete.png" alt="">
                                </div>
                                        <?php $temp ?>
                                        <?php foreach ($data['mhs'] as $value): ?>
                                            <?php $temp['stb'] =  $value['stb'] ?>
                                        <?php endforeach; ?>
                                        <div class="modal-footer">
                                            <button  class="btn button-simpan-2 bg-primary rounded-4  jenis-font-labely" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Batal</button>
                                            <a class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" style="background-color: red; text-decoration: none; color: white;" href="<?= BASEURL; ?>/Admin/deleteDataMahasiswa/<?= $temp['stb'] ?>">Delete</a>
                                        </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    


            </div>
        </div>
    </div>