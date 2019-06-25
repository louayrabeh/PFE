<?php

//if ($_SERVER['REQUEST_METHOD']=='POST') {

    $idOrg = $_POST['idOrg'];

    require_once 'dbConnect.php';

$response = array();

$query="SELECT * FROM  organisateur WHERE idOrg='".$idOrg."' ;";

$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)

{
	while($row = mysqli_fetch_assoc($result))
	{
      
        $query1="SELECT * FROM  evenement WHERE categ='".$row["centre"]."' ;";
        $result1=mysqli_query($con,$query1);
        if(mysqli_num_rows($result1) > 0)

{
	while($row1 = mysqli_fetch_assoc($result1))
	{
        array_push($response, $row1);
    }

}
    }

    echo json_encode(utf8ize($response));
             
                 
}

mysqli_close($con);


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









