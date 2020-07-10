<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-3 ml-4" style="width: 35rem;">
        <div class="card-body border-left-warning shadow">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="card-title h1 mb-0 text-warning font-weight-bold"><?= $title; ?> Manager</h1>
                </div>
                <div class="col-lg-3">
                    <i class="fas fa-fw fa-shopping-cart fa-3x" style="color:#ffbf00"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-warning ml-3">Data Transaksi Kreditor</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>ID Barang</th>
                                <th>Nama Kreditor</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nominal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi as $trs) : ?>
                                <tr>
                                    <td><?= $trs['id_transaksi']; ?></td>
                                    <td><?= $trs['id_barang']; ?></td>
                                    <td><?= $trs['nama_kreditor']; ?></td>
                                    <td><?= date("d M Y", strtotime($trs['tanggal_transaksi'])); ?></td>
                                    <td>Rp. <?= number_format($trs['nominal_transaksi']); ?></td>
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