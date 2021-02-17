<?php 
foreach($data->result_array() as $row){
  $mapel[]=$row['nama_mapel'];
  $nilai[]=$row['nilai'];
}
?>
<style type="text/css">
		body{
			font-family: roboto;
		}
	</style>
<script src="<?php echo base_url() . 'assets/'; ?>Chart.js"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">
</div>
<!-- container -->
<div class="container-fluid">
	<!-- card -->
	<div class="card shadow mb-4">
		<!-- card header -->
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-primary">Grafik Nilai
			</h4>
		</div>

		<!-- end card header -->
		<div class="card-body">
    <canvas id="myChart"></canvas>
		</div>
		<!-- end card -->
	</div>
	<!-- end container -->
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels:<?php echo json_encode($mapel);?>,
				datasets: [{
					label: 'Grafik Nilai',
					data: <?php echo json_encode($nilai);?>,
          backgroundColor: "#FF00FF",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>