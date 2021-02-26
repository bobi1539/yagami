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
                        <h4>Informasi Produk</h4>
                        <div class="page-title-subheading">Bagian ini berfungsi untuk menambahkan produk baru kedalam website, mengubah, dan menghapus produk.
                        </div>
                    </div>

                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block">
                        <a class="btn btn-login" href="<?= base_url('Admin/tambahDataProduk') ?>"><i class="icofont-plus-square"></i> Tambah Data</a>
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
                    <div class="col-md-10 mx-auto">
                        <div class="main-card mb-3 card ">
                            <div class="card-body">
                                <h5 class="card-title">Data Produk</h5>
                                <table class="mb-0 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Stok</th>
                                            <th>Gambar</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($produk as $pr) : ?>
                                            <tr>
                                                <th scope="row"><?= ++$start; ?></th>
                                                <td><?= $pr['nama_produk']; ?></td>
                                                <td align="right"><?= number_format($pr['harga_produk']); ?></td>
                                                <td align="center"><?= $pr['stok_produk']; ?></td>
                                                <td><?= $pr['gambar_produk']; ?></td>
                                                <td align="center">
                                                    <a href="<?= base_url('Admin/ubahDataProduk/') . $pr['id_produk']; ?>" class="btn btn-sm btn-info">Ubah</a>
                                                </td>
                                                <td align="center">
                                                    <a onclick="return confirm('Yakin data dihapus?')" href="<?= base_url('Admin/hapusDataProduk/') . $pr['id_produk']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>