<div class="container">
   <div class="row">
      <div class="col-md-4 mx-auto mt-4" style="margin-bottom: -50px;">
         <?= $this->session->flashdata('pesan'); ?>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4 mx-auto">
         <section class="login-form">
            <form method="POST" action="<?= base_url('Auth/lupaPassword'); ?>" role="login">
               <img width="150px" src="<?= base_url() ?>assets/images/logo_yagami.png" class="img-responsive" alt="" />

               <input type="text" name="email" placeholder="Email" class="form-control" value="<?= set_value('email'); ?>" />
               <?= form_error('email', '<small class="text-danger">', '</small>'); ?>


               <div>
                  <button class="btn btn-login col-md-12" type="submit" name="buttonLogin">Reset Password</button>
               </div>
               <div>
                  <p>
                     <a class="buat-akun" href="<?= base_url('Auth'); ?>">Login</a>
                  </p>
               </div>
            </form>
         </section>
      </div>
   </div>
</div>