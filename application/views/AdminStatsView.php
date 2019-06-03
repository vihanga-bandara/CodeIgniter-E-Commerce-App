<?php
$this->load->view("header");
$this->load->view("sidenav");
?>
<div class="row no-gutters">
	<div class="offset-md-2 col-md-10 main bottles">
		<div class="col-md-10 offset-md-1 height:10px; width:10px">

		</div>

		<!-- Below is just for checking a new substitution -->
		<div class="col-md-10 offset-md-1 height:10px; width:10px">
			<div class="wrapper">
				<div class="panel">
					<div class="panel-header">
						<h3 class="title" style="color: #fff">Statistics</h3>
					</div>

					<div class="panel-body">
						<div class="categories">
							<div class="category">
								<span>Most Viewed Book</span>
								<span><?php echo $MostViewedBook[0]->title ?></span>
							</div>
							<div class="category">
								<span>Total Visitor Counts</span>
								<span><?php echo $ViewCount[0]->visitors ?></span>
							</div>
							<div class="category">
								<span>Total Page Visits</span>
								<span><?php echo $AllPageViewCount[0]->visitor_count ?></span>
							</div>
						</div>

						<div class="chart">
							<?php
							foreach ($TopTenObj as $key=>$count){
								$labelData[]=$key;
								$chData[]=$count;
							}
							?>
							<canvas id="myChart" width="500" height="250"></canvas>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.panel {
		width: 1100px;
		height: 450px;
		background: #343a40;
		box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
		border-radius: 6px;
		overflow: hidden;
	}
	.panel-header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 0 30px;
		height: 60px;
		background: #343a40;
	}

	.title {
		color: #5E6977;
		font-weight: 500;
	}

	.panel-body {
		display: flex;
		height: 340px;
	}
	.categories {
		display: flex;
		flex-direction: column;
		justify-content: space-evenly;
		flex-basis: 25%;
		padding: 39px 0px 41px 26px;
	}
	.category {
		display: flex;
		flex-direction: column;
	}
	.category span:first-child {
		font-weight: 300;
		font-size: 14px;
		opacity: 0.6;
		color: #fff;
		margin-bottom: 6px;
	}
	.category span:last-child {
		font-size: 20px;
		font-weight: 300;
		color: #fff;
	}
	.chart {
		width: 100%;
		height: 100%;
		display: flex;
		flex-direction: column;
		flex-grow: 2;
		position: relative;
	}
</style>



<script>
	var ctx = document.getElementById("myChart");
	var labelData = <?php echo json_encode($labelData); ?>;
	var chartData = <?php echo json_encode($chData); ?>;
	var myChart = new Chart (ctx, {
		type: 'bar',
		data: {
			labels: labelData,
			datasets: [{
				label: 'Top Ten Most Viewed Books',
				data: chartData,
				backgroundColor: [
					'rgba(255, 99, 132, 0.6)',
					'rgba(54, 162, 235, 0.6)',
					'rgba(255, 206, 86, 0.6)',
					'rgba(75, 192, 192, 0.6)',
					'rgba(153, 102, 255, 0.6)',
					'rgba(255, 165, 64, 0.6)',
					'rgba(142, 123, 45, 0.6)',
					'rgba(255, 186, 126, 0.6)',
					'rgba(212, 152, 45, 0.6)',
					'rgba(165, 159, 132, 0.6)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderWidth: 1
			}]
		},
		options: {
			legend: {
				labels: {
					fontColor: "white",
					fontSize: 16
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: "white"
					}
				}],
				xAxes: [{
					ticks: {
						fontSize: 6,
						fontColor: "white"
					}
				}]
			},
			responsive: true,
			maintainAspectRatio: false
		}
	});
</script>
