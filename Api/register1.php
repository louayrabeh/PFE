
<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){


   // $idSpons = $_POST['idSpons'];
    $nomOrg = $_POST['nomOrg'];
    $prenomOrg = $_POST['prenomOrg'];
    $adrOrg = $_POST['adrOrg'];
    $telOrg = $_POST['telOrg'];
    $emailOrg = $_POST['emailOrg'];
    $mdpOrg = $_POST['mdpOrg'];
    $centre = $_POST['centre'];


    require_once 'dbConnect.php';

    $sql = "INSERT INTO organisateur(nomOrg,prenomOrg,adrOrg,telOrg,emailOrg,mdpOrg,centre) VALUES ('$nomOrg','$prenomOrg','$adrOrg','$telOrg','$emailOrg','$mdpOrg','$centre')";

    if ( mysqli_query($con, $sql) ) {
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