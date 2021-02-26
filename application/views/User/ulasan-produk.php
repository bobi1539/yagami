<div class="panel-status-pesanan">
   <div class="container">
      <div class="col-md-12 status-pesanan-con">
         <div class="row">
            <div class="col-md-9 mb-5">
               <?= $this->session->flashdata('pesan'); ?>
               <?= form_error('ulasan', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span></button>', '</div>'); ?>
               <h3>Ulasan Anda</h3>
               <a class="navbar-status-pesanan" href="" data-toggle="modal" data-target="#modalUlasan">Buat Ulasan</a>
               <br><br>
               <?php if ($ulasan != null) : ?>
                  <?php foreach ($ulasan as $ul) : ?>
                     <!--start testimonial single-->
                     <div class="testi-single two bg-white mb-3">
                        <div class="client-img">
                           <img src="<?= base_url('assets/images/profil/') . $ul['gambar']; ?>" class="img-fluid" alt="">
                        </div>
                        <div class="client-comment">
                           <div class="row">
                              <div class="col">
                                 <span class="rating-star"><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i><i class="icofont-star"></i></span>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <p>"<?= $ul['ulasan'] ?>"</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <h4><?= $ul['nama_depan'] . " " . $ul['nama_belakang']; ?></h4>
                              </div>
                              <div class="col">
                                 <a class="navbar-status-pesanan float-right" onclick="return confirm('Yakin ulasan dihapus?')" href="<?= base_url('User/hapusUlasan/') . $ul['id_ulasan']; ?>">Hapus</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--end testimonial single-->
                  <?php endforeach; ?>
               <?php else : ?>
                  <p>Anda belum memiliki ulasan produk.</p>
               <?php endif; ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalUlasan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Ulasan Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action="<?= base_url('User/tambahUlasan') ?>" method="POST">
                        <div class="modal-body">
                           <input type="hidden" name="email" value="<?= $user['email']; ?>">
                           <input type="hidden" name="nama_depan" value="<?= $user['nama_depan']; ?>">
                           <input type="hidden" name="nama_belakang" value="<?= $user['nama_belakang']; ?>">
                           <input type="hidden" name="gambar" value="<?= $user['gambar']; ?>">
                           <div class="form-group">
                              <textarea name="ulasan" class="form-control" id="ulasan" rows="3"></textarea>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-login mr-2" data-dismiss="modal">Batal</button>
                           <button type="submit" class="btn btn-login">Kirim</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>