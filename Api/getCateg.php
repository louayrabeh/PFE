<?php

//if ($_SERVER['REQUEST_METHOD']=='POST') {
    require_once 'dbConnect.php';

$response = array();

$query="SELECT * FROM  categorie ;";

$result=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result))
{
    array_push($response,$row);
}

    echo json_encode(utf8ize($response));
mysqli_close($con);

//}

function utf8ize($d) {
    if (is_array($d)) 
        foreach ($d as $k => $v) 
            $d[$k] = utf8ize($v);

     else if(is_object($d))
        foreach ($d as $k => $v) 
            $d->$k = utf8ize($v);

     else 
        return utf8_encode($d);

    return $d;
}
?>









