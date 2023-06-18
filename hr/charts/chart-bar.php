<?php
$con  = mysqli_connect("localhost","root","","lakderana");
if (!$con) {
	# code...
   echo "Problem in database connection! Contact administrator!" . mysqli_error(mysqli_connect());
}else{
		$sql ="select case when EmpDept='rec' then 'Reception'
		when EmpDept='res' then 'Reservation'
		when EmpDept='hr' then 'HR'
		when EmpDept='account' then 'Account'
		when EmpDept='it' then 'IT'
		when EmpDept='bar' then 'Bar'
        else 'Room'
		end
		as Department
		, count(EmpID) as Count from employee group by EmpDept";
		$result = mysqli_query($con,$sql);
		$chart_data="";
		while ($row = mysqli_fetch_array($result)) { 

		   $Departmentname[]  = $row['Department']  ;
		   $sales[] = $row['Count'];
	   }


} 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="text-align:center">
            <div>Department </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($Departmentname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>