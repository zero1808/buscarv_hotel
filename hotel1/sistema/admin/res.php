<?php
include('connect.php');

if(isset($_POST['res'])){

$id=$_POST['reserveid'];
$roomID=$_POST['roomID'];
$roomp=$_POST['roomp'];


	$result = mysql_query("UPDATE tb_reserve SET roomID = '$roomID' where reserveid='$id'")or die(mysql_error());
	
	$qry = mysql_query("UPDATE tb_rooms SET status = 'Reservada' where roomID='$roomID'") or die (mysql_error());
	
	$up = mysql_query("UPDATE tb_rooms SET status = 'Disponible' where roomID='$roomp'") or die (mysql_error());

?>

											<script type="text/javascript">
                                                alert("Exitosamente se cambio de habitacion");
                                                window.location= "progressbar.php";
                                            </script>
                                            
                                            <?php }?>