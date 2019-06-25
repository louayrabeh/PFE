<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $emailOrg = $_POST['emailOrg'];
    $mdpOrg = $_POST['mdpOrg'];

    require_once 'dbConnect.php';

    $sql = "SELECT * FROM organisateur WHERE emailOrg='".$emailOrg."' and mdpOrg ='".$mdpOrg."'";

    
        $response = mysqli_query($con, $sql);
    

        $result = array();


        if (mysqli_num_rows($response) > 0){
     
            
            while($res = mysqli_fetch_assoc($response) )
            {

            $result["success"] = "1";
        $result["message"] = "success"; 
        $result["emailOrg"] = $res["emailOrg"];
        $result["nomOrg"] = $res["nomOrg"];
        $result["idOrg"] = $res["idOrg"];


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
















