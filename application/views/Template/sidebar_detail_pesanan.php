<!-- Side bar ringkasan pesanan -->
<div class="col-md-5">
    <h4 style="margin-bottom: -10px;">Ringkasan Pesanan</h4>
    <?php
    $email = $this->session->userdata('email');
    $query = "SELECT * FROM tbl_keranjang WHERE NOT EXISTS (SELECT * FROM tbl_buat_pesanan WHERE tbl_keranjang.id_keranjang = tbl_buat_pesanan.id_keranjang) AND email = '$email'";
    $isian = $this->db->query($query)->result_array();
    ?>
    <?php
    $total_beli = 0;
    $total_harga = 0;
    $total_semua = 0;
    if ($isian != null) : ?>
        <br>
        <?php foreach ($isian as $isi) : ?>
            <?php if ($isi['email'] == $email) : ?>
                <div class="row">
                    <div class="bg-white alamat-user-con col-md-11" style="padding: 10px; border-radius:10px;border: 3px solid #e6f0fa;">
                        <div class="row">
                            <div class="col-md-4 text-center mt-4">
                                <img width="100px" src="<?= base_url('assets/images/') . $isi['gambar_produk']; ?>">
                            </div>
                            <div class="col-md-8">
                                <br>
                                <h5><?= $isi['nama_produk']; ?></h5>
                                <table>
                                    <tr>
                                        <td>Harga</td>
                                        <td width="20px">:</td>
                                        <td><?= "Rp. " . number_format($isi['harga_produk']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td width="20px">:</td>
                                        <td><?= $isi['jumlah_beli']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $harga_produk = $isi['harga_produk'];
                $jumlah_beli = $isi['jumlah_beli'];
                $total_beli = $total_beli + $jumlah_beli;

                $total_harga = $harga_produk * $jumlah_beli;
                $total_semua = $total_semua + $total_harga;
                ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="row">
            <div class="bg-white alamat-user-con col-md-11" style="padding: 10px; border-radius:10px; border: 3px solid #e6f0fa;">
                <table>
                    <tr>
                        <td>
                            <h5>Jumlah Beli</h5>
                        </td>
                        <td width="50px" align="center">
                            <h5>:</h5>
                        </td>
                        <td>
                            <h5><?= $total_beli; ?></h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Total Harga</h5>
                        </td>
                        <td>
                            <h5 width="50px" align="center">:</h5>
                        </td>
                        <td>
                            <h5>Rp. <?= number_format($total_semua); ?></h5>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- end side bar ringkasan pesanan -->
</div>
</div>
<br><br><br>
</div>
</div>
<br><br><br>