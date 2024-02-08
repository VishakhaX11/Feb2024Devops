<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','disaster_management');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	//mysql_set_charset('utf8',$con);
	//mysqli_set_charset($con, "utf8mb4");

	//	mysql_set_charset('utf8',$con);
	//mysql_query($con, "SET NAMES utf8");


	mysqli_query ($con,"set character_set_client='utf8'"); 
 mysqli_query ($con,"set character_set_results='utf8'"); 

 mysqli_query ($con,"set collation_connection='utf8_general_ci'"); 