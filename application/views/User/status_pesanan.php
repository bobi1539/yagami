<div class="panel-status-pesanan">
   <div class="container">
      <div class="col-md-12 status-pesanan-con">
         <div class="row">
            <div class="col-md-9 mb-5">
               <h3>Pesanan Anda</h3>
               <?php
               $query = "SELECT * FROM tbl_buat_pesanan WHERE EXISTS (SELECT * FROM tbl_keranjang WHERE tbl_buat_pesanan.waktu = tbl_keranjang.waktu)";
               $isian = $this->db->query($query)->result_array();
               ?>

               <?php if ($status_pesanan != null) : ?>
                  <p>Pesanan anda sedang kami proses. Silahkan transfer ke Bank BCA sesuai total harga belanja anda.</p>
                  <p>No Rek : 075-213-123 <br>
                     Atas Nama : Yagami</p>
                  <?php foreach ($status_pesanan as $sp) : ?>
                     <?php
                     $id_produk = $sp['id_produk'];
                     $id_alamat = $sp['id_alamat'];
                     $keranjang =  $this->db->get_where('tbl_keranjang', ['id_produk' => $id_produk])->row_array();
                     $alamat = $this->db->get_where('tbl_alamat_user', ['id_alamat' => $id_alamat])->row_array();

                     //waktu
                     $waktu_pesanan = $sp['waktu'];
                     $harga = $keranjang['harga_produk'];
                     $jumlah_beli = $sp['jumlah_beli'];
                     $total_harga = $harga * $jumlah_beli;
                     ?>
                     <div class="row">
                        <div class="col-md-10">
                           <div id="accordion" role="tablist">
                              <!--start faq single-->
                              <div class="card">
                                 <div class="card-header" role="tab" id="faq1">
                                    <h6 class="mb-0">
                                       <a data-toggle="collapse" href="#collapse<?= $sp['id_bayar']; ?>" aria-expanded="false" aria-controls="collapse1" class="collapsed">Nomor Pesanan : <?= $waktu_pesanan; ?></a>
                                    </h6>
                                 </div>
                                 <div id="collapse<?= $sp['id_bayar']; ?>" class="collapse" role="tabpanel" aria-labelledby="faq1" data-parent="#accordion">
                                    <div class="card-body">
                                       <div class="row">
                                          <div class="col-md-4 mt-5">
                                             <img style="width: 200px;" src="<?= base_url('assets/images/') . $keranjang['gambar_produk']; ?>">
                                          </div>
                                          <div class="col-md-8">
                                             <p>Nomor Pesanan : <?= $waktu_pesanan; ?></p>
                                             <p>
                                                <strong>
                                                   <?php if ($sp['dikirim'] != 'belum' && $sp['diterima'] == 'belum') {
                                                      echo "Pesanan anda sedang dikirim oleh kurir " . $sp['kurir'] . " <br> Nomor Resi : " . $sp['no_resi'];
                                                   } ?>
                                                   <?php if ($sp['diterima'] == 'sudah') {
                                                      echo "Pesanan ini sudah anda terima dari kurir " . $sp['kurir'];
                                                   } ?>
                                                </strong>
                                             </p>
                                             <h5><?= $keranjang['nama_produk']; ?></h5>
                                             <table>
                                                <tr>
                                                   <td width="100px">Ukuran</td>
                                                   <td width="50px">:</td>
                                                   <td><?= $sp['ukuran_produk']; ?></td>
                                                </tr>
                                                <tr>
                                                   <td>Harga</td>
                                                   <td>:</td>
                                                   <td>Rp. <?= number_format($keranjang['harga_produk']); ?></td>
                                                </tr>
                                                <tr>
                                                   <td>Jumlah</td>
                                                   <td>:</td>
                                                   <td><?= $sp['jumlah_beli']; ?></td>
                                                </tr>
                                                <tr>
                                                   <td>Total</td>
                                                   <td>:</td>
                                                   <td>Rp. <?= number_format($total_harga); ?></td>
                                                </tr>
                                             </table>
                                          </div>
                                       </div>
                                       <hr style="border:2px solid #e6f0fa;">
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="row">
                                                <h4 class="col-md-12">Alamat Pengiriman</h4>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <p><?= $alamat['nama_depan']; ?> <?= $alamat['nama_belakang']; ?>
                                                      <br>
                                                      <?= $alamat['nama_jalan1']; ?>
                                                      <br>
                                                      <?php
                                                      if ($alamat['nama_jalan2'] != null) {
                                                         echo $alamat['nama_jalan2'] . '<br>';
                                                      } ?>
                                                      <?= $alamat['provinsi']; ?>, <?= $alamat['kota']; ?>, <?= $alamat['kecamatan']; ?>, <?= $alamat['kelurahan']; ?>
                                                      <br>
                                                      <?= $alamat['negara']; ?>
                                                   </p>

                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <h6>Telepon : <?= $alamat['no_telepon']; ?></h6>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!--end faq single-->
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php else : ?>
                  <p>Anda tidak memiliki pesanan.</p>
                  <div class="hero-btn">
                     <a href="<?= base_url('HomePage'); ?>">Berbelanja<i class="fa fa-long-arrow-alt-right"></i></a>
                  </div>
               <?php endif; ?>
            </div>