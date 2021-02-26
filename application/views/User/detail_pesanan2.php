<div class="panel-status-pesanan">
    <div class="container">
        <div class="col-md-12 status-pesanan-con">
            <div class="row">
                <div class="col-md-7">
                    <?= $this->session->flashdata('pesan'); ?>
                    <h3>Detail Pengiriman</h3>
                    <div class="row">
                        <div class="alamat-user-con col-md-11">
                            <hr>
                            <p><?= $alamat_user['nama_depan']; ?> <?= $alamat_user['nama_belakang']; ?>
                                <br>
                                <?= $alamat_user['nama_jalan1']; ?>
                                <br>
                                <?php
                                if ($alamat_user['nama_jalan2'] != null) {
                                    echo $alamat_user['nama_jalan2'] . '<br>';
                                } ?>
                                <?= $alamat_user['provinsi']; ?>, <?= $alamat_user['kota']; ?>, <?= $alamat_user['kecamatan']; ?>, <?= $alamat_user['kelurahan']; ?>
                                <br>
                                <?= $alamat_user['negara']; ?>
                            </p>
                            <h6>Telepon : <?= $alamat_user['no_telepon']; ?></h6>
                            <hr>
                        </div>
                    </div>
                    <h4>Metode Pembayaran</h4>
                    <p>
                        <strong>Transfer Bank BCA</strong> <br>
                        No Rek : 075-213-123 <br>
                        Atas Nama : Yagami
                    </p>
                    <hr>
                    <h4>Metode Pengiriman</h4>
                    <p>Free Shipping : <strong>Gratis</strong></p>
                    <hr>
                    <form action="<?= base_url('User/buatPesanan') ?>" method="POST">
                        <input name="id_alamat" type="hidden" value="<?= $alamat_user['id_alamat']; ?>">
                        <input name="nama" type="hidden" value="<?= $alamat_user['nama_depan'] . " " . $alamat_user['nama_belakang']; ?>">
                        <input name="jalan1" type="hidden" value="<?= $alamat_user['nama_jalan1']; ?>">
                        <input name="jalan2" type="hidden" value="<?= $alamat_user['nama_jalan2']; ?>">
                        <input name="kota" type="hidden" value="<?= $alamat_user['provinsi'] . ", " . $alamat_user['kota'] . ", " . $alamat_user['kecamatan'] . ", " . $alamat_user['kelurahan']; ?>">
                        <input name="telepon" type="hidden" value="<?= $alamat_user['no_telepon']; ?>">
                        <?php
                        $email = $this->session->userdata('email');
                        $query = "SELECT * FROM tbl_keranjang WHERE NOT EXISTS (SELECT * FROM tbl_buat_pesanan WHERE tbl_keranjang.id_keranjang = tbl_buat_pesanan.id_keranjang) AND email = '$email'";
                        $isian = $this->db->query($query)->result_array();
                        ?>
                        <?php foreach ($isian as $isi) : ?>
                            <?php if ($isi['email'] == $email) : ?>
                                <input name="id_keranjang[]" type="hidden" value="<?= $isi['id_keranjang']; ?>">
                                <input name="id_produk[]" type="hidden" value="<?= $isi['id_produk'];  ?>">
                                <input name="ukuran_produk[]" type="hidden" value="<?= $isi['ukuran_produk'];  ?>">
                                <input name="jumlah_beli[]" type="hidden" value="<?= $isi['jumlah_beli'];  ?>">
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <button class="btn btn-login" type="submit" name="buttonBuatPesanan">Buat Pesanan</button>
                        <a href="<?= base_url('User'); ?>" class="btn btn-login float-right">Batal</a>
                    </form>
                </div>