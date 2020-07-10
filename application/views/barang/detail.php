<div class="container mb-3">
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-success text-uppercase mb-1">Detail Barang Kreditor</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 "><?= $barang_detail['nama_barang']; ?></div>
                            <div class="h6 mb-0 mt-1 text-gray-800">ID : <?= $barang_detail['id_barang']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-circle fa-4x " style="color:green"></i>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item h6 font-weight-bold">ID Kreditor : <?= $barang_detail['id_kreditor']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">Pemilik Barang : <?= $barang_detail['nama_kreditor']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">Jenis Barang : <?= $barang_detail['tipe_barang']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">Harga barang : Rp. <?= number_format($barang_detail['harga_barang']); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Uang Muka : Rp. <?= number_format($barang_detail['uang_muka']); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Kredit Total : Rp. <?= number_format($barang_detail['kredit_total']); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Tanggal Masuk : <?= date("d M Y", strtotime($barang_detail['tanggal_masuk'])); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Jenis Angsuran : <?= $barang_detail['angsuran']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">Nominal Angsuran : Rp. <?= number_format($barang_detail['nominal_angsuran']); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Kredit Masuk : Rp. <?= number_format($barang_detail['kredit_masuk']); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Sisa Kredit : Rp. <?= number_format($barang_detail['sisa_kredit']); ?></li>
                        <li class="list-group-item h6 font-weight-bold">Status : <?= $barang_detail['status']; ?></li>
                    </ul>

                    <div class="row justify-content-center mt-4">
                        <a href="<?= base_url(); ?>/barang" class="btn btn-success btn-lg btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-circle-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>