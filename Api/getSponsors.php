<?php

//if ($_SERVER['REQUEST_METHOD']=='POST') {
    require_once 'dbConnect.php';
$idEvent= $_POST['idEvent'];
$query="SELECT * FROM  pack where idEvent='$idEvent' ;";
$response = array();

$result=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result))
{
    array_push($response,"'".$row["idPack"]."'");
}
$e=implode(",",$response);
$query1="SELECT * FROM  achatpack where idPack in ($e) ;";
$response1 = array();

$result1=mysqli_query($con,$query1);
while($row1 = mysqli_fetch_assoc($result1))
{
    array_push($response1,"'".$row1['idSpons']."'");
}
$e1=implode(",",$response1);
$query2="SELECT * FROM  sponsor where idSpons in ($e1) ;";
$result2=mysqli_query($con,$query2);
while($row2 = mysqli_fetch_assoc($result2))
{
    $response2[]=$row2;
    
}
    echo json_encode(utf8ize($response2));
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