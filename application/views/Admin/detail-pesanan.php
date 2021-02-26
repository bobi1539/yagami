<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i style="color: #ff5740" class="icofont-dashboard-web"></i>
               </div>
               <div>
                  <h4>Dashboard Administrator</h4>
                  <div class="page-title-subheading">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="app-main__inner ">
      <div class="tab-content">
         <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
               <div class="col-md-10 mx-auto">
                  <div class="main-card mb-3 card ">
                     <div class="card-body">
                        <h5 class="card-title mb-4">Detail Pesanan</h5>
                        <hr>
                        <div class="row">
                           <div class="col-md-4">
                              <p>No Pesanan </p>
                           </div>
                           <div class="col-md">
                              <p><?= $detail['waktu']; ?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <p>Nama Pemesan </p>
                           </div>
                           <div class="col-md">
                              <p><?= $detail['nama']; ?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <p>Email Pemesan </p>
                           </div>
                           <div class="col-md">
                              <p><?= $detail['email']; ?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <p>No Telepon</p>
                           </div>
                           <div class="col-md">
                              <p><?= $detail['telepon']; ?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <p>Alamat </p>
                           </div>
                           <div class="col-md">
                              <p>
                                 <?= $detail['jalan1']; ?>
                                 <?php if ($detail['jalan2'] != null) {
                                    echo "<br>" . $detail['jalan2'];
                                 } ?>
                                 <br>
                                 <?= $detail['kota']; ?>
                              </p>
                           </div>
                        </div>
                        <!-- produk -->
                        <?php
                        $produk = $this->db->get_where('tbl_produk', ['id_produk' => $detail['id_produk']])->row_array();
                        ?>
                        <div class="row">
                           <div class="col-md-4">
                              <img width="200" class="img-thumbnail" src="<?= base_url('assets/images/') . $produk['gambar_produk']; ?>">
                           </div>
                           <div class="col-md">
                              <p>
                                 <?= $produk['nama_produk']; ?> <br>
                                 Ukuran : <?= $detail['ukuran_produk']; ?> <br>
                                 Jumlah : <?= $detail['jumlah_beli']; ?>
                              </p>
                           </div>
                        </div>
                        <hr>
                        <form action="<?= base_url('Admin/updatePesanan'); ?>" method="POST">
                           <input type="hidden" name="id_bayar" value="<?= $detail['id_bayar']; ?>">
                           <div class="row">
                              <div class="col-md-4">
                                 <label for="dikirim">Dikirim</label>
                              </div>
                              <div class="col-md-4">
                                 <select class="form-control" name="dikirim" id="dikirim">
                                    <?php if ($detail['dikirim'] == 'belum') : ?>
                                       <option value="<?= $detail['dikirim']; ?>"><?= $detail['dikirim']; ?></option>
                                       <option value="sudah">sudah</option>
                                    <?php else : ?>
                                       <option value="<?= $detail['dikirim']; ?>"><?= $detail['dikirim']; ?></option>
                                       <option value="belum">belum</option>
                                    <?php endif; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-md-4">
                                 <label for="kurir">Kurir</label>
                              </div>
                              <div class="col-md-4">
                                 <select class="form-control" name="kurir" id="kurir">
                                    <option value="<?= $detail['kurir']; ?>"><?= $detail['kurir']; ?></option>
                                    <option value="JNE">JNE</option>
                                    <option value="JNT">JNT</option>
                                    <option value="NINJA VAN">NINJA VAN</option>
                                 </select>
                              </div>
                           </div>
                           <div class="row mt-2">
                              <div class="col-md-4">
                                 <label for="no_resi">No Resi</label>
                              </div>
                              <div class="col-md-4">
                                 <input name="no_resi" type="text" class="form-control" id="no_resi" value="<?= $detail['no_resi']; ?>">
                              </div>
                           </div>
                           <hr>
                           <div class="row mt-2">
                              <div class="col-md-4">
                                 <label for="diterima">Diterima Pembeli</label>
                              </div>
                              <div class="col-md-4">
                                 <select class="form-control" name="diterima" id="diterima">
                                    <?php if ($detail['diterima'] == 'belum') : ?>
                                       <option value="<?= $detail['diterima']; ?>"><?= $detail['diterima']; ?></option>
                                       <option value="sudah">sudah</option>
                                    <?php else : ?>
                                       <option value="<?= $detail['diterima']; ?>"><?= $detail['diterima']; ?></option>
                                       <option value="belum">belum</option>
                                    <?php endif; ?>
                                 </select>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-login col-md-3">Update</button>
                           <a class="btn btn-login float-right" href="<?= base_url('Admin') ?>"><i class="icofont-arrow-left"></i> Kembali</a>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>