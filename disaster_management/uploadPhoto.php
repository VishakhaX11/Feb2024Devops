<?php

include 'DbConnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	 $DefaultId = 0;
 	 $ImageData =$_POST['image_path'];
	 $ImageName =$_POST['image_name'];
	 $lattt = $_POST['lat'];
	 $lonnn = $_POST['lon'];
	 $address = $_POST['address'];
	 $uid = $_POST['userId']; 
	 

	 $GetOldIdSQL ="SELECT id FROM uploadimagetoserver ORDER BY id ASC";
	 $Query = mysqli_query($con,$GetOldIdSQL);
	 while($row = mysqli_fetch_array($Query))
	 {
	 	$DefaultId = $row['id'];
	 }
  	 $ImagePath = "images/$DefaultId.png";
 
 	 $InsertSQL = "INSERT INTO `uploadimagetoserver`(`user_id`, `image_path`, `image_name`, `lat`, `lon`, `address`) VALUES ('$uid','$ImagePath','$ImageName','$lattt','$lonnn','$address')";

  	if(mysqli_query($con, $InsertSQL))
  	{
  		echo ("INsert Dobe");
 		file_put_contents($ImagePath,base64_decode($ImageData));
 	}
	else
	{
	 	echo "Not Uploaded";
	}

}else
{
	$response['status'] = "201";
	$response['message'] = "some prob";
}
mysqli_close($con);
 
?>