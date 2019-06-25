
<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){


    $nomEvent = $_POST['nomEvent'];
    $dateDeb = $_POST['dateDeb'];
    $dateFin = $_POST['DateFin'];
    $heure = $_POST['heure'];
    $lieuEvent = $_POST['lieuEvent'];
    $descriptionEvent = $_POST['descriptionEvent'];
    $categ = $_POST['categ'];
    $typeEvent = $_POST['typeEvent'];
    $lien = $_POST['lien'];
    $descorg = $_POST['descorg'];
    $siteorg = $_POST['siteorg'];
    $image_URL = $_POST['image_URL'];
    $idOrg =  $_POST['idOrg'];
    $budget = $_POST['budget'];

    $path = "$image_URL";

    require_once 'dbConnect.php';
    

    $sql = "INSERT INTO evenement(nomEvent,dateDeb,dateFin,heureEvent,lieuEvent,descriptionEvent,URL_Image,categ,typeEvent,budget,idOrg,lienfb,descOrg,siteOrg)
    values('$nomEvent','$dateDeb','$dateFin','$heure','$lieuEvent','$descriptionEvent','$image_URL','$categ','$typeEvent','$budget','$idOrg','$lien','$descorg','$siteorg')";


    if ( mysqli_query($con, $sql) ) {
    
        file_put_contents($path,base64_decode($image_URL));
        $result["success"] = "1";
        $result["message"] = "success";
    


        echo json_encode($result);
        mysqli_close($con);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($con);
    }
}

?>