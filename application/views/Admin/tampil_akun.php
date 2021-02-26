<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i style="color: #ff5740" class="icofont-kiwibox icofont-address-book"></i>
                        </i>
                    </div>
                    <div>
                        <h4>Informasi List Akun</h4>
                        <div class="page-title-subheading">Bagian ini berfungsi untuk melihat informasi akun yang sudah terdaftar.
                        </div>
                    </div>

                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block">

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
                    <div class="col-md-12 mx-auto">
                        <div class="main-card mb-3 card ">
                            <div class="card-body">
                                <h5 class="card-title">Data Akun</h5>
                                <table class="mb-0 table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th class="text-center">No Telepon</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Role Id</th>
                                            <th>Aktif</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($akun as $ak) : ?>
                                            <tr>
                                                <th scope="row"><?= ++$start; ?></th>
                                                <td><?= $ak['nama_depan'] . " " . $ak['nama_belakang']; ?></td>
                                                <td><?= $ak['no_telepon']; ?></td>
                                                <td align="center"><?= $ak['jenis_kelamin']; ?></td>
                                                <td><?= $ak['email']; ?></td>
                                                <td class="text-center"><?= $ak['role_id']; ?></td>
                                                <td class="text-center"><?= $ak['is_aktif']; ?></td>
                                                <td align="center">
                                                    <?php if ($ak['role_id'] != 1) : ?>
                                                        <a onclick="return confirm('Yakin data dihapus?')" href="<?= base_url('Admin/hapusAkunUser/') . $ak['id_akun']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                                    <?php endif; ?>
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