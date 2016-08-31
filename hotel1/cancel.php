
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>BASIC HOTEL</title>

    <script type='text/javascript' src="admin/js/jquery.js"></script>


    <script type="text/javascript" src="admin/js/bootstrap-progressbar.js"></script>

    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap-progressbar.css">

 <style type="text/css">
 		body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      	}
        .progress .bar.six-sec-ease-in-out {
            -webkit-transition: width 6s ease-in-out;
            -moz-transition: width 6s ease-in-out;
            -ms-transition: width 6s ease-in-out;
            -o-transition: width 6s ease-in-out;
            transition: width 6s ease-in-out;
        }
        .progress.vertical .bar.six-sec-ease-in-out {
            -webkit-transition: height 6s ease-in-out;
            -moz-transition: height 6s ease-in-out;
            -ms-transition: height 6s ease-in-out;
            -o-transition: height 6s ease-in-out;
            transition: height 6s ease-in-out;
        }
        .progress.wide {
            width: 10px;
        }
        .vertical-progressbar-span {
            height: 100px;
        }
    </style>
    
    
 <?php

include('admin/connect.php');	
require ('includes/class.phpmailer.php');
require ('includes/PHPMailerAutoload.php');

		
	$confirmation = $_POST['confirmation'];
	$b = $_POST['roomid'];
	
	function cancel($confirmation,$b){

$qry = mysql_query("select count('reserveID') from tb_reserve where transaction_code = '$confirmation' and roomID = '$b'") or die (mysql_error());
			
		return (mysql_result($qry, 0 ) == 1 ) ? true : false;
				
	}
	
	
	if (cancel($confirmation,$b) === false){
		
		echo '	<script type="text/javascript">
              	alert("Please check your Transaction code and room ID");
				window.location= "index.php";
              	</script>';	
				


	}
		
		else{
	
		$query = mysql_query("update tb_reserve set transaction_code = 'cancel',status = 'cancel' WHERE 			transaction_code='$confirmation' and roomID = '$b'") or die (mysql_error());
			
		$sendc = mysql_query("select * from tb_reserve where transaction_code = '$confirmation'") or die (mysql_error());
		while ($row = mysql_fetch_array($sendc)){
				$memberID = $row['memberID'];
				
		$mem = mysql_query("select * from tb_member where memberID = '$memberID'") or die (mysql_error());		
				$mrow = mysql_fetch_array($mem);
				$fname = $mrow['firstname'];
				$lname = $mrow['lastname'];
				$email = $mrow['email'];
				
	
	/*
		$mail_To = $email;
                $mail_Subject = "Reservation notification From BASIC HOTEL";
                $mail_Body = "First Name: $fname\n".
		"Last Name: $lname\n".
		"Email: $email \n".
		"Confirmation Number: $confirmation\n ".
		"You have Successfully Cancel a Reservation Thanks!!";
                mail($mail_To, $mail_Subject, $mail_Body);
		*/

        $mail= new PHPMailer();
//indico a la clase que use SMTP
$mail->isSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail->SMTPDebug=2;
//Debo de hacer autenticación SMTP
$mail->SMTPAuth=true;
$mail->SMTPSecure="ssl";
//indico el servidor de Gmail para SMTP
$mail->Host="smtp.gmail.com";
//indico el puerto que usa Gmail
$mail->Port=465;
//indico un usuario / clave de un usuario de gmail
$mail->Username= "basichotelmx@gmail.com";
$mail->Password="buscarvhotel";
$mail->setFrom('basichotelmx@gmail.com', 'BasicHotel');
$mail->addReplyTo("basichotelmx@gmail.com","BasicHotel");
$mail->Subject= "Notificacion de cancelacion de reservacion BASIC HOTEL";
$mail->msgHTML("Se ha enviado esta orden de reservacion a su correo porque nuestra pagina registro este correo como contacto de reservacion!");
$mail->msgHTML("Nombre(s): $fname<br/>".
    "Apellido: $lname<br/>".
    "Email: $email <br/>".
    "Codigo de confirmacion : $confirmation <br/>".
    "Usted ha cancelado satisfactoriamente su reservacion, Gracias. <br/>");
                
$mail->Timeout=60;
$mail->IsHTML(true);
$address=$email; //aqui paso el email del cliente
$mail->addAddress($address, $fname);
if(!$mail->send()) {
echo "Error al enviar: " . $mail­>ErrorInfo;
} else {
echo "Confirmacion de su cancelacion de reservacion enviado a su correo electronico!";
 }
}
		
		
		
	?>   
    
		
	
		

	

    <script>
        $(document).ready(function() {
		
               
                $('.progress .bar.text-filled-1').progressbar({
                    display_text: 1,
					         refresh_speed: 200,
                   transition_delay: 500,
             
            });
            
            });
   
    </script>
    
    <script type="text/javascript">
	$(document).ready(function()
		{
		 var delay = 2000;
		setTimeout(function(){ window.location = 'index.php';}, delay);
		alert('You have Successfully Cancel a Reservation Thanks!!');  
    });
	
	

	</script>
    

    <?php }?>

    
</head> 
<body>

  
			<div style="margin-top:200px;" class="modal">	
            	<div class="modal-body">
                		<h4>Cancelation process......</h4>
                		<div id="prog" class="progress progress-info progress-striped">
      <div class="bar text-filled-1" data-amount-part="1337" data-amount-total="9000" data-percentage="100">Cancel</div>
                </div>
                </div>
           	</div>     
		
		
   
</body>