<div class="panel-status-pesanan">
    <div class="container">
        <div class="col-md-12 status-pesanan-con">
            <div class="row">
                <div class="col-md-9">
                    <?= $this->session->flashdata('pesan'); ?>
                    <h3>Daftar Alamat</h3>
                    <a class="navbar-status-pesanan" href="<?= base_url('User/tambahAlamat'); ?>">Tambah Alamat</a>
                    <br><br>
                    <?php if ($alamat_user != null) { ?>
                        <?php foreach ($alamat_user as $au) : ?>
                            <div class="row">
                                <div class="testi-single two bg-white alamat-user-con col-md-11">
                                    <p><?= $au['nama_depan']; ?> <?= $au['nama_belakang']; ?>
                                        <br>
                                        <?= $au['nama_jalan1']; ?>
                                        <br>
                                        <?php
                                        if ($au['nama_jalan2'] != null) {
                                            echo $au['nama_jalan2'] . '<br>';
                                        } ?>
                                        <?= $au['provinsi']; ?>, <?= $au['kota']; ?>, <?= $au['kecamatan']; ?>, <?= $au['kelurahan']; ?>
                                        <br>
                                        <?= $au['negara']; ?>
                                    </p>
                                    <h6>Telepon : <?= $au['no_telepon']; ?></h6>
                                    <p>
                                        <a class="navbar-status-pesanan" data-toggle="modal" data-target="#modalUbahAlamat<?= $au['id_alamat']; ?>" href="#">Edit Alamat</a> |
                                        <a onclick="return confirm('Yakin alamat dihapus?')" class="navbar-status-pesanan" href="<?= base_url('User/hapusAlamat/') . $au['id_alamat']; ?>">Hapus Alamat</a>
                                    </p>

                                    <!-- Modal ubah alamat-->
                                    <div class="modal fade" id="modalUbahAlamat<?= $au['id_alamat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Alamat</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url('User/ubahAlamat'); ?>" method="POST">
                                                        <h5>Informasi Kontak</h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="id_alamat" value="<?= $au['id_alamat']; ?>">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="nama_depan" placeholder="Nama Depan *" name="nama_depan" value="<?= $au['nama_depan']; ?>">
                                                                    <?= form_error('nama_depan', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="nama_belakang" placeholder="Nama Belakang *" name="nama_belakang" value="<?= $au['nama_belakang']; ?>">
                                                                    <?= form_error('nama_belakang', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="no_telepon" placeholder="Nomor Telepon *" name="no_telepon" value="<?= $au['no_telepon']; ?>">
                                                                    <?= form_error('no_telepon', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h5>Alamat</h5>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="nama_jalan1" placeholder="Nama Jalan *" name="nama_jalan1" value="<?= $au['nama_jalan1']; ?>">
                                                                    <?= form_error('nama_jalan1', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="nama_jalan2" placeholder="Nama Jalan 2" name="nama_jalan2" value="<?= $au['nama_jalan2']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control form-control-lg" id="negara" placeholder="Indonesia" name="negara" value="<?= $au['negara']; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="provinsi" placeholder="Provinsi *" name="provinsi" value="<?= $au['provinsi']; ?>">
                                                                    <?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="kota" placeholder="Kabupaten/Kota *" name="kota" value="<?= $au['kota']; ?>">
                                                                    <?= form_error('kota', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="kecamatan" placeholder="Kecamatan *" name="kecamatan" value="<?= $au['kecamatan']; ?>">
                                                                    <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control form-control-lg" id="kelurahan" placeholder="Kelurahan *" name="kelurahan" value="<?= $au['kelurahan']; ?>">
                                                                    <?= form_error('kelurahan', '<small class="text-danger">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-lg btn-login" type="submit" name="buttonUbah">Simpan</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-lg float-right btn-login" data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <p>Anda belum memiliki alamat di daftar alamat.</p>
                    <?php } ?>
                </div>