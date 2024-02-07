    <div class="body-edit">
        <div class="container  d-flex justify-content-center align-items-center">
            <div class="content-beranda mt-5 lebar-edit">
                <h1 class="modal-title fs-5" id="exampleModalLabel jenis-font-label">Form Edit Data Absen</h1>
                <form  class="mt-5" method="post" action="<?= BASEURL; ?>/Admin/updateDataAbsen">
                    <?php foreach ($data['mhst'] as $value): ?>
                        <div class="overflow-auto" style="height: 550px;">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label jenis-font-label">NIM:</label>
                            <input type="text" class="form-control" name="stb" value="<?php echo $value['stb']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label jenis-font-label">Nama:</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $value['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label jenis-font-label">Kelas:</label>
                            <input type="text" class="form-control" name="kelas" value="<?php echo $value['kelas']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label jenis-font-label">Kelas:</label>
                            <input type="text" class="form-control" name="frekuensi" value="<?php echo $value['frekuensi']; ?>">
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
                                    <option value="A">A (Alpa)</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="S">S</option>
                                    <option value="S">T (Tanpa Keterangan)</option>
                                    </select>
                                </td>
                            <?php endforeach; ?>
                    <?php endforeach; ?>
                    
                        <div class="modal-footer jarak-3 mt-5 m-4">
                        <a class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" style="background-color: red; text-decoration: none; color: white;" href="<?= BASEURL; ?>/Admin/daftarAbsen">Batal</a>
                            <button type="submit" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label">Simpan</button>
                        </div>
                    </div>
                    
                </form>
            </div> 
    
        </div>
    </div>