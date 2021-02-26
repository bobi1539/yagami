<div class="container">
   <div class="row">
      <div class="col-md-4 mx-auto mt-4" style="margin-bottom: -50px;">
         <?= $this->session->flashdata('pesan'); ?>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 mx-auto">
         <section class="login-form">
            <form method="POST" action="<?= base_url('Auth/gantiPassword'); ?>" role="login">
               <img width="150px" src="<?= base_url() ?>assets/images/logo_yagami.png" class="img-responsive" alt="" />
               <h6 class="text-center">Ganti password untuk email <?= $this->session->userdata('reset_email') ?></h6>

               <input type="password" name="password1" placeholder="Masukan Password Baru" class="form-control" />
               <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

               <input type="password" name="password2" placeholder="Konfirmasi Password" class="form-control" />
               <div>
                  <button class="btn btn-login col-md-12" type="submit" name="buttonLogin">Ganti Password</button>
               </div>
            </form>
         </section>
      </div>
   </div>
</div>