<div class="app-main__outer">
   <div class="app-main__inner">
      <div class="app-page-title">
         <div class="page-title-wrapper">
            <div class="page-title-heading">
               <div class="page-title-icon">
                  <i style="color: #ff5740" class="icofont-dashboard-web"></i>
                  </i>
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

   <div class="app-main__inner sm">
      <?= $this->session->flashdata('pesan'); ?>
      <div class="tab-content">
         <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="row">
               <div class="col-sm-12 mx-auto">
                  <div class="main-card mb-3 card ">
                     <div class="card-body">
                        <h5 class="card-title">Data Pesanan</h5>
                        <table class="mb-0 table table-bordered">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>No Pesanan</th>
                                 <th>Email</th>
                                 <th>Produk</th>
                                 <th class="text-center">Ukuran</th>
                                 <th class="text-center">Jumlah</th>
                                 <th class="text-center">Dikirim</th>
                                 <th class="text-center">Diterima</th>
                                 <th class="text-center" colspan="2">Aksi</th>

                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($pesanan as $ps) : ?>
                                 <tr>
                                    <th scope="row"><?= ++$start; ?></th>
                                    <td><?= $ps['waktu']; ?></td>
                                    <td><?= $ps['email']; ?></td>
                                    <td>
                                       <?php
                                       $idProduk = $ps['id_produk'];
                                       $produk = $this->db->get_where('tbl_produk', ['id_produk' => $idProduk])->result_array();
                                       foreach ($produk as $pr) {
                                          echo $pr['nama_produk'];
                                       }
                                       ?>
                                    </td>
                                    <td class="text-center"><?= $ps['ukuran_produk']; ?></td>
                                    <td class="text-center"><?= $ps['jumlah_beli']; ?></td>
                                    <?php if ($ps['dikirim'] == 'belum') : ?>
                                       <td class="text-center text-danger">
                                          <strong> <?= $ps['dikirim']; ?></strong>
                                       </td>
                                    <?php else : ?>
                                       <td class="text-center text-primary">
                                          <strong><?= $ps['dikirim']; ?></strong>
                                       </td>
                                    <?php endif; ?>
                                    <?php if ($ps['diterima'] == 'belum') : ?>
                                       <td class="text-center text-danger">
                                          <strong> <?= $ps['diterima']; ?></strong>
                                       </td>
                                    <?php else : ?>
                                       <td class="text-center text-primary">
                                          <strong><?= $ps['diterima']; ?></strong>
                                       </td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                       <a href="<?= base_url('Admin/detailPesanan/') . $ps['id_bayar']; ?>" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                    <td class="text-center">
                                       <?php if ($ps['diterima'] != 'belum') : ?>
                                          <a href="<?= base_url('Admin/hapusPesanan/') . $ps['id_bayar']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dihapus?')">Hapus</a>
                                       <?php endif; ?>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?= $this->pagination->create_links(); ?>
            <div class="row">
               <div class="col-md-12">
                  <div class="main-card mb-3 card">
                     <div class="card-header">
                        Ulasan Pelanggan
                     </div>
                     <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                           <thead>
                              <tr>
                                 <th class="text-center">#</th>
                                 <th>Nama</th>
                                 <th class="text-center">Ulasan</th>
                                 <th class="text-center" width="100">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($ulasan as $ul) : ?>
                                 <tr>
                                    <td class="text-center text-muted"><?= $ul['id_ulasan']; ?></td>
                                    <td><?= $ul['nama_depan'] . " " . $ul['nama_belakang']; ?></td>
                                    <td><?= $ul['ulasan']; ?></td>
                                    <td class="text-center">
                                       <a class="btn btn-sm btn-danger" onclick="return confirm('Yakin data dihapus?')" href="<?= base_url('Admin/hapusUlasan/') . $ul['id_ulasan']; ?>">Hapus</a>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>