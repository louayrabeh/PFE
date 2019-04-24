<?php
$connect=mysqli_connect("localhost","root","","sponsoringapp");
$idEvent=$_GET["idEvent"];
$idOrg=$_GET["idOrg"];
$idSpons=$_GET["idSpons"];
$query="INSERT INTO demande(idEvent,idSpons,idOrg)values('$idEvent','$idSpons','$idOrg')";
if(mysqli_query($connect,$query)){
    echo "true";
}
else{
    echo "false";
}
?>