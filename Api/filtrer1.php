<?php
    
    if ($_SERVER['REQUEST_METHOD']=='POST') {

        require_once 'dbConnect.php';
        
    $query= "Select * FROM evenement where idEvent != 0";
    if(isset($_POST['categ'])){
        $categ = $_POST['categ'];
    $query.= " and categ in (".$categ.") ";
    }

	$result = mysqli_query($con, $query);
	
	$temp_array  = array();
	
	
		while ($row = mysqli_fetch_assoc($result)) {
			$temp_array[] = $row;
		} 

	
	header('Content-Type: application/json');
	echo json_encode(utf8ize($temp_array));
    mysqli_close($con);
    

    }

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