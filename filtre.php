<?php
	$connect = mysqli_connect('localhost', 'root', '', 'sponsoringapp');
    global $connect;
    $query= " Select * FROM evenement where idEvent != 0 ";
if (isset($_POST['categ'])) {
    //$cat=["Cinema","Sport"];
    $categ_filter = implode("','",$_POST['categ']);
	$query.= " and categ in ('".$categ_filter."') ";
}
if (isset($_POST['isfree'])) {
	$query.= " and isfree=".$_POST['isfree']."";
}
if(isset($_POST['budget']))
  {
   $query .= "
    and (budget BETWEEN 0 AND ".$_POST['budget'].")
   ";
  }

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
	mysqli_close($connect);
?>