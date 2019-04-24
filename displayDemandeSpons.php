<?php
$connect=mysqli_connect("localhost","root","","sponsoringapp");
$idSpons=$_GET["idSpons"];
$query="select * from demande where idSpons=$idSpons";
$result=mysqli_query($connect,$query);
$number_of_rows = mysqli_num_rows($result);
	
$temp_array  = array();

if($number_of_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $temp_array[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode(array("demandeReçu"=>$temp_array));
?>
