<?php
require('DbConnect.php');

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$data = json_decode(file_get_contents("php://input"));

$first_name = $data->first_name; 
$last_name = $data->last_name;
$email = $data->email;
$mobile = $data->mobile;
$adhar = $data->adhar;
$username = $data->username;
$password = $data->password;

		//echo '$name';
		if($first_name == ''||$last_name == ''||$email == ''||$mobile == ''||$adhar == ''||$password == ''||$username == ''){
			//echo 'please fill all values';
			$response['status'] = "202";
			       $response['message'] = "Please fill all values";
				   die(print_r(json_encode($response),true));
		}else{
			require_once('DbConnect.php');

			$sql = "SELECT id FROM register_user WHERE 'mobile'='".$mobile."' OR 'email'='".$email."'";
			
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
			if(isset($check)){
				//echo 'username or email already exist';
				$response['status'] = "201";
			       $response['message'] = "username or email already exist";
				   die(print_r(json_encode($response),true));
			}else{		
				
				$sql = "INSERT INTO register_user (first_name, last_name, mobile, email, adhar, username, password) VALUES('$first_name','$last_name','$mobile','$email','$adhar','$username','$password')";

           
	//		printf ("New Record has id %d.\n", $mysqli->insert_id);
				if(mysqli_query($con,$sql))
				{
				
		
  $last_id = mysqli_insert_id($con);


				   $response['status'] = "200";
			       $response['message'] = "successfully registered";
				   $response['username'] = $first_name." ".$last_name;
				  
				     $response['userId'] = $last_id;
	

				   die(print_r(json_encode($response),true));
				
				}	else{
				//	echo 'oops! Please try again!';
				 $response['status'] = "202";
			       $response['message'] = "oops! Please try again!";
				   die(print_r(json_encode($response),true));
				}
			    } 
				 
			mysqli_close($con);
		}
}else{
echo 'error';
}