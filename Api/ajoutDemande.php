<?php
require_once 'dbConnect.php';
$idSpons= $_POST['idSpons'];
$idEvent= $_POST['idEvent'];
$query="SELECT * FROM evenement where idEvent ='".$idEvent."'";
$result=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)){
    $idOrg=$row["idOrg"];
    $nomEvent=$row["nomEvent"];
}
$query1="SELECT * FROM organisateur where idOrg ='".$idOrg."'";
$result1=mysqli_query($con,$query1);
while($row = mysqli_fetch_assoc($result1)){
    $nomOrg=$row["nomOrg"];
    $prenomOrg=$row["prenomOrg"];
    $nom=$nomOrg." ".$prenomOrg;
}
$contenu="L\'organisateur ".$nom." vous invite à consulter son événement ".$nomEvent;
$query="INSERT INTO demande(idEvent,idSpons,contenu,etat) VALUES ('$idEvent','$idSpons','$contenu','0')";
mysqli_query($con,$query);
?>