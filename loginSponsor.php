<?php
$connect = mysqli_connect('localhost', 'root', '', 'sponsoringapp');
$email=$_POST["emailSpons"];
$password=$_POST["passwordSpons"];
$query="SELECT * from sponsor where emailSpons='$email' and mdpSpons='$password'";
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