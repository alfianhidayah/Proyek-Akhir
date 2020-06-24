<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Detail Data Kreditor</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800 "><?= $kreditor['nama_kreditor']; ?></div>
                            <div class="h6 mb-0 mt-1 text-gray-800">ID : <?= $kreditor['id_kreditor']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-circle fa-4x " style="color:#0099ff"></i>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item h6 font-weight-bold">PEKERJAAN : <?= $kreditor['pekerjaan']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">Alamat Desa : <?= $kreditor['nama_desa']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">Alamat : <?= $kreditor['alamat']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">NOMOR HP : <?= $kreditor['nomor_hp']; ?></li>
                        <li class="list-group-item h6 font-weight-bold">NOMOR KTP : <?= $kreditor['nomor_ktp']; ?></li>
                    </ul>

                    <div class="row justify-content-center mt-4">
                        <a href="<?= base_url(); ?>/kreditor" class="btn btn-primary btn-lg btn-icon-split">
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