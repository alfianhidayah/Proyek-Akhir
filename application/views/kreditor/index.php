<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-primary shadow">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="card-title h1 mb-0 text-primary font-weight-bold"><?= $title; ?> Manager</h1>
                </div>
                <div class="col-lg-3">
                    <i class="fas fa-fw fa-users-cog fa-3x" style="color:#0080ff"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php endif; ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messages'); ?>"></div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary ml-3">Data Kreditor</h3>
                    <a href="" class="btn btn-primary ml-5 tombolTambahData" data-toggle="modal" data-target="#tambahKreditor">Tambah Data Kreditor</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Kreditor</th>
                                <th>Nama </th>
                                <th>Alamat Desa</th>
                                <th>Aksi</th>
                                <!-- Detail isinya pekerjaan, alamat, no ktp, foto profile, foto ktp -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kreditor as $kdr) : ?>
                                <tr>
                                    <td><?= $kdr['id_kreditor']; ?></td>
                                    <td><?= $kdr['nama_kreditor']; ?></td>
                                    <td><?= $kdr['nama_desa']; ?></td>
                                    <td>
                                        <!-- List Tombol Hapus  -->
                                        <a href="<?= base_url(); ?>kreditor/hapus/<?= $kdr['id_kreditor'] ?>" class="badge badge-danger float-right tombol-hapus ml-2">Hapus</a>
                                        <!-- List Tombol Ubah -->
                                        <a href="<?= base_url(); ?>kreditor/ubah/<?= $kdr['id_kreditor'] ?>" class="badge badge-success float-right tombolUbahData ml-2" data-toggle="modal" data-target="#tambahKreditor" data-id="<?= $kdr['id_kreditor']; ?>">Ubah</a>
                                        <!-- List Tombol Detail -->
                                        <a href=" <?= base_url(); ?>kreditor/detail/<?= $kdr['id_kreditor'] ?>" class="badge badge-primary float-right ">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- MODAL -->
<div class="modal fade" id="tambahKreditor" tabindex="-1" role="dialog" aria-labelledby="tambahKreditorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Kreditor Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('kreditor'); ?>" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Nama KREDITOR -->
                                <div class="form-group">
                                    <label for="nama_kreditor">Nama Kreditor</label>
                                    <input type="text" class="form-control" id="nama_kreditor" name="nama_kreditor" value="<?= set_value('nama_kreditor'); ?>">
                                </div>
                                <!-- pekerjaan KREDITOR -->
                                <div class="form-group">
                                    <label for="pekerjaan_kreditor">Pekerjaan Kreditor</label>
                                    <input type="text" class="form-control" id="pekerjaan_kreditor" name="pekerjaan_kreditor" value="<?= set_value('pekerjaan_kreditor'); ?>">
                                </div>
                                <!-- Pilih Desa -->
                                <div class="form-group">
                                    <label for="desa_id">Pilih Desa</label>
                                    <select name="desa_id" id="desa_id" class="form-control">
                                        <option selected>Pilih Desa</option>
                                        <?php foreach ($desa as $d) : ?>
                                            <!-- optio/combobox pilihan menu -->
                                            <option value="<?= $d['id']; ?>"><?= $d['nama_desa']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- alamat KREDITOR -->
                                <div class="form-group">
                                    <label for="alamat_kreditor">Alamat Kreditor</label>
                                    <input type="text" class="form-control" id="alamat_kreditor" name="alamat_kreditor" value="<?= set_value('alamat_kreditor'); ?>">
                                </div>
                                <!-- nomor HP KREDITOR -->
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP Kreditor</label>
                                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?= set_value('nomor_hp'); ?>">
                                </div>
                                <!-- nomor KTP KREDITOR -->
                                <div class="form-group">
                                    <label for="nomor_ktp">Nomor KTP Kreditor</label>
                                    <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" value="<?= set_value('nomor_ktp'); ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- ID KREDITOR -->
                                <div class="form-group">
                                    <label for="id_kreditor">ID Kreditor</label>
                                    <input type="text" class="form-control ubah_hilang" id="id_kreditor" name="id_kreditor" value="<?= $get_id_kreditor; ?>" readonly>
                                </div>
                                <!-- Password KREDITOR -->
                                <div class="form-group password">
                                    <label for="password1">Password Aplikasi Android</label>
                                    <input type="password" class="form-control" id="password1" name="password1">
                                </div>
                                <!-- Repeat Password KREDITOR -->
                                <div class="form-group password">
                                    <label for="password2">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password2" name="password2">
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Kreditor</button>
            </div>
            </form>
        </div>
    </div>
</div>