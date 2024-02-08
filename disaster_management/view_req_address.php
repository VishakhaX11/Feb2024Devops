
<?php
$data = json_decode(file_get_contents("php://input"));
require 'DbConnect.php';

$id = $data->userId; 
$first = "";
//mysqli_query($con, 'set names utf8');
$sql =// "select id,address, image_path from uploadimagetoserver where id=".$username.'"';
//'select id, image_path,image_name, address from uploadimagetoserver "'; 
'select * from uploadimagetoserver where user_id="'.$id.'"'; 
// mysqli_query ("set character_set_results='utf8'"); 
//mysqli_set_charset($con, 'utf8');
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
	array('image_path'=>$row[2],
	'id'=>$row[0],
	'image_name'=>$row[3],
	'address'=>$row[6],
	'police'=>$row[7],
	'police'=>$row[9],
	'hospital'=>$row[8],
	

));

$first = $row[0];

}

//header("Content-type:application/json;charset=utf-8");
//header("Content-Type: application/json;charset=utf-8");
// header('Content-type: text/html; charset=UTF-8');
//echo $first;
echo json_encode(array("result"=>$result), JSON_UNESCAPED_UNICODE);

//echo "लोकांच्या विविथ  ஐ";
 
mysqli_close($con);
 
?>

