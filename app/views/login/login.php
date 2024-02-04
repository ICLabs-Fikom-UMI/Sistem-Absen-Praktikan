  
    <div class="body-login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card size-login mx-auto rounded-4">
                        <div class="d-flex ">
                            <img class="logo-login" src="<?= BASEURL; ?>/img/logo.png" alt="">
                            <h5 class="ms-2 fs-2 jenis-font-label text-center text-white">Sistem <br> Absensi Praktikan</h5>
                        </div>
                        <div class="card-body form-login-2">
                            <div class="login-form">
                                <h2 class="text-center jenis-font-ket">Login</h2>
                                <form class="potition-form-login" action="<?= BASEURL; ?>/Login/session" method="post">
                                    <div class="form-group">
                                        <label class="jenis-font-label" for="username">Masukkan NIM</label>
                                        <input type="text" class="form-control border border-black" name="stb" placeholder="NIM" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="jenis-font-label" for="password">Masukkan Password:</label>
                                        <input type="password" class="form-control border border-black"  name="password" placeholder="password" required>
                                    </div>
                                    <div class="container mt-5 d-flex justify-content-center">
                                        <button type="submit" class="button-simpan mt-5">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>