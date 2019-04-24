<?php
$idSpons=$_GET["idSpons"];
$idPack=$_GET["idPack"];
$connect=mysqli_connect("localhost","root","","sponsoringapp");
$query="INSERT INTO achatPack(idPack,idSpons)VALUES('$idPack','$idSpons')";
mysqli_query($connect,$query);
?>