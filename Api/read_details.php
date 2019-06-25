<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $idSpons = $_POST['idSpons'];

    require_once 'dbConnect.php';

    $sql = "SELECT * FROM sponsor WHERE idSpons ='".$idSpons."'";

    
        $response = mysqli_query($con, $sql);
    

        $result = array();


        if (mysqli_num_rows($response) > 0){
     
            
            while($res = mysqli_fetch_assoc($response) )
            {

            $result["success"] = "1";
        $result["message"] = "success"; 
        $result["emailSpons"] = $res["emailSpons"];
        $result["nomSpons"] = $res["nomSpons"];
        $result["img"] = $res["img"];
        $result["prenomSpons"] = $res["prenomSpons"];
        $result["organismeSpons"] = $res["organismeSpons"];
        $result["adrSpons"] = $res["adrSpons"];
        $result["telSpons"] = $res["telSpons"];
         
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