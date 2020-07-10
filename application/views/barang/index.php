<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-success shadow">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="card-title h1 mb-0 text-success font-weight-bold"><?= $title; ?> Manager</h1>
                </div>
                <div class="col-lg-3">
                    <i class="fas fa-fw fa-archive fa-3x " style="color:#33cc33"></i>
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
                    <h3 class="m-0 font-weight-bold text-success ml-3">Data Barang</h3>
                    <a href="" class="btn btn-success ml-5 tombolTambahBarang" data-toggle="modal" data-target="#tambahBarang">Tambah Data Barang</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>ID Kreditor</th>
                                <th>Nama Kreditor</th>
                                <th>Nama Barang</th>
                                <th>Status Kredit</th>
                                <th>Aksi</th>
                                <!-- Detail isinya pekerjaan, alamat, no ktp, foto profile, foto ktp -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $brg) : ?>
                                <tr>
                                    <td><?= $brg['id_barang']; ?></td>
                                    <td><?= $brg['id_kreditor']; ?></td>
                                    <td><?= $brg['nama_kreditor']; ?></td>
                                    <td><?= $brg['nama_barang']; ?></td>
                                    <td>
                                        <?php if ($brg['kredit_masuk'] == $brg['kredit_total'] - $brg['uang_muka']) : ?>
                                            <span class="badge badge-pill badge-success"><?= $brg['status']; ?></span>
                                        <?php else : ?>
                                            <span class="badge badge-pill badge-danger"><?= $brg['status']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <!-- List Tombol Hapus  -->
                                        <a href="<?= base_url(); ?>barang/hapus/<?= $brg['id_barang'] ?>" class="badge badge-danger float-right tombol-hapus ml-2">Hapus</a>
                                        <!-- List Tombol Ubah -->
                                        <a href="<?= base_url(); ?>barang/ubah/<?= $brg['id_barang'] ?>" class="badge badge-success float-right tombolUbahDataBarang ml-2" data-toggle="modal" data-target="#tambahBarang" data-id="<?= $brg['id_barang']; ?>">Ubah</a>
                                        <!-- List Tombol Detail -->
                                        <a href=" <?= base_url(); ?>barang/detail/<?= $brg['id_barang'] ?>" class="badge badge-primary float-right ">Detail</a>
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
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="tambahBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalBarang">Tambah Barang Kredit Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('barang'); ?>" method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <!-- Pilih ID - Kreditor -->
                                <div class="form-group">
                                    <label for="id_kreditor">Pilih ID - Kreditor</label>
                                    <select name="id_kreditor" id="id_kreditor" class="form-control id-kreditor">
                                        <?php foreach ($kreditor as $d) : ?>
                                            <!-- optio/combobox pilihan menu -->
                                            <option value="<?= $d['id_kreditor']; ?>"><?= $d['id_kreditor']; ?> - <?= $d['nama_kreditor']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Pilih Barang untuk salah satu Kreditor
                                    </small>
                                </div>
                                <!-- ID Barang -->
                                <div class="form-group">
                                    <label for="id_barang">ID Barang</label>
                                    <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $get_id_barang; ?>" readonly>
                                </div>
                                <!-- Nama Barang -->
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= set_value('nama_barang'); ?>">
                                </div>
                                <!-- Jenis Barang -->
                                <div class="form-group">
                                    <label for="barang_id">Pilih Jenis Barang</label>
                                    <select name="barang_id" id="barang_id" class="form-control">
                                        <option selected>Pilih Jenis Barang</option>
                                        <?php foreach ($jenis_barang as $d) : ?>
                                            <!-- optio/combobox pilihan menu -->
                                            <option value="<?= $d['id']; ?>"><?= $d['tipe_barang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Harga Barang -->
                                <div class="form-group flex-nowrap">
                                    <label for="harga_barang">Harga Barang</label>
                                    <input type="text" class="form-control harga formatHarga" id="harga_barang" name="harga_barang" value="<?= set_value('harga_barang'); ?>">
                                </div>
                            </div>

                            <div class="col">
                                <!-- Uang Muka -->
                                <div class="form-group flex-nowrap">
                                    <label for="uang_muka">Uang Muka</label>
                                    <input type="text" class="form-control harga formatHarga" id="uang_muka" name="uang_muka" value="<?= set_value('uang_muka'); ?>">
                                </div>
                                <!-- Kredit Total -->
                                <div class="form-group flex-nowrap">
                                    <label for="kredit_total">Kredit Total</label>
                                    <input type="text" class="form-control harga formatHarga" id="kredit_total" name="kredit_total" value="<?= set_value('kredit_total'); ?>">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Kredit Total adalah Harga kredit yang harus dibayar kreditor
                                    </small>
                                </div>

                                <!-- Tanggal Masuk -->
                                <div class="form-group">
                                    <label for="tanggal_masuk">Tanggal Barang Masuk</label>
                                    <input type="text" class="form-control tanggal" id="tanggal_masuk" name="tanggal_masuk" value="<?= $tanggal_masuk; ?>" readonly>
                                </div>

                                <!-- Jenis Angsuran -->
                                <div class="form-group">
                                    <label for="angsuran_id">Pilih Jenis Angsuran</label>
                                    <select name="angsuran_id" id="angsuran_id" class="form-control">
                                        <option selected>Pilih Angsuran</option>
                                        <?php foreach ($jenis_angsuran as $d) : ?>
                                            <!-- optio/combobox pilihan menu -->
                                            <option value="<?= $d['id']; ?>"><?= $d['angsuran']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Nominal Angsuran-->
                                <div class="form-group flex-nowrap">
                                    <label for="nominal_angsuran">Nominal Angsuran</label>
                                    <input type="text" class="form-control harga formatHarga" id="nominal_angsuran" name="nominal_angsuran" value="<?= set_value('nominal_angsuran'); ?>">
                                </div>

                            </div>

                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
            </div>
            </form>
        </div>
    </div>
</div>