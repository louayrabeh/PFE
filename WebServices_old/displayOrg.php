<?php
$connect = mysqli_connect('localhost', 'root', '', 'sponsoringapp');
$id=$_GET['idOrg'];
$query= " Select * FROM organisateur where idOrg=$id";
$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
	}
	
	header('Content-Type: application/json');
    echo json_encode(array("organisateur"=>$temp_array));
?>

