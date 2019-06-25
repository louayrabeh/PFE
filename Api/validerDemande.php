
<?php
//if ($_SERVER['REQUEST_METHOD']=='POST') {
    require_once 'dbConnect.php';
    //$content = $_POST['content'];
    $idDemande = 1;
    $idSpons =7478926;

    
    $query="SELECT * FROM sponsor where idSpons ='".$idSpons."'";
    $result1=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result1)){
        $nomSpons=$row["nomSpons"];
        $prenomSpons=$row["prenomSpons"];
        $nom=$nomSpons." ".$prenomSpons;
    }
    //header('Content-Type: text/html; charset=utf-8');
    $content="Le sponsor ".$nom." a accepté votre demande";
    echo $content;
        
    $query="SELECT * FROM demande where idDemande ='".$idDemande."'";
    $result1=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result1)){
        $idEvent=$row["idEvent"];
    }
    $query="SELECT * FROM evenement where idEvent ='".$idEvent."'";
    $result=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)){
    
        $idOrg=$row["idOrg"];
    }
    $query1 = "INSERT INTO notifications(content,idOrg) VALUES ('$content','$idOrg')";
    mysqli_query($con, $query1);
    echo $idOrg;
$query2="UPDATE demande SET etat='1' WHERE idDemande ='".$idDemande."' ";
mysqli_query($con, $query);
$res=array();
            if ( mysqli_query($con, $query2) ) {
                
                $res["success"] = "1";
                $res["message"] = "success";

                echo json_encode($res);
                mysqli_close($con);

            } else {

                $res["success"] = "0";
                $res["message"] = "error";

                echo json_encode($res);
                mysqli_close($con);
            }
            

//}
?>