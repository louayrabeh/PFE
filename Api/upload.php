<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $idSpons = $_POST['idSpons'];
    $img = $_POST['img'];

   // $path = "$img.jpeg";
   $path = "$img";
    //$finalPath = "http://192.168.10.86/image_base".$path;
$finalPath = $path;
    require_once 'dbConnect.php';

    $sql = "UPDATE sponsor SET img='$finalPath' WHERE idSpons='$idSpons';";

    if (mysqli_query($con, $sql)) {
        
        if (file_put_contents( $path, base64_decode($img) ) ) {
            
            $result['success'] = "1";
            $result['message'] = "success";

            echo json_encode($result);
            mysqli_close($con);

        }

    }

}

?>