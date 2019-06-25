<?php
    
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $nomP = $_POST['nomP'];
    $typeP = $_POST['typeP'];
    $deadline = $_POST['deadline'];
    $montant = $_POST['montant'];
    $audience = $_POST['audience'];
    $descriptionP = $_POST['descriptionP'];
    $id = $_POST['idOrg'];
    
        require_once 'dbConnect.php';
        $response=array();
    $query="SELECT MAX(idEvent) FROM evenement where idOrg ='".$id."'";
    $res=mysqli_query($con,$query);
    $r=0;


    foreach($res as $key){
        foreach($key as $key1 => $val){
            $r=$val;
}}

if(isset($_POST['idEvent']))
{
    $idEvent = $_POST['idEvent'];
    $q1 = " INSERT INTO pack(nomPack,descriptionPack,typePack,montant,audience,deadline,idEvent)  values ('$nomP','$descriptionP','$typeP','$montant','$audience','$deadline','$idEvent')";
}
else{

            $q1 = " INSERT INTO pack(nomPack,descriptionPack,typePack,montant,audience,deadline,idEvent)  values ('$nomP','$descriptionP','$typeP','$montant','$audience','$deadline','$r')";

        }
            if ( mysqli_query($con, $q1) ) {
                
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