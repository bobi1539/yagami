<div class="panel-status-pesanan">
    <div class="container">
        <div class="col-md-12 status-pesanan-con">
            <div class="row">
                <div class="col-md-9">
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_error('password1', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>', '</div>'); ?>

                    <h3>Detail Anda</h3>
                    <br>
                    <a class="navbar-status-pesanan" href="" data-toggle="modal" data-target="#modalGantiPassword">Ganti Password</a>

                    <br><br>
                    <!-- Modal -->
                    <div class="modal fade" id="modalGantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Ganti Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('User/gantiPassword') ?>" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="email" value="<?= $user['email']; ?>">
                                        <div class="form-group">
                                            <label for="password1">Password Baru</label>
                                            <input name="password1" type="password" class="form-control" id="password1">
                                        </div>
                                        <div class="form-group">
                                            <label for="password2">Konfirmasi Password</label>
                                            <input name="password2" type="password" class="form-control" id="password2">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-login mr-2" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-login">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('User/ubahDataAkun') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_depan">
                                        <h5>Nama Depan</h5>
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="nama_depan" placeholder="Nama Depan" name="nama_depan" value="<?= $user['nama_depan']; ?>">
                                    <?= form_error('nama_depan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_belakang">
                                        <h5>Nama Belakang</h5>
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="nama_belakang" placeholder="Nama Belakang" name="nama_belakang" value="<?= $user['nama_belakang']; ?>">
                                    <?= form_error('nama_belakang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="no_telepon">
                                                <h5>No Telepon</h5>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" id="no_telepon" placeholder="No Telepon" name="no_telepon" value="<?= $user['no_telepon']; ?>">
                                            <?= form_error('no_telepon', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <h5>Jenis Kelamin</h5>
                                        <div class="form-group">
                                            <select class="form-control form-control-lg" name="jenis_kelamin">
                                                <option value="<?= $user['jenis_kelamin']; ?>"><?= $user['jenis_kelamin']; ?></option>
                                                <?php if ($user['jenis_kelamin'] == 'Laki-laki') { ?>
                                                    <option value="Perempuan">Perempuan</option>
                                                <?php } else { ?>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email">
                                                <h5>Email</h5>
                                            </label>
                                            <input type="text" class="form-control form-control-lg" id="email" placeholder="Nama Belakang" name="email" value="<?= $user['email']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telepon">
                                        <h5>Foto Profil</h5>
                                    </label>
                                    <div class="custom-file">
                                        <input name="gambar" type="file" class="custom-file-input form-control-lg" id="sampul" onchange="previewImg()">
                                        <label class="custom-file-label form-control-lg" for="sampul"><?= $user['gambar']; ?></label>
                                    </div>
                                    <img width="200" class="img-thumbnail mt-3 img-preview" src="<?= base_url('assets/images/profil/' . $user['gambar']); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-lg btn-login col-md-12" type="submit" name="buttonUbah">Simpan Perubahan </button>
                            </div>
                        </div>
                    </form>
                </div>