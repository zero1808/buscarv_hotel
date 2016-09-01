<?php include('header1.php'); ?>
<?php include('sistema/admin/connect.php');?>

<?php
$query = mysql_query("select * from tb_member where memberID") or die(mysql_error());
$m1;
                                    while ($row = mysql_fetch_array($query)) {
                                        $memberID = $row['memberID'];
										$m1 = $memberID + 1;
										
										
										
                                        ?>
                                        
                                       
                                        
                                        <?php }?>
    
                                

<?php


	function createRandomPassword() {



    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;



    while ($i <= 11) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }



    return $pass;



}
require ('includes/class.phpmailer.php');
require ('includes/PHPMailerAutoload.php');
if(isset($_POST['order'])){

	$confirmation = createRandomPassword();
	$start = $_POST['start'];
	$end = $_POST['end'];
	$result = $_POST['result'];
	$pextras = $_POST['pextras'];
	$total = $_POST['total'];
	$pre = $_POST['pre'];
	$bal = $_POST['bal'];
	$tax = $_POST['tax'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['user'];
	$email = $_POST['email'];
	$cnumber = $_POST['cnumber'];
	$password = md5($_POST['password']);
	$zip = $_POST['zip'];
	$address = $_POST['address'];
	$request = $_POST['request'];
	$totalper = $_POST['totalper'];
  	$balance = $_POST['balance'];
  	$partial = $_POST['partial'];
	
	
		
	
			
$query = mysql_query("insert into tb_member (firstname,lastname,email,contact_number,password,username,zip,address)
			values('$fname','$lname','$email','$cnumber','$password','$username','$zip','$address')") or die(mysql_error());

echo $id;
$id=$_POST['selector'];

if(count($id)>0)
{
	foreach($id as $key=>$id)
	{

$query="INSERT INTO tb_reserve(roomID,memberID,days_no,total,partial,balance,arrival,departure,status,transaction_code,request,pextras)  VALUES('$id','$m1','$result','$totalper','$partial','$balance','$start','$end','reserved','$confirmation','$request','$pextras')";
		mysql_query($query) or die ('Error Updating the Database' . mysql_errno());
		mysql_query("update tb_rooms set status='Reserved' where roomID='$id'") or die(mysql_error());			
	}
	echo '';
}
else
	echo '';


}
?>									

 <style type="text/css">
 
      .form-signin {
        max-width: 600px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
	  
	  
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  		

 
<script type = 'text/javascript' >
function changeHashOnLoad() {
     window.location.href += '#';
     setTimeout('changeHashAgain()', '50'); 
}

function changeHashAgain() {
  window.location.href += '1';
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);
window.onload=changeHashOnLoad;
</script> 




<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  9
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>BASIC HOTEL BuscarV</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


<body>



<div class="container"><!--Container -->

	

	<div class="form-signin">
    
    <h6>Por favor imprime los detalles de tu reservación.</h6>    
			<hr>
            
            <a style=" margin-bottom:10px;" class="btn" href="javascript:Clickheretoprint()"><i class="icon-print"></i> Print</a>
            
			
            <div id="print_content">
            
    
    <table>
    			<tr>
					<td><strong>Código de transacción:</strong></td>
                    <td width="300px"><div align="right"><?php echo $confirmation;?></div></td>
 				</tr>
                
            	<tr>
					<td><strong>Llegada:</strong></td>
                    <td width="300px"><div align="right"><?php echo $start;?></div></td>
 				</tr>
                
                
                <tr>
                	<td><strong>Salida:</strong></td>
                	<td><div align="right"><?php echo $end;?></div></td>                
                </tr>
                <tr>
                	<td><strong>Numero de noches:</strong></td>
                	<td><div align="right"><?php echo $result;?></div></td>
                </tr>
         <tr>
                	<td></td>
                    <td><div align="right">Cargo total por personas extras</div></td>
                    <td width="170px"><div align="right">$ <?php echo $pextras;?></div></td>
                
                </tr>
                <tr>
                	<td></td>
                    <td><div align="right">Cargo total por renta de habitacion/es:</div></td>
                    <td width="170px"><div align="right">$ <?php echo $total;?></div></td>
                
                </tr>
                <tr>
                	<td></td>
                    <td><div align="right">Total:</div></td>
                    <td width="100px"><div align="right">$ <?php echo $bal;?></div></td>
                
                </tr>
              <!--  <tr class="alert alert-info">
                	<td><strong>Paypal Payment</strong></td>
                    <td><div align="right"><i class="icon-info-sign"></i>DUE NOW - PREPAYMENT 10%:</div></td>
                    <td width="100px"><div align="right">PHP <?php echo $pre;?>.00</div></td>
                
                </tr>-->
                <tr>
                	<td></td>
                    <td><div align="right">No. de habitación:</div></td>
                    <td width="100px"><div align="right">	<?php 
  
  	$id=$_POST['selector'];
	$N = count($id);
	$rname = NULL;
	$pname = NULL;

	for($i=0; $i < $N; $i++)
	{
	
	
	$res = mysql_query("SELECT * FROM tb_rooms where roomID='$id[$i]'");
	while($row = mysql_fetch_array($res)){
			$rname = $row['name'];

			
	}
  
  
   ?>
    <?php echo '#'."".$rname;?>
    
    <?php }?> </div></td>
                
                </tr>
              
              
               
                <tr>
                	<td></td>
                    <td><div align="right">Impuestos:</div></td>
                    <td width="100px"><div align="right">$ <?php echo $tax;?></div></td>
                </tr>
                 
                
                <tr class="alert alert-success">
					<td><strong>Detalles del cliente</strong></td>
                    <td width="300px"><div align="right"></div></td>
 				</tr>
                
                <tr>
					<td><strong>Nombre(s):</strong></td>
                    <td width="300px"><div align="right"><?php echo $fname;?></div></td>
 				</tr>
                
                <tr>
					<td><strong>Apellido:</strong></td>
                    <td width="300px"><div align="right"><?php echo $lname;?></div></td>
 				</tr>
                <tr>
					<td><strong>Email:</strong></td>
                    <td width="300px"><div align="right"><?php echo $email;?></div></td>
 				</tr>
              
                <tr>
					<td><strong>Teléfono:</strong></td>
                    <td width="300px"><div align="right"><?php echo $cnumber;?></div></td>
 				</tr>
                <tr>
					<td><strong>Password:</strong></td>
                    <td width="300px"><div align="right"><?php echo $password;?></div></td>
 				</tr>
                <tr>
					<td><strong>Codigo Postal:</strong></td>
                    <td width="300px"><div align="right"><?php echo $zip;?></div></td>
 				</tr>
                <tr>
					<td><strong>Dirección:</strong></td>
                    <td width="300px"><div align="right"><?php echo $address;?></div></td>
 				</tr>
        
 
            </table>
            
   </div>         
       

    	
	</div><!--form end -->
    
   
    	                           
</div><!--container end -->

</body>

 <script type="text/javascript">
		
		function save(){
			
							var roomid=$("#roomid").val();
				
							$.ajax({
                              type:"post",
                              url:"process.php",
                              data:"roomid="+roomid,
                             
                          });	

		}
		
	</script>

</html>