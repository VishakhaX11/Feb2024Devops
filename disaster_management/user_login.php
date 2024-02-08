<?php

			 require 'DbConnect.php';

$data = json_decode(file_get_contents("php://input"));

$username = $data->username; 
$password = $data->password;
//$roll_type = $data->role_type;

if($username != "" && $password != ""){

			 //if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]) ){    //In Gender Case We Revese it gender for given reverse gender data Ie. Male Member given Female Data 
                
				 $ck_query='select * from register_user where username="'.$username.'" AND password="'.$password.'"'; //check if Student already present or not 
		         $result=mysqli_query($con,$ck_query);

				   if(mysqli_num_rows($result)>0){
				      
				   $data=mysqli_fetch_array($result);
     			 
				   $response['userId'] = $data['id'];
				//   $response['Name']=$data['Name'];
				//    $response['lat']=$data['lat']; 
				//	$response['lon']=$data['lon'];

				   $response['status'] = "200";
			       $response['message'] = "Sucessfully Login";
                   $response['username'] = $data['first_name']." ".$data['last_name'];
				 }else{
				   $response['status'] = "201";
			       $response['message'] = "Invalid User";
				   
			  }
			  die(print_r(json_encode($response),true));
             }
			  else{
	               $response['status'] = "202";
			       $response['message'] = "Enter Username And Password";
				   die(print_r(json_encode($response),true));
				  
			  }
  ?>