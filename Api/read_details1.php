<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $idOrg = $_POST['idOrg'];

    require_once 'dbConnect.php';

    $sql = "SELECT * FROM organisateur WHERE idOrg ='".$idOrg."'";

    
        $response = mysqli_query($con, $sql);
    

        $result = array();


        if (mysqli_num_rows($response) > 0){
     
            
            while($res = mysqli_fetch_assoc($response) )
            {

            $result["success"] = "1";
        $result["message"] = "success"; 
        $result["emailOrg"] = $res["emailOrg"];
        $result["nomOrg"] = $res["nomOrg"];
        $result["prenomOrg"] = $res["prenomOrg"];
        $result["adrOrg"] = $res["adrOrg"];
        $result["telOrg"] = $res["telOrg"];
        $result["img"] = $res["img"];
         
            }

            echo json_encode($result);
             
                 
             }else {
                 
                 array_push($result,array(
                 "error"=>'error',
             
             )
             );
             echo json_encode(array("result"=>$result));
             }
            
             mysqli_close($con);
             
            }
             
             
            ?>