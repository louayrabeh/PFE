<?php

$user="root";
$password="";
$host="localhost";
$db_name="sponsoringapp";

$con = mysqli_connect($host,$user,$password,$db_name);

$response = array();


$query="SELECT * FROM  sponsor ";

$result=mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		
		array_push($response, $row);
	}
}

echo json_encode(utf8ize($response));

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






