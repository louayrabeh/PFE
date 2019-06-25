<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $emailSpons = $_POST['emailSpons'];
    $nomSpons = $_POST['nomSpons'];
    $idSpons = $_POST['idSpons'];
    $prenomSpons = $_POST['prenomSpons'];
    $adrSpons = $_POST['adrSpons'];
    $telSpons = $_POST['telSpons'];
    $organismeSpons = $_POST['organismeSpons'];

    require_once 'dbConnect.php';

    $sql = "UPDATE sponsor SET nomSpons ='".$nomSpons."',emailSpons='".$emailSpons."',prenomSpons='".$prenomSpons."',adrSpons='".$adrSpons."',telSpons='".$telSpons."',organismeSpons='".$organismeSpons."' WHERE idSpons='".$idSpons."'";

    
        $response = mysqli_query($con, $sql);
    

        $result = array();


        if (mysqli_num_rows($response) > 0){
     
            
            while($res = mysqli_fetch_assoc($response) )
            {

            $result["success"] = "1";
        $result["message"] = "success"; 
       
            }

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
















