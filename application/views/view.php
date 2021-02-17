<?php
foreach($data->result_array() as $row){
	$mapel[]=$row['nama_mapel'];
	$nilai[]=$row['nilai'];
}
?>
<style type="text/css">
	body{
		font-family:  roboto;
	}
</style>
<script src="<?php echo base_url().'assets/';?>Chart.js"></script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">
</div>

<div class="container-fluid">
	
	<div class="card-shadow mb-4">

	<div class="card-header py-3">
		<h4 class="m-0 font-weight-bold text-primary">Grafik Nilai</h4>
	</div>
</div>

<div class="card-body">
	<canvas id="myChart"></canvas>
</div>

</div>

<script>
	var ctx =document.getElementById("myChart").getContent('2d');
	var myChart =new Chart(ctx, {
		type:'bar',
		data:{
			labels:<?php echo json_encode($mapel);?>,
            databasets: [{
                  label:'Grafik Nilai',
                  data:<?php echo json_encode($nilai);?>,
         BackgroundColor:"#4e73df",
         hoverBackgroundColor:"#2e59d9",
         borderColor:"#4e73df"         
            }]
		};
		options: {
          scales: {
          	yAxes:[{
              ticks:{
              	beginAtZero:true
              }
          	}]
          }
		}		
	}); 
</script>