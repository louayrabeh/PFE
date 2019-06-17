<?php
$connect = mysqli_connect("localhost", "root", "",'sponsoringapp');
$nomEvent=$_GET["nomEvent"];
$dateDeb=$_GET["dateDeb"];
$dateFin=$_GET["dateFin"];
$heureEvent=$_GET["heureEvent"];
$lieuEvent=$_GET["lieuEvent"];
$descriptionEvent=$_GET["descriptionEvent"];
$image_URL=$_GET["image_URL"];
$categ=$_GET["categ"];
$sous_categ=$_GET["sous_categ"];
$budget=$_GET["budget"];
$isfree=$_GET["isfree"];
$id_org=$_GET["id_org"];
$query="INSERT INTO evenement(nomEvent,dateDeb,dateFin,heureEvent,lieuEvent,descriptionEvent,URL_Image,categ,sous_categ,budget,idOrg,isfree)
values('$nomEvent','$dateDeb','$dateFin','$heureEvent','$lieuEvent','$descriptionEvent','$image_URL','$categ','$sous_categ','$budget','$id_org','$isfree')";
if(mysqli_query($connect, $query)){
    echo "true";
}
else{
    echo "false";
}
?>