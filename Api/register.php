
<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){


   // $idSpons = $_POST['idSpons'];
    $nomSpons = $_POST['nomSpons'];
    $prenomSpons = $_POST['prenomSpons'];
   // $organismeSpons = $_POST['organismeSpons'];
    $adrSpons = $_POST['adrSpons'];
    $telSpons = $_POST['telSpons'];
    $emailSpons = $_POST['emailSpons'];
    $mdpSpons = $_POST['mdpSpons'];
    $centre = $_POST['centre'];

    //$mdpSpons = password_hash($mdpSpons, PASSWORD_DEFAULT);

    require_once 'dbConnect.php';

   // $sql = "INSERT INTO sponsor (idSpons,nomSpons,prenomSpons,organismeSpons,adrSpons,telSpons,emailSpons,mdpSpons,img,isactive,centre) VALUES ('$idSpons','$nomSpons','$prenomSpons','$organismeSpons','$adrSpons','$telSpons','$emailSpons','$mdpSpons','$img','$isactive','$centre')";
    $sql = "INSERT INTO sponsor (nomSpons,prenomSpons,adrSpons,telSpons,emailSpons,mdpSpons,centre) VALUES ('$nomSpons','$prenomSpons','$adrSpons','$telSpons','$emailSpons','$mdpSpons','$centre')";

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