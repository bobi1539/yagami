<div class="panel-status-pesanan">
    <div class="container">
        <div class="col-md-12 status-pesanan-con">
            <div class="row">
                <div class="col-md-9">
                    <h3>Halo <?= $user['nama_depan']; ?></h3>
                    <br>
                    <?php
                    $email = $this->session->userdata('email');
                    $query = "SELECT * FROM tbl_keranjang WHERE NOT EXISTS (SELECT * FROM tbl_buat_pesanan WHERE tbl_keranjang.id_keranjang = tbl_buat_pesanan.id_keranjang) AND email = '$email'";
                    $isian = $this->db->query($query)->result_array();
                    ?>
                    <?php if ($isian != null) : ?>
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Isi Keranjang Anda</h4>
                            </div>
                            <div class="col-md-4">
                                <a class="navbar-status-pesanan" href="<?= base_url('HomePage'); ?>">Lanjutkan Belanja</a>
                            </div>
                        </div>
                        <br>
                        <?php foreach ($isian as $isi) : ?>
                            <?php if ($isi['email'] == $email) : ?>
                                <?php
                                $harga = $isi['harga_produk'];
                                $jumlah_beli = $isi['jumlah_beli'];
                                $total_harga = $harga * $jumlah_beli;
                                ?>
                                <div class="row">
                                    <div class="bg-white alamat-user-con col-md-11" style="padding: 20px; border-radius:10px; margin:20px;border: 3px solid #e6f0fa;">
                                        <div class="row">
                                            <div class="col-md-4 mt-5">
                                                <img style="width: 200px;" src="<?= base_url('assets/images/') . $isi['gambar_produk']; ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <br>
                                                <h5><?= $isi['nama_produk']; ?></h5>
                                                <hr style="border:1px solid #e6f0fa">
                                                <table>
                                                    <tr>
                                                        <td width="100px">Ukuran</td>
                                                        <td width="50px">:</td>
                                                        <td><?= $isi['ukuran_produk']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga</td>
                                                        <td>:</td>
                                                        <td>Rp. <?= number_format($isi['harga_produk']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah</td>
                                                        <td>:</td>
                                                        <td><?= $isi['jumlah_beli']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td>:</td>
                                                        <td>Rp. <?= number_format($total_harga); ?></td>
                                                    </tr>
                                                </table>
                                                <p>
                                                    <a class="navbar-status-pesanan" href="<?= base_url('User/hapusKeranjang/' . $isi['id_keranjang']); ?>">Hapus</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="hero-btn">
                            <a href="<?= base_url('User/checkout') ?>">Checkout<i class="fa fa-long-arrow-alt-right"></i></a>
                        </div>
                    <?php else : ?>
                        <p>Anda tidak memiliki produk di keranjang.</p>
                        <div class="hero-btn">
                            <a href="<?= base_url('HomePage'); ?>">Berbelanja<i class="fa fa-long-arrow-alt-right"></i></a>
                        </div>
                    <?php endif; ?>
                </div>