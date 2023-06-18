<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	</head>
	<body>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>

				</div>
			</div>
		</div>
	</body>
</html>

<script>
	
$(document).ready(function(){

	$('#submit_data').click(function(){

		var Gender = $('input[name=Gender]:checked').val();

		$.ajax({
			url:"charts/chart-doughnut-data.php",
			method:"POST",
			data:{action:'insert', Gender:Gender},
			beforeSend:function()
			{
				$('#submit_data').attr('disabled', 'disabled');
			},
			success:function(data)
			{
				$('#submit_data').attr('disabled', false);

				$('#Gender_1').prop('checked', 'checked');

				$('#Gender_2').prop('checked', false);

				$('#Gender_3').prop('checked', false);

				alert("Your Feedback has been send...");

				makechart();
			}
		})

	});

	makechart();

	function makechart()
	{
		$.ajax({
			url:"charts/chart-doughnut-data.php",
			method:"POST",
			data:{action:'fetch'},
			dataType:"JSON",
			success:function(data)
			{
				var Gender = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					Gender.push(data[count].Gender);
					total.push(data[count].Count);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:Gender,
					datasets:[
						{
							label:'Vote',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				var group_chart2 = $('#doughnut_chart');

				var graph2 = new Chart(group_chart2, {
					type:"doughnut",
					data:chart_data
				});

				var group_chart3 = $('#bar_chart');

				var graph3 = new Chart(group_chart3, {
					type:'bar',
					data:chart_data,
					options:options
				});
			}
		})
	}

});

</script>