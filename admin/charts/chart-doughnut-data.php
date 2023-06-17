<?php

//data.php

//$host     = "sql305.epizy.com";//Ip of database, in this case my host machine
//$user     = "epiz_30503065";	//Username to use
//$pass     = "zw5mJOROdZ";   //Password for that user
//$dbname   = "epiz_30503065_lakderana";//Name of the database
//
//try {
//    $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
//    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//}catch(PDOException $e)
//{
//    echo $e->getMessage();
//}

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