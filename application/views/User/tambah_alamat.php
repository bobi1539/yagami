<div class="panel-status-pesanan">
    <div class="container">
        <div class="col-md-12 status-pesanan-con">
            <div class="row">
                <div class="col-md-9">
                    <h3>Alamat Baru</h3>
                    <br>
                    <p>Silakan masukkan informasi alamat Anda.</p>
                    <br>
                    <form action="<?= base_url('User/tambahAlamat') ?>" method="POST">
                        <h4>Informasi Kontak</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="email" value="<?= $user['email']; ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="nama_depan" placeholder="Nama Depan *" name="nama_depan" value="<?= set_value('nama_depan'); ?>">
                                    <?= form_error('nama_depan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="nama_belakang" placeholder="Nama Belakang *" name="nama_belakang" value="<?= set_value('nama_belakang'); ?>">
                                    <?= form_error('nama_belakang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="no_telepon" placeholder="Nomor Telepon *" name="no_telepon" value="<?= set_value('no_telepon'); ?>">
                                    <?= form_error('no_telepon', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4>Alamat</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="nama_jalan1" placeholder="Nama Jalan *" name="nama_jalan1" value="<?= set_value('nama_jalan1'); ?>">
                                    <?= form_error('nama_jalan1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="nama_jalan2" placeholder="Nama Jalan 2" name="nama_jalan2" value="<?= set_value('nama_jalan2'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="negara" placeholder="Indonesia" name="negara" value="Indonesia" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="provinsi" placeholder="Provinsi *" name="provinsi" value="<?= set_value('provinsi'); ?>">
                                    <?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="kota" placeholder="Kabupaten/Kota *" name="kota" value="<?= set_value('kota'); ?>">
                                    <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="kecamatan" placeholder="Kecamatan *" name="kecamatan" value="<?= set_value('kecamatan'); ?>">
                                    <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="kelurahan" placeholder="Kelurahan *" name="kelurahan" value="<?= set_value('kelurahan'); ?>">
                                    <?= form_error('kelurahan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-lg btn-login col-md-12" type="submit" name="buttonUbah">Simpan Ke Buku Alamat</button>
                            </div>
                            <div class="col-md-6">
                                <div class="hero-btn">
                                    <a style="height: 48px;" href="<?= base_url('User/daftarAlamat'); ?>">Batalkan</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>