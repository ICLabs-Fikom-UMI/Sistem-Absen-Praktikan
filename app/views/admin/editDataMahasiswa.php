    <div class="body-edit">
        <div class="container  d-flex justify-content-center align-items-center">
            <div class="content-beranda mt-5 lebar-edit">
                <h1 class="modal-title fs-5" id="exampleModalLabel jenis-font-label">Form Edit Data Absen</h1>
                <form  class="mt-5" method="post" action="<?= BASEURL; ?>/Admin/updateDataMahasiswa">
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
                               
                        
                        <div class="modal-footer jarak-3 mt-5 m-4">
                        <a class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label" style="background-color: red; text-decoration: none; color: white;" href="<?= BASEURL; ?>/Admin/daftarAbsen">Batal</a>
                            <button type="submit" class="btn button-simpan-2 bg-primary rounded-4  jenis-font-label">Simpan</button>
                        </div>
                    </div>
                    
                </form>
            </div> 
    
        </div>
    </div>