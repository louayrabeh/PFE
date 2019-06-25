<?php


$user="root";
$password="";
$host="localhost";
$db_name="sponsoringapp";

$con = mysqli_connect($host,$user,$password,$db_name);

    if($con)  {
    $img = $_POST['image'];
$name = $_POST['name'];
    $sql = "INSERT INTO image(name) VALUES ('$name')";
    $finalPath = "upload/$name.jpg";


    if (mysqli_query($con, $sql)) {
        
      file_put_contents( $finalPath, base64_decode($img));
            

            echo json_encode(array('response'=>'successfully uploaded'));
       
        }

        else{
            echo json_encode(array('response'=>'failed '));
        }
    }
else {
    echo json_encode(array('response'=>'failed 2'));
}

mysqli_close($con);
    
?>