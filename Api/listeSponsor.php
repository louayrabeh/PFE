<?php

//if ($_SERVER['REQUEST_METHOD']=='POST') {
    require_once 'dbConnect.php';


//$idSpons = $_POST['idSpons'];

require_once 'dbConnect.php';

$sql = "SELECT * FROM sponsor" ;


    $response = mysqli_query($con, $sql);


    $result = array();


    if (mysqli_num_rows($response) > 0){
 
        
        while($res = mysqli_fetch_assoc($response) )
        {

        $result["success"] = "1";
    $result["message"] = "success"; 
    $result[] = $res;
     
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
         
    //    }
         
         
        ?>