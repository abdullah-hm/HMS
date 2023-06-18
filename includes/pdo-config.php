<?php

$host     = " ";//Ip of database, in this case my host machine
$user     = " ";	//Username to use
$pass     = " ";   //Password for that user
$dbname   = " ";//Name of the database

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo $e->getMessage();
}

?>