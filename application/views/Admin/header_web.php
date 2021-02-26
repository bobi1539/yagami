<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i style="color: #ff5740" class="icofont-info-square"></i>
                        </i>
                    </div>
                    <div>
                        <h4>Informasi Untuk Website</h4>
                        <div class="page-title-subheading">Bagian ini berfungsi untuk mengedit informasi tentang website seperti email toko.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main__inner ">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="main-card mb-3 card ">
                            <div class="card-body">
                                <h5 class="card-title">Edit Info Web</h5>
                                <?= form_open_multipart('Admin/editInfoWeb') ?>
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email Toko/Brand</label>
                                    <input name="email" id="email" type="email" class="form-control " value="<?= $informasi_web['email']; ?>">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="no_telepon" class="">Nomor Telepon</label>
                                    <input name="no_telepon" id="no_telepon" type="text" class="form-control " value="<?= $informasi_web['no_telepon']; ?>">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="facebook" class="">Link Facebook</label>
                                    <input name="facebook" id="facebook" type="text" class="form-control " value="<?= $informasi_web['facebook']; ?>">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="twitter" class="">Link Twitter</label>
                                    <input name="twitter" id="twitter" type="text" class="form-control " value="<?= $informasi_web['twitter']; ?>">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="instagram" class="">Link Instagram</label>
                                    <input name="instagram" id="instagram" type="text" class="form-control " value="<?= $informasi_web['instagram']; ?>">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="alamat" class="">Alamat Toko</label>
                                    <textarea name="alamat" id="alamat" class="form-control"><?= $informasi_web['alamat']; ?></textarea>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="alamat" class="">Logo</label>
                                    <img class="img-thumbnail ml-5" src="<?= base_url('assets/images/') . $informasi_web['logo']; ?>" alt="">

                                </div>
                                <div class="row">
                                    <input type="file" name="logo" class="ml-3 mb-5">
                                </div>

                                <button type="submit" class="mt-1 btn btn-login">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>