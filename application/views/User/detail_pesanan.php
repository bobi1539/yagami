<div class="panel-status-pesanan">
    <div class="container">
        <div class="col-md-12 status-pesanan-con">
            <div class="row">
                <div class="col-md-7">
                    <?= $this->session->flashdata('pesan'); ?>
                    <h3>Detail Pengiriman</h3>
                    <a href="<?= base_url('User'); ?>" class="btn btn-login float-right"> Batal</a>
                    <br>
                    <?php if ($alamat_user != null) { ?>
                        <p>Alamat rumah tersimpan anda.</p>
                        <?php foreach ($alamat_user as $au) : ?>
                            <div class="row">
                                <div class="alamat-user-con col-md-11">
                                    <hr>
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
                                    <a class="btn btn-login" style="margin-top: -1px;" href="<?= base_url('User/checkoutAlamat/') . $au['id_alamat']; ?>">Pilih Alamat</a>
                                    <hr>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <p>Anda belum memiliki alamat di daftar alamat.</p>
                        <a class="navbar-status-pesanan" href="<?= base_url('User/tambahAlamat'); ?>">Tambah Alamat</a>
                        <br><br>
                    <?php } ?>
                </div>