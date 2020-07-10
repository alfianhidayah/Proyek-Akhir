<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div class="card" style="width: 45rem;">
            <div class="card-body border-left-danger shadow">
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="card-title h1 mb-0 text-danger font-weight-bold"><?= $title; ?> Manager</h1>
                    </div>
                    <div class="col-lg-2">
                        <i class="fas fa-fw fa-tachometer-alt fa-3x" style="color:red"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-left-danger">
            <div class="card-body shadowr">
                <h6 class="card-title">Klik untuk unduh rekapitulasi Data Kredit Barang</h6>
                <a href="<?= base_url('dashboard/export'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-center mb-2 pb-5 ml-4" style="width: 300px; height:30px; font-size:15px"><i class="fas fa-fw fa-2x fa-download text-white-50 mr-2 mt-1"></i> Rekap Data Kredit Barang</a>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Harian -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi Hari Ini</div>
                            <?php if ($harian != null) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($harian['total_transaksi']); ?></div>
                            <?php else : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 0</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mingguan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi Minggu Ini</div>
                            <?php if ($mingguan != null) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($mingguan['total_transaksi']); ?></div>
                            <?php else : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 0</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulanan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Bulan Ini</div>
                            <?php if ($bulanan != null) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($bulanan['total_transaksi']); ?></div>
                            <?php else : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 0</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tahunan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaksi Tahun Ini</div>
                            <?php if ($tahunan != null) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($tahunan['total_transaksi']); ?></div>
                            <?php else : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 0</div>
                            <?php endif; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-6 col-lg-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 font-weight-bold text-primary text-uppercase mb-1"> Grafik Data Kreditor</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-pie fa-3x text-gray-300"></i>
                        </div>
                    </div>
                    <!-- Area Chart -->
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div id="chartContainer" style="height: 100%; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 font-weight-bold text-primary text-uppercase mb-1"> Grafik Data Transaksi</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-3x text-gray-300"></i>
                        </div>
                    </div>
                    <!-- Area Chart -->
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div id="chartContainer2" style="height: 100%; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->