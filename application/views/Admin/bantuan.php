<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i style="color: #ff5740" class="icofont-file-document"></i>
                        </i>
                    </div>
                    <div>
                        <h4>Informasi Masukan dan Saran</h4>
                        <div class="page-title-subheading">Bagian ini berfungsi untuk melihat masukan dan saran dari pelanggan.
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
                    <div class="col-md-10 mx-auto">
                        <div class="main-card mb-3 card ">
                            <div class="card-body">
                                <h5 class="card-title">Data masukan dan saran dari pelanggan.</h5>
                                <table class="mb-0 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                            <th class="text-center" width="80px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($bantuan as $bt) : ?>
                                            <tr>
                                                <th scope="row"><?= ++$start; ?></th>
                                                <td><?= $bt['nama']; ?></td>
                                                <td><?= $bt['email']; ?></td>
                                                <td><?= $bt['pesan']; ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url('Admin/hapusMasukan/') . $bt['id']; ?>">Hapus</a>
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