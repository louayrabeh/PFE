<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $emailOrg = $_POST['emailOrg'];
    $nomOrg = $_POST['nomOrg'];
    $idOrg = $_POST['idOrg'];
    $prenomOrg = $_POST['prenomOrg'];
    $adrOrg = $_POST['adrOrg'];
    $telOrg = $_POST['telOrg'];

    require_once 'dbConnect.php';

    $sql = "UPDATE organisateur SET nomOrg ='".$nomOrg."',emailOrg='".$emailOrg."',prenomOrg='".$prenomOrg."',adrOrg='".$adrOrg."',telOrg='".$telOrg."' WHERE idOrg='".$idOrg."'";

    
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
















