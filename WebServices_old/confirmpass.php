<?php
$connect = mysqli_connect("localhost", "root", "",'sponsoringapp');
$code= $_GET["codeconf"];
$query = "SELECT * from codeconf where code like '".$code."';";
$result = mysqli_query($connect,$query);
if (mysqli_num_rows($result) > 0){
    echo "valid code";
    $query1="DELETE FROM codeconf WHERE code = '".$code."'";
    mysqli_query($connect,$query1);
}
else{
    echo "wrong  code";
}
?>