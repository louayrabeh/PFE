<?php
   require_once 'dbConnect.php';
//if ($_SERVER['REQUEST_METHOD']=='POST') {
    $idEvent = $_GET['idEvent'];
    $query="SELECT * FROM  evenement where idEvent='$idEvent' ;";
    $response = array();
    $result=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result))
{
    if(empty($_GET['nomEvent'])){
        $nomEvent=$row["nomEvent"];
    }
    else{
        $nomEvent=$_GET["nomEvent"];
    }
    //$nomEvent = $_POST['nomEvent'];
    echo $nomEvent;
    $dateDeb = $_POST['dateDeb'];
    $dateFin = $_POST['dateFin'];
    $heure = $_POST['heureEvent'];
    $lieuEvent = $_POST['lieuEvent'];
    $descriptionEvent = $_POST['descriptionEvent'];
    $categ = $_POST['categ'];
    $typeEvent = $_POST['typeEvent'];
    $lien = $_POST['lien'];
    $descorg = $_POST['descorg'];
    $siteorg = $_POST['siteorg'];
    $image_URL = $_POST['image_URL'];
    $budget = $_POST['budget'];
}
    
 

    $sql = "UPDATE evenement SET nomEvent ='".$nomEvent."',dateDeb='".$dateDeb."',dateFin='".$dateFin."',heureEvent='".$heureEvent."',lieuEvent='".$lieuEvent."',descriptionEvent='".$descriptionEvent."',URL_Image='".$URL_Image."',categ='".$categ."',typeEvent='".$typeEvent."',budget='".$budget."',lienfb='".$lienfb."',descOrg='".$descOrg."',siteOrg='".$siteOrg."' WHERE idEvent='".$idEvent."'";

    
        $response = mysqli_query($con, $sql);
    

        $result = array();


        if (mysqli_num_rows($response) > 0){
     
            
            while($res = mysqli_fetch_assoc($response) )
            {

            $result["success"] = "1";
        $result["message"] = "success"; 
       
            }

            echo json_encode($result);
            mysqli_close($con);

        } else {
    
            $result["success"] = "0";
            $result["message"] = "error";
    
            echo json_encode($result);
            mysqli_close($con);
        }
   // }
             
            ?>
















