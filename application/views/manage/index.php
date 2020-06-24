<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-primary shadow">
            <h2 class="card-title h2 font-weight-bold text-primary"><?= $title_page; ?></h2>
            <p class="card-subtitle mb-2 text-muted">menu untuk menambah cakupan desa</p>
        </div>
    </div>


    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-primary shadow">
            <div class="row">


                <?= form_error('desa', '<div class="alert alert-success" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messages'); ?>"></div>

                <a href="" class="btn btn-primary mb-3 ml-2 tombolTambahDesa" data-toggle="modal" data-target="#tambahDesaModal">Tambah Desa Baru</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($desa as $ds) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $ds['nama_desa'] ?></td>
                                <td>
                                    <!-- List Tombol Ubah -->
                                    <a href="<?= base_url(); ?>manage/ubah/<?= $ds['id'] ?>" class="badge badge-success float-left tombolUbahDataDesa ml-2" data-toggle="modal" data-target="#tambahDesaModal" data-id="<?= $ds['id']; ?>">Ubah</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
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


<!-- MODAL -->
<div class="modal fade" id="tambahDesaModal" tabindex="-1" role="dialog" aria-labelledby="tambahDesaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalDesa">Tambah Desa Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('manage'); ?>" method="post">
                    <input type="text" class="form-control" id="id" name="id" hidden>
                    <div class="form-group">
                        <label for="desa">Masukkan Nama Desa Baru</label>
                        <input type="text" class="form-control" id="desa" name="desa">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Add Menu</button>
            </div>
            </form>
        </div>
    </div>
</div>