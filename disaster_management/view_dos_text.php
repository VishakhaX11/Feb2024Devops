<?php

	require 'DbConnect.php';
	
	$data = json_decode(file_get_contents("php://input"));
	
	$ck_query='select * from dosdonts'; //check if Student already present or not 
		         $result=mysqli_query($con,$ck_query);

				   if(mysqli_num_rows($result)>0)
				   {
				      
				   $data=mysqli_fetch_array($result);
     			 
				   $response['text'] = $data['text'];
				//   $response['Name']=$data['Name'];
				//    $response['lat']=$data['lat']; 
				//	$response['lon']=$data['lon'];

				   $response['status'] = "200";
			       $response['message'] = "Sucessfully fetch";
                   //$response['username'] = $data['first_name']." ".$data['last_name'];
				 }else{
				   $response['status'] = "201";
			       $response['message'] = "No data available";
				   
				}
			  die(print_r(json_encode($response),true));



?>