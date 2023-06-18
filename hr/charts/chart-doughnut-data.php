<?php

//data.php

$connect = new PDO("mysql:host=localhost;dbname=lakderana", "root", "");


	$query = "select EmpGender, count(EmpGender) as Count from employee group by EmpGender";

	$result = $connect->query($query);

	$data = array();

	foreach($result as $row)
	{
		$data[] = array(
			'Gender'		=>	$row["EmpGender"],
			'Count'			=>	$row["Count"],
			'color'			=>	'#' . rand(100000, 999999) . ''
		);
	}

	echo json_encode($data);


?>