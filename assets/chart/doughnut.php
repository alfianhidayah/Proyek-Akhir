<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Chartjs, PHP dan MySQL Demo Grafik Lingkaran (Doughnut)</title>
  <script src="<?= base_url('assets/'); ?>js/Chart.js"></script>
  <style type="text/css">
    .container {
      width: 40%;
      margin: 15px auto;
    }
  </style>
</head>

<body>

  <div class="container">
    <canvas id="piechart" width="100" height="100"></canvas>
  </div>

</body>

</html>

<script type="text/javascript">
  var ctx = document.getElementById("piechart").getContext("2d");
  var data = {
    labels: ["", "Referral", "Social"],
    datasets: [{
      label: "Penjualan Barang",
      data: [60, 30, 15],
      backgroundColor: [
        '#29B0D0',
        '#2A516E',
        '#F07124',
        '#CBE0E3',
        '#979193'
      ]
    }]
  };

  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: {
      responsive: true
    }
  });
</script>