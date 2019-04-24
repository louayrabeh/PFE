<?php
$connect = mysqli_connect("localhost", "root", "",'sponsoringapp');
$nom=$_GET["nomOrg"];
$prenom=$_GET["prenomOrg"];
$adr=$_GET["adrOrg"];
$tel=$_GET["telOrg"];
$email=$_GET["emailOrg"];
$password=$_GET["passwordOrg"];
$query="INSERT INTO organisateur(nomOrg,prenomOrg,adrOrg,telOrg,emailOrg,mdpOrg)
values('$nom','$prenom','$adr','$tel','$email','$password')";
if(mysqli_query($connect, $query)){
    echo "true";
}else{
    echo "false";
}
?>