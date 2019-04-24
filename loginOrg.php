<?php
$connect = mysqli_connect('localhost', 'root', '', 'sponsoringapp');
$email=$_GET["emailOrg"];
$password=$_GET["passwordOrg"];
$query="SELECT * from organisateur where emailOrg='$email' and mdpOrg='$password'";
$result = mysqli_query($connect, $query);
$number_of_rows = mysqli_num_rows($result);

$temp_array  = array();

if($number_of_rows > 0) {
    echo "true";
}
else{
    echo "false";
}
?>