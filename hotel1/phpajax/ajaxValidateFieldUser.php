<?php

	$hostname = "localhost";
	$username = "buscarv";
	$password = "hotel2016*";
	$dbname = "buscarv_hotel";
	
	$connection = mysql_connect($hostname, $username, $password);
	if(!$connection) {
		echo "Database connection failed.";
	}
	$dbselect  = mysql_select_db($dbname);
	if(!$dbselect) {
		echo "Database selection failed.";
	}

	

/* RECEIVE VALUE */
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];


$validateError= "Este nombre de usuario ya existe";
$validateSuccess= "Este nombre de usuario esta disponible";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
	
		
	$query = mysql_query("select * from tb_member") or die (mysql_error());
	while ($row = mysql_fetch_array($query)){
		
		$user = $row['username'];
        
        if($validateValue == $user){		// validate??
	       $arrayToJs[1] = false;			// RETURN TRUE
	       echo json_encode($arrayToJs);    // RETURN ARRAY WITH success
            exit;
            }       
 
	
        }
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = true;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
            exit;
		}
	}
	
?>