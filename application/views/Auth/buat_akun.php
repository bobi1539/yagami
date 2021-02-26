<div class="container">
    <div class="row" id="pwd-container">
        <div class="col-md-6 mx-auto">
            <section class="login-form">
                <form method="POST" action="<?= base_url('Auth/buatAkunAksi'); ?>" role="login">
                    <img width="150px" src="<?= base_url(); ?>assets/images/logo_yagami.png" class="img-responsive" alt="" />
                    <h3 class="text-center">REGISTRASI</h3>
                    <br>
                    <h5>NAMA ANDA</h5>

                    <input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control input-lg" value="<?= set_value('nama_depan'); ?>" />
                    <?= form_error('nama_depan', '<small class="text-danger">', '</small>'); ?>

                    <input type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control input-lg" value="<?= set_value('nama_belakang'); ?>" />
                    <?= form_error('nama_belakang', '<small class="text-danger">', '</small>'); ?>

                    <input type="text" name="no_telepon" placeholder="Nomor Telepon" class="form-control input-lg" value="<?= set_value('no_telepon'); ?>" />
                    <?= form_error('no_telepon', '<small class="text-danger">', '</small>'); ?>
                    <br><br>

                    <h5>JENIS KELAMIN</h5>

                    <label for="laki-laki" class="radio">
                        <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" class="radio-input">
                        <div class="radio-jk"></div>
                        Laki-laki
                    </label>
                    <label for="perempuan" class="radio">
                        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" class="radio-input">
                        <div class="radio-jk"></div>
                        Perempuan
                    </label>
                    <br>
                    <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                    <br><br>

                    <h5>DETAIL MASUK</h5>
                    <input type="email" name="email" placeholder="Email" class="form-control input-lg" value="<?= set_value('email'); ?>" />
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                    <input type="password" class="form-control input-lg" id="password" placeholder="Password"="" name="password" />
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <input type="password" class="form-control input-lg" id="password" placeholder="Konfirmasi Password"="" name="konfirmasi_password" />
                    <div>
                        <button class="btn btn-login col-md-4" type="submit" name="buttonDaftar">Daftar</button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Sudah Punya Akun ? <a class="buat-akun" href="<?= base_url('Auth/login') ?>">Login</a> </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>

</div>