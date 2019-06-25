<?php
$connect = mysqli_connect("localhost", "root", "",'sponsoringapp');
$nom=$_GET["nomSpons"];
$prenom=$_GET["prenomSpons"];
$organisme=$_GET["organismeSpons"];
$adr=$_GET["adrSpons"];
$tel=$_GET["telSpons"];
$email=$_GET["emailSpons"];
$password=$_GET["passwordSpons"];
$img=$_GET["imgSpons"];
$centre=$_GET["centreSpons"];
$query="INSERT INTO sponsor(nomSpons,prenomSpons,organismeSpons,adrSpons,telSpons,emailSpons,mdpSpons,img,centre)
values('$nom','$prenom','$organisme','$adr','$tel','$email','$password','$img','$centre')";
mysqli_query($connect, $query);
?>