<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <link rel="shortcut icon" href="<?= base_url('assets/img/logo_tok.png') ?>" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- CHART -->
    <?php
    $query = " SELECT b.nama_desa as nama_desa, count(a.desa_id) as jumlah_kreditor_desa from kreditor as a
                    left join desa as b on b.id = a.desa_id GROUP BY a.desa_id ORDER BY nama_desa
        ";
    $desa = $this->db->query($query)->result();
    foreach ($desa as $k => $v) {
        $arrProd[] = ['label' => $v->nama_desa, 'y' => $v->jumlah_kreditor_desa];
    }

    $query1 = " SELECT date(tanggal_transaksi) as tanggal_transaksi, sum(nominal_transaksi) as total_transaksi, month(tanggal_transaksi) as bulan_transaksi from transaksi GROUP BY tanggal_transaksi";
    $transaksi = $this->db->query($query1)->result();
    foreach ($transaksi as $k => $v) {
        $arrProd1[] = ['label' => $v->tanggal_transaksi, 'y' => $v->total_transaksi];
    }

    ?>
    <script>
        window.onload = function() {

            var chart1 = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                data: [{
                    type: "doughnut",
                    startAngle: 60,
                    //innerRadius: 60,
                    indexLabelFontSize: 17,
                    indexLabel: "{label} - #percent%",
                    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                    dataPoints: <?= json_encode($arrProd, JSON_NUMERIC_CHECK); ?>

                }]
            });

            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                axisX: {
                    valueFormatString: "DD MMM"
                },
                axisY: {
                    title: "Jumlah Transaksi",
                    includeZero: false,
                    scaleBreaks: {
                        autoCalculate: true
                    }
                },
                data: [{
                    type: "line",
                    xValueFormatString: "DD MMM",
                    color: "#F08080",
                    dataPoints: <?= json_encode($arrProd1, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart1.render();
            chart2.render();
        }
    </script>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">