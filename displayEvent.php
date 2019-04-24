<?php
$connect = mysqli_connect('localhost', 'root', '', 'sponsoringapp');
$id=$_GET['idEvent'];
$query= " Select * FROM evenement where idEvent=$id	";
$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	$temp_array  = array();
	
	if($number_of_rows > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		}
	}
	
	header('Content-Type: application/json');
    echo json_encode(array("event"=>$temp_array));
    
    //C:\xampp\htdocs\SponsoringApp_C_I\upload
?>

