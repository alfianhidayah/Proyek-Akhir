<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-primary shadow">
            <h2 class="card-title h2 font-weight-bold text-primary"><?= $title_page; ?></h2>
            <p class="card-subtitle mb-2 text-muted">menu untuk menambah jenis barang kredit</p>
        </div>
    </div>


    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-primary shadow">
            <div class="row">

                <?= form_error('menu', '<div class="alert alert-success" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('messages'); ?>"></div>

                <a href="" class="btn btn-primary mb-3 ml-2 tombolTambahJenisBarang" data-toggle="modal" data-target="#tambahJenisBarangModal">Tambah Jenis Barang Baru</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nomor</th>
                            <th scope="col">Jenis Barang</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($jenis_barang as $jb) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $jb['tipe_barang'] ?></td>
                                <td>
                                    <!-- List Tombol Ubah -->
                                    <a href="<?= base_url(); ?>manage/ubah/<?= $jb['id'] ?>" class="badge badge-success float-left tombolUbahDataJenisBarang ml-2" data-toggle="modal" data-target="#tambahJenisBarangModal" data-id="<?= $jb['id']; ?>">Ubah</a>
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
<div class="modal fade" id="tambahJenisBarangModal" tabindex="-1" role="dialog" aria-labelledby="tambahJenisBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalJenisBarang">Tambah Jenis Barang Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?= base_url('manage/tipebarang'); ?>" method="post">
                    <input type="text" class="form-control" id="id" name="id" hidden>
                    <div class="form-group">
                        <label for="jenis_barang">Masukkan Jenis Barang Baru</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Menu</button>
            </div>
            </form>
        </div>
    </div>
</div>