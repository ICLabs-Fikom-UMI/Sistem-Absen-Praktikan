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
                <form class="mt-5 jarak-form" action="<?= BASEURL;?>/Admin/daftarAbsen" method="post">
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
                                            <th>Frekuensi</th>
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
                                            <!-- <th>Delete</th> -->
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
                                                    <?php echo $value['frekuensi'] ?>
                                                </td>
                                                    <?php foreach ($value['status'] as $status): ?>
                                                        <td>
                                                            <?php echo $status ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                <td>10</td>
                                                <td>
                                                <a class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" style="background-color: red; text-decoration: none; color: white;" href="<?= BASEURL; ?>/Admin/viewUpdateDataAbsen/<?= $value['stb'] . "/" . $value['frekuensi'] ?>">Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>  
                        </div>
                    </div>



                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php foreach ($data['mhst'] as $value): ?>
                                <?php echo $idKedua . " " . $idPertama; ?>
                                <form method="post" action="<?= BASEURL;?>/Admin/updateDataAbsen">
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
                    </div> -->



                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="<?= BASEURL;?>/Admin/updateDataAbsen">
                                        <input type="text" id="edit-stb" name="stb">
                                        <input type="text" id="edit-frekuensi" name="frekuensis">
                                        <?php echo $_POST['frekuensis'] . " " . "sini"; ?>
                                        <!-- Input lainnya -->
                                        <div class="mb-3">
                                            <label for="nama" class="col-form-label">Nama:</label>
                                            <input type="text" class="form-control" id="edit-nama" name="nama" value="">
                                        </div>
                                        <!-- Tambahkan input lainnya sesuai kebutuhan -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    <!-- <?php foreach ($data['mhst'] as $value): ?>
                                        <input type="hidden" id="edit-stb" name="stb">
                                        <input type="hidden" id="edit-frekuensi" name="frekuensi">
                                        <?php echo $_POST['frekuensi']; ?>
                                            <?php if($_POST['stb'] == $value['stb'] && $_POST['frekuensi'] == $value['frekuensi']): ?>
                                                <form method="post" action="<?= BASEURL;?>/Admin/updateDataAbsen">
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
                                            <?php endif; ?>
                                    <?php endforeach; ?> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    
            </div>
        </div>
    </div>

    <script>
        var editButtons = document.querySelectorAll('.btn-edit');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var stb = this.getAttribute('data-stb');
                var frekuensi = this.getAttribute('data-frekuensi');

                // Isi nilai input pada modal dengan data yang dipilih
                document.getElementById('edit-stb').value = stb;
                document.getElementById('edit-frekuensi').value = frekuensi;

                console.log(stb);
                console.log(frekuensi);

                // Tampilkan modal
                var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
            });
        });
    </script>

