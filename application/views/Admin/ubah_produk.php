<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i style="color: #ff5740" class="icofont-kiwibox"></i>
                        </i>
                    </div>
                    <div>
                        <h4>Ubah Data Produk</h4>
                        <div class="page-title-subheading">Bagian ini berfungsi untuk mengubah data produk.
                        </div>
                    </div>

                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block">
                        <a class="btn btn-login" href="<?= base_url('Admin/produk') ?>"><i class="icofont-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main__inner ">
        <!-- <?= $this->session->flashdata('pesan'); ?> -->
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="main-card mb-3 card ">
                            <div class="card-body">
                                <?= form_open_multipart('Admin/ubahDataProdukAksi') ?>
                                <h5 class="card-title mb-4">Data Produk</h5>
                                <input name="id_produk" type="hidden" value="<?= $produk['id_produk']; ?>">
                                <div class="form-group row">
                                    <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                                    <div class="col-sm-9">
                                        <input name="nama_produk" type="text" class="form-control" id="nama_produk" value="<?= $produk['nama_produk']; ?>">
                                        <?= form_error('nama_produk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_produk" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input name="harga_produk" type="text" class="form-control" id="harga_produk" value=" <?= $produk['harga_produk']; ?>">
                                        <?= form_error('harga_produk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok_produk" class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-9">
                                        <input name="stok_produk" type="text" class="form-control" id="stok_produk" value="<?= $produk['stok_produk']; ?>">
                                        <?= form_error('stok_produk', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gambar_produk" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-4">
                                        <div class="custom-file mb-3">
                                            <input type="file" name="gambar_produk">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-5">
                                        <img src="<?= base_url('assets/images/') . $produk['gambar_produk']; ?>" alt="" class="img-thumbnail">
                                    </div>
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