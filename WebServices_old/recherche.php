<?php
$connect = mysqli_connect("localhost", "root", "",'sponsoringapp');
$search=$_GET["search"];
$output = array();
$query = "SELECT * from evenement where nomEvent like '%".$search."%'";
$result = mysqli_query($connect,$query);
while($row = mysqli_fetch_array($result)){
    $output[] = $row["nomEvent"];
}
   echo json_encode(array("event"=>$output));
?>