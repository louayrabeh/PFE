<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $idEvent = $_POST['idEvent'];

        require_once 'dbConnect.php';


$query="DELETE FROM evenement WHERE idEvent='".$idEvent."';";
 

            if ( mysqli_query($con, $query) ) {
                
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