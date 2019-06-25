<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $emailSpons = $_POST['emailSpons'];
    $mdpSpons = $_POST['mdpSpons'];

    require_once 'dbConnect.php';

    $sql = "SELECT * FROM sponsor WHERE emailSpons='".$emailSpons."' and mdpSpons ='".$mdpSpons."'";

    
        $response = mysqli_query($con, $sql);
    

        $result = array();


        if (mysqli_num_rows($response) > 0){
     
            
            while($res = mysqli_fetch_assoc($response) )
            {

            $result["success"] = "1";
        $result["message"] = "success"; 
        $result["emailSpons"] = $res["emailSpons"];
        $result["nomSpons"] = $res["nomSpons"];
        $result["idSpons"] = $res["idSpons"];


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
















