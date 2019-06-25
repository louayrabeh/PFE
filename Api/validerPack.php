
<?php
//if ($_SERVER['REQUEST_METHOD']=='POST') {
    require_once 'dbConnect.php';
    //$content = $_POST['content'];
    $idPack = $_POST["idPack"];
    $idSpons =$_POST["idSpons"];
    $query="SELECT nomPack FROM pack where idPack ='".$idPack."'";
    $result=mysqli_query($con,$query);
    foreach($result as $key){
        foreach($key as $key1 => $val){
        $nomPack=$val;
        }
    }
    $query="SELECT idEvent FROM pack where idPack ='".$idPack."'";
    $result=mysqli_query($con,$query);
    foreach($result as $key){
        foreach($key as $key1 => $val){
        
            $query="SELECT * FROM evenement where idEvent ='".$val."'";
    $result=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result)){
        $nomEvent=$row["nomEvent"];
        $idOrg=$row["idOrg"];
    }

        }
    }
    
    $query="SELECT * FROM sponsor where idSpons ='".$idSpons."'";
    $result1=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result1)){
        $nomSpons=$row["nomSpons"];
        $prenomSpons=$row["prenomSpons"];
        $nom=$nomSpons." ".$prenomSpons;
    }
    //header('Content-Type: text/html; charset=utf-8');
    $content="Le pack ".$nomPack." de votre événement ".$nomEvent." a été validé par le sponsor ".$nom;
    echo $content;
        

$query="INSERT INTO notifications(content,idOrg) VALUES ('$content','$idOrg')";
$query2="INSERT INTO achatpack(idPack,idSpons) VALUES ('$idPack','$idSpons')";
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