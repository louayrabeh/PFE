<?php
$connect = mysqli_connect('localhost', 'root', '', 'sponsoringapp');
$idspons=$_GET["idSpons"];
$query= " Select * FROM sponsor where idSpons=$idspons";
$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
	}
	
	header('Content-Type: application/json');
    echo json_encode(array("sponsor"=>$temp_array));
    
    //C:\xampp\htdocs\SponsoringApp_C_I\upload

/*$connect = mysqli_connect('localhost', 'root', '', 'upload_db');
$query= " Select * FROM img";
$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width=100 height=100>';
		}
	}*/
?>

