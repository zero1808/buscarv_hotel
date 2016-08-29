<div id="myCarousel" class="carousel slide">
 <div style="margin-top:15px;" class="container thumbnail">
<div  class="input-prepend">
          <div class="btn-group">
          <button id="btt_reservaciones" class="btn"><i class="icon-print"></i> Reservaciones</button>   
          <button id="btt_checkin" class="btn"></i> Checkin</button>      
          <button id="btt_checkout" class="btn"></i> Checkout</button>    
          <button id="btt_canceladas" class="btn"></i> T. Canceladas</button>     
          <button id="btt_logs" class="btn"></i> Logs</button>    
          <button id="btt_clientes" class="btn"></i> Clientes</button>     
          <button id="btt_usuarios" class="btn"></i> Usuarios</button>   
          <button id="btt_habitaciones" class="btn"><i class="icon-off"></i> Habitaciones</button>
          <button id="btt_categorias" class="btn"></i>Categorías</button>     

      </div>        
</div>
</div><!-- Carousel items -->
<div>
<div id="reservaciones_item" style="display:block"> <!--item 1 -->
<div style="margin-top:15px;" class="container thumbnail">
            <pre><h4><strong><i class="icon-list"></i> Reservaciones</strong></h4></pre>
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmación</div></th>
                        <th><div align="center">No. Habitación</div></th>
                        <th><div align="center">Cliente</div></th>
                        <th><div align="center">Días</div></th>
                        <th><div align="center">Llegada</div></th>
                        <th><div align="center">Salida</div></th>
                        <th><div align="center">Total</div></th>
                        <th><div align="center">Parcial</div></th>
                        <th><div align="center">Balance</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Descuento</div></th>
                        <th><div align="center">Requiere</div></th>
                        <th><div align="center">Mode</div></th>
                        <th><div align="center"><a data-trigger="hover" title="Buttons Function" data-placement="top" data-content="Change Room/Discount/Checkin" data-toggle="popover">Menú</a></div></th>
                    </tr>
                </thead>   	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='reserved'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
										$catdi = $product_row['category_id'];
										
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
                                        ?>	
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['total']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['partial']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['balance']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>
										    <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php if ($cart_row['discount'] == 0){echo 'None';}else{echo $cart_row['discount'];} ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php if($cart_row['request' == '']){echo 'None';} else{echo $cart_row['request'];} ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['modeofpayment']; ?></div></td>
                                            <td width="128"><a href="#change<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-edit"></i></a>
                                            <a href="#discount<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-gift"></i></a>
                                            <a href="#checkin<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-pencil"></i></a>
                                            </td>
                                          <div id="checkin<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                            <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Check-In</h5>
                                        </div>
                                        <div class="modal-body">
                 <div class="alert-block">      	
                 	<p><strong>Confirmación: </strong><?php echo $cart_row['transaction_code']; ?></p>
                    <p><strong>Nombre del cliente </strong> <?php echo $member_row['firstname']." ".$member_row['lastname']; ?></p>
                 	<p><strong>Pago parcial: </strong> <?php echo $cart_row['partial']; ?></p>
                 </div>
               <div class="alert alert-info"><h6><strong>Balance is: </strong> PHP <?php echo $cart_row['balance']; ?></h6></div>
                         				</div>
                                        <div class="modal-footer">
          <a class="btn btn-danger" href="checkin.php<?php echo '?id='.$order_id; ?>" ><i class="icon-check"></i> Checkin</a>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>
                                        </div>
                                    </div>                      
       <div id="change<?php echo $order_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Cambiar habitación</h5>
  </div>
  <div class="modal-body"> 
  <form action="res.php" method="post">
  <input name="reserveid" type="hidden" value="<?php echo $order_id;?>">
  <input name="roomp" type="hidden" value="<?php echo $product_id;?>">
  <div align="center">No. de habitación: <select class="span2" name="roomID">
  <?php 
	$resc = mysql_query("select * from tb_rooms where category_id = '$catdi' and status = 'available'") or die (mysql_error());
 		while ($row_sche = mysql_fetch_array($resc)){
  ?>
 <option  value="<?php echo $row_sche['roomID']?>"><?php echo 'Room'." ".$row_sche['name'];?></option> 
 <?php }?>
  
  </select>
  
  </div>

  </div>
  
  <div class="modal-footer">
  	
    <button type="submit" class="btn btn-info" name="res"><i class="icon-edit"></i> Cambiar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
    
  </div>
  
   </form>  
  
</div>
       				
       
     <div id="discount<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                            <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Descuentos</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                 <div class="alert-block">
                  
 <form action="discount.php" method="post">
  
  <div align="center">Tipo de descuento: <select class="span2" name="disID">
  <option value="0">--Seleccion descuento--</option>
  <?php 
 	
	$rescs = mysql_query("select * from tb_discount order by 'price'") or die (mysql_error());
 		while ($row_dis = mysql_fetch_array($rescs)){
 
  
  ?>
  
 <option  value="<?php echo $row_dis['id']?>"><?php echo $row_dis['name'];?></option> 
 
 <?php }?>
  
  </select>
 
 	<input name="id" type="hidden" value="<?php echo $order_id;?>" />
	<input name="bal" type="hidden" value="<?php echo $cart_row['balance']; ?>" />
                    
                 </div>
                 
             
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          <button class=" btn btn-success" name="discount" type="submit"><i class="icon-check"></i> Guardar</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancelar</button>

                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                    <!-- end delete modal -->
                                    

											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->




<div id="checkin_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

           <pre><h4><strong><i class="icon-list"></i> Lista de Checkin</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmación</div></th>
                        <th><div align="center">No. Habitación</div></th>
                        <th><div align="center">Cliente</div></th>
                        <th><div align="center">Dias</div></th>
                        <th><div align="center">Llegada</div></th>
                        <th><div align="center">Salida</div></th>
                        <th><div align="center">Total</div></th>
                        <th><div align="center">Parcial</div></th>
                        <th><div align="center">Balance</div></th>
                        <th><div align="center">Orders</div></th>
                        <th><div align="center">Descuento</div></th>
                        <th><div align="center">Payment</div></th>
                        <th><div align="center"><a data-trigger="hover" title="Buttons Functions" data-placement="top" data-content="Check-out/Additional/Discount" data-toggle="popover">Menú</a></div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='checkin'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
										$excess_id = $cart_row['excess_id'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
										$categ = $product_row['category_id'];
									
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);

	$ex_query = mysql_query("select * from tb_price where excess_id = '$excess_id'")or die(mysql_error());
										$ex_row=mysql_fetch_array($ex_query);
										$time = $ex_row['time'];
										$t = $excess_id + $cart_row['balance'];
	$order_query = mysql_query("Select * from tb_orders where reserveID='$order_id'") or die (mysql_error());									
										$order_row = mysql_fetch_array($order_query);
										$prod = $order_row['productID'];
	$prod_query = mysql_query("Select * from tb_products where productID='$prod'") or die (mysql_error());									
										$prod_row = mysql_fetch_array($prod_query);
										$prod_name = $prod_row['name'];									
										
                                        ?>
                                        
                                        
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['total']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['partial']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['balance']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><a href="#orderd<?php echo $order_id; ?>" data-toggle="modal"><?php if ($excess_id == 0){echo 'None';} else{echo $excess_id;}?></div></a></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['discount']; ?></div></td>
										    <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['modeofpayment']; ?></div></td>
                                            
										  	
                                            <td width="128px"><a href="#checkout<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-off"></i></a>
                                            <a href="#addtime<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-edit"></i></a>				
                                            <a href="#discount<?php echo $order_id; ?>" data-toggle="modal" class="btn"><i class="icon-gift"></i></a>
                                            
                                            </td>
                                            
                                            
<!--Modal Log-out --> 
<div id="orderd<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  
  <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Detalle de orden</h5>
  
  </div>
  <div class="modal-body">
 	
    	<div class="row-fluid">
        
        	<div class="control-group">
            	<div class="controls">
                
                	<div class="thumbnail table alert-info">
 <strong>Id del producto &nbsp;</strong>   <strong>Nombre del producto &nbsp;</strong> <strong>Precio &nbsp;&nbsp;&nbsp;&nbsp;</strong> <strong>Qty &nbsp;</strong> <strong class="pull-right">Extension &nbsp;</strong>
                    </div>
                
                	   		<?php $table_order = mysql_query("SELECT * FROM tb_orders where reserveID = '$order_id'") or die (mysql_error());				while($row_orders = mysql_fetch_array($table_order)){
									$p_id = $row_orders['productID'];
									$x_id = $row_orders['excess_id'];
									
								$table_product = mysql_query("SELECT * FROM tb_products where productID = '$p_id'") or die (mysql_error());						$row_products = mysql_fetch_array($table_product);
								
								$table_ex = mysql_query("SELECT * FROM tb_price where excess_id = '$x_id'") or die (mysql_error());						$row_ex = mysql_fetch_array($table_ex);	
									
							?>
                    
                    
                	<div class="thumbnail table">
                    
             						
								 <span style=" margin-right:60px;"><i class="icon-list"></i> <?php echo $row_orders['productID'];?></span>
								 <span style=" margin-right:60px;"><?php echo $row_products['name'];?></span>
                                 
                                 <span style=" margin-right:80px;"><?php echo $row_products['price'];?></span>
						
                				 <span style=" margin-right:80px;"><?php echo $row_orders['quantity'];?></span>
                                 
                                 <span class="pull-right"><?php echo $row_ex['name'];?></span>
                    
                	</div>
                    
                    <?php }?>
                    
       			</div>
        	</div>
        </div>
 
  </div>
  <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
</div>             
                            
<!--Logout end -->
                                            
                                            
                                             <!-- product delete modal -->
                                    <div id="checkout<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                           <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Check-out</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                                        
                                        <form action="checkout.php<?php echo '?id='.$order_id; ?>" method="post">
                                        
                                        <input name="t" type="hidden" value="<?php echo $t;?>" />
                                        <input name="roomID" type="hidden" value="<?php echo $product_id;?>" />
                                        
                                        
                 
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>BASIC HOTEL Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
                 <a style=" margin-bottom:10px;" class="btn" href="javascript:Clickheretoprint()"><i class="icon-print"></i> Print Receipt</a>                       
                 
                 <div id="print_content"> 
                                        
                 <div class="alert-block">
                                 	
                 	<p><strong>Transaction Code: </strong><?php echo $cart_row['transaction_code']; ?></p>
                    <p><strong>Guest Name: </strong> <?php echo $member_row['firstname']." ".$member_row['lastname']; ?></p>
                 	<p><strong>Partial Payment: </strong> <?php echo $cart_row['partial']; ?></p>
                    <p><strong>Extension & Orders: </strong> <?php echo $excess_id; ?></p>
                    
                 </div>
                 
                
                 
               <div class="alert alert-info"><h6><strong>Balance is: </strong> <?php echo $cart_row['balance']; ?> + <?php echo $excess_id; ?> = Total Payable:&nbsp; <span style="font-size:18px">PHP <?php echo $t; ?></span></div>
                         
                         				</div>
                  </div><!--Print Receipt -->        
                         		
                                        <div class="modal-footer">
          <button class="btn btn-info" name="checkout" type="submit"><i class="icon-check"></i> Checkout</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancelar</button>

                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                    
                                    <!-- end delete modal -->
                                    
                                   
                                            
                                    <!-- addtime modal -->
                                    <div id="addtime<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	<h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Extensions/Orders</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                                      
                  
            <form action="excess.php<?php echo '?id='.$order_id; ?>" method="post"> 
                                        
                 <div align="center" class="alert-block">
                                
                 <input name="ex" type="hidden" value="<?php echo $excess_id;?>" />
                 <input name="memberID" type="hidden" value="<?php echo $member_id;?>" />
                 
   
                 <select name="excess_id">
                 	<option value="0">--Extensions--</option>
                 
                 	<?php
				 
                    $while_query=mysql_query("select * from tb_price where category_id = '$categ'")or die(mysql_error());
                    while($row=mysql_fetch_array($while_query)){
                    ?>
					
                    <option value="<?php echo $row['excess_id']?>"><?php echo $row['name'];echo'&nbsp;&nbsp;'; echo'PHP'; echo '&nbsp;'; echo $row['prices']; echo '.00';?></option>

		
                    <?php } ?>
                    
                	 </select>
				
                    <select name="productID">
                    
                 	<option value="0">--Producto--</option>
                 
                 	<?php
				 
                    $pwhile_query=mysql_query("select * from tb_products")or die(mysql_error());
                    while($prow=mysql_fetch_array($pwhile_query)){
                    ?>
					
                    <option value="<?php echo $prow['productID']?>"><?php echo $prow['name'];echo'&nbsp;&nbsp;'; echo'PHP'; echo '&nbsp;'; echo $prow['price']; echo '.00';?></option>

		
                    <?php } ?>
                    
                	 </select>
						      
                 </div>
                 
                 <div align="center"><input name="qty" type="text" placeholder="Quantity" required /></div>
                 
               <div class="alert alert-info"><h6><strong>Balance is: </strong> PHP <?php echo $cart_row['balance'];?></h6></div>
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          		<button class="btn btn-primary" name="submit" type="submit"><i class="icon-check"></i> Submit</button> 
          		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>

			</form>

                                       </div>
                                        
                                    </div>
                                    <!-- end delete modal -->  
                                    
                                    
                                    
                                       
     <div id="discount<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        	
                                            <h5><div style="margin-top:"><img src="../media/kingsfields.png" width="30px" height="30" /></div> BASIC HOTEL Descuentos</h5>
                                        	
                                        </div>
                                        <div class="modal-body">
                                        
                 <div class="alert-block">
                  
 <form action="discount.php" method="post">
  
  <div align="center">Tipo de descuento: <select class="span2" name="disID">
  <option value="0">--Seleccionar descuento--</option>
  <?php 
 	
	$rescs = mysql_query("select * from tb_discount order by 'price'") or die (mysql_error());
 		while ($row_dis = mysql_fetch_array($rescs)){
 
  
  ?>
  
 <option  value="<?php echo $row_dis['id']?>"><?php echo $row_dis['name'];?></option> 
 
 <?php }?>
  
  </select>
 
 	<input name="id" type="hidden" value="<?php echo $order_id;?>" />
	<input name="bal" type="hidden" value="<?php echo $cart_row['balance']; ?>" />
                    
                 </div>
                 
             
                         
                         				</div>
                         
                         		
                                        <div class="modal-footer">
          <button class=" btn btn-success" name="discount" type="submit"><i class="icon-check"></i> Guardar</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancelar</button>

                                        </div>
                                        
                                        </form>
                                        
                                    </div>
                                    <!-- end delete modal -->      
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->

<div id="checkout_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> Lista de Checkout</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmación</div></th>
                        <th><div align="center">No. Habitación</div></th>
                        <th><div align="center">Cliente</div></th>
                        <th><div align="center">Dias</div></th>
                        <th><div align="center">Llegada</div></th>
                        <th><div align="center">Salida</div></th>
                        <th><div align="center">Monto total</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Encargado</div></th>
                        <th><div align="center">Checkout</div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='checkout'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
										$incharge = $cart_row['Incharge'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
    $incharge_query = mysql_query("select * from tb_user where user_id = '$incharge'")or die(mysql_error());
										$incharge_row=mysql_fetch_array($incharge_query);
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['totalamount']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $incharge_row['firstname']." ".$incharge_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['Date']; ?></div></td>
										  	
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->
    

<div id="cancel_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> Lista de transaciones canceladas</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">Confirmación</div></th>
                        <th><div align="center">No. Habitación</div></th>
                        <th><div align="center">Cliente</div></th>
                        <th><div align="center">Dias</div></th>
                        <th><div align="center">Llegada</div></th>
                        <th><div align="center">Salida</div></th>
                        <th><div align="center">Monto total</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Encargado</div></th>
                        <th><div align="center">Checkout</div></th>
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_reserve where status='cancel'") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['reserveID'];
                                        $product_id = $cart_row['roomID'];
                                        $member_id = $cart_row['memberID'];
										$incharge = $cart_row['Incharge'];
    $product_query = mysql_query("select * from tb_rooms where roomID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
	$member_query = mysql_query("select * from tb_member where memberID = '$member_id'")or die(mysql_error());
										$member_row=mysql_fetch_array($member_query);
    $incharge_query = mysql_query("select * from tb_user where user_id = '$incharge'")or die(mysql_error());
										$incharge_row=mysql_fetch_array($incharge_query);
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['transaction_code']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $product_row['name']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname']." ".$member_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['days_no']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['arrival']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['departure']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['totalamount']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['status']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $incharge_row['firstname']." ".$incharge_row['lastname']; ?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['Date']; ?></div></td>
										  	
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->
    
    
    <div id="logs_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-user"></i> Historial de conexión</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Nombre(s)</div></th>
                        <th><div align="center">Apellido</div></th>
                        <th><div align="center">Contacto</div></th>
                        <th><div align="center">Acción</div></th>
                        <th><div align="center">Fecha/Hora</div></th>
                    
                    </tr>
                </thead>
                	
                    <?php
    $user_table = mysql_query("select  * from tb_history limit 10") or die(mysql_error());

                                    while ($user_row = mysql_fetch_array($user_table)) {
                                       	$usid = $user_row['id'];
										$usr_id = $user_row['user_id'];
	$us_table = mysql_query("select  * from tb_user where user_id = '$usr_id'") or die(mysql_error());
                                  $us_row = mysql_fetch_array($us_table);

                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $user_row['id'];?></div></td>
                                          <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $us_row['firstname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $us_row['lastname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $us_row['contact'];?></div></td>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $user_row['action'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $user_row['date'];?></div></td>
                                           
								
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->

    

<div id="members_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-user"></i> Lista de Clientes</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Nombre(s)</div></th>
                        <th><div align="center">Apellido</div></th>
                        <th><div align="center">Email</div></th>
                        <th><div align="center">Teléfono</div></th>
                        <th><div align="center">Username</div></th>
                        <th><div align="center">Password</div></th>
                        <th><div align="center">Direccion</div></th>
                        <th><div align="center">Acción</div></th>
                    </tr>
                </thead>
                	
                    <?php
    $member_table = mysql_query("select  * from tb_member") or die(mysql_error());
                                    $cart_count = mysql_num_rows($member_table);
                                    while ($member_row = mysql_fetch_array($member_table)) {
                                       	$mmid = $member_row['memberID'];
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['memberID'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['firstname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['lastname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['email'];?></div></td>
                                       		<td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['contact_number'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['username'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['password'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $member_row['address'];?></div></td>
                                            <td width="85"><div align="center"><a href="#delete_member<?php echo $mmid; ?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete</a></div></td>
                                            
                                             <!-- Modal delete user -->
<div id="delete_member<?php echo $mmid; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Estas seugro que desas borrar este usuario? <strong><?php echo $member_row['firstname']." ".$member_row['lastname'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_member.php<?php echo '?id=' . $mmid; ?>" ><i class="icon-check"></i>&nbsp;Si</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancelar</button>
  </div>
</div>
                                         <!--modal end --> 
                                            
                                            
                                            
                                            
                                            
                                            
											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->





<div id="users_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-user"></i> Lista de usuarios</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Username</div></th>
                        <th><div align="center">Password</div></th>
                        <th><div align="center">Nombre(s)</div></th>
                        <th><div align="center">Apellido</div></th>
                        <th><div align="center">Teléfono</div></th>
                        <th><div align="center">Acciones</div></th>      
                    </tr>
                </thead>
                	
                    <?php
    $cart_table = mysql_query("select  * from tb_user") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                       		$user_id = $cart_row['user_id'];
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['user_id'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['username'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['password'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['firstname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['lastname'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cart_row['contact'];?></div></td>
                                            <td width="230"><div align="center">
                                            <a href="#adduser" class="btn" role="button" data-toggle="modal"><i class="icon-plus-sign"></i> Add</a>
                                            <a href="#edit_user<?php echo $user_id; ?>" class="btn" role="button" data-toggle="modal"><i class="icon-edit"></i> Edit</a>
                                            <a href="#delete_user<?php echo $user_id; ?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete</a>
                                            </div></td>
                                            
                                            <!-- Modal delete user -->
<div id="delete_user<?php echo $user_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Estas seguro que deseas borrar? <strong><?php echo $cart_row['firstname']." ".$cart_row['lastname'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_user.php<?php echo '?id=' . $user_id; ?>" ><i class="icon-check"></i>&nbsp;Si</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancel</button>
  </div>
</div>
                                         <!--modal end --> 
                                         
                                          <!-- Modal edit user -->

<div id="edit_user<?php echo $user_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Editar usuario</h3>
  </div>
  <div class="modal-body">
    <form action="edit_user.php<?php echo '?id=' . $user_id; ?>" id="align-center" class="form-horizontal" method="post">
    <div class="alert alert-info"><strong>Información</strong></div>
                                <hr>
    
                                <div  class="control-group">
                                   
                                    <div align="center" class="controls">
                                        Nombre(s): <input type="text" name="fn" id="inputEmail" value="<?php echo $cart_row['firstname']?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    
                                    <div align="center" class="controls">
                                        Apellido: <input type="text"  name="ln" value="<?php echo $cart_row['lastname'];?>">
                                    </div>
                                </div>
                                <div class="control-group">
                           
                                    <div align="center" class="controls">
                                        Username: <input type="text" name="un" value="<?php echo $cart_row['username'];?>">
                                    </div>
                                </div>
                                <div class="control-group">
                       
                                    <div align="center" class="controls">
                                       Password: <input type="text" name="p" value="<?php echo $cart_row['password'];?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div align="center" class="controls">
                                      Teléfono: <input type="text" name="cn" value="<?php echo $cart_row['contact'];?>">
                                    </div>
                                </div>
            
                            

                           
  </div>
  <div class="modal-footer">
  	
  	<button type="submit" name="update" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
   
    
  </div>
</div><!--modal -->

 </form>
					
                            
<!--edit user modal end --> 
                                                                  
                                           											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
      

</div><!--container -->

	</div><!--item end -->






<div id="rooms_items" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> Lista de habitaciones</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">No. de habitación</div></th>
                        <th><div align="center">Descripción</div></th>
                        <th><div align="center">Precio</div></th>
                        <th><div align="center">Categoría</div></th>
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Menú</div></th>      
                    </tr>
                </thead>
                	
                    <?php
    $room_table = mysql_query("select  * from tb_rooms order by roomID") or die(mysql_error());
                                    $room_count = mysql_num_rows($room_table);
                                    while ($room_row = mysql_fetch_array($room_table)) {
										$catid = $room_row['category_id'];
										$roomID = $room_row['roomID'];
                                       
	$rm_table = mysql_query ("select * from tb_category where category_id = '$catid'") or die (mysql_error());   
									   	$cat_row = mysql_fetch_array($rm_table);										
										
										
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['roomID'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['name'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['description'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cat_row['precio'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $cat_row['category_name'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $room_row['status'];?></div></td>
                                            <td width="250"><div align="center">
                                            <a href="#update<?php echo$roomID;?>" class="btn" role="button" data-toggle="modal"><i class="icon-plus-sign"></i> Actualizar</a>
                                            <a href="#edit_room<?php echo $roomID;?>" class="btn" role="button" data-toggle="modal"><i class="icon-edit"></i> Editar</a>
                                            <a href="#delete_room<?php echo $roomID;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Borrar</a>
                                            </div></td>
                                            
                                           
                                             <!-- Modal delete room -->
<div id="update<?php echo $roomID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    
   <form action="update_room.php<?php echo '?id=' . $roomID; ?>" method="post">
   
   			<div align="center">Status habitación: <input name="status" type="text" value="" /></div>
    
  </div>
  <div class="modal-footer">
  	<button type="submit" name="updateroom" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
  
  </form>
  
</div>
                                         <!--modal end --> 
                                            
                                            
                                            <!-- Modal delete room -->
<div id="delete_room<?php echo $roomID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Estas seguro que deseas borrar? <strong>Room <?php echo $room_row['name']." ".$cat_row['category_name'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_room.php<?php echo '?id=' . $roomID; ?>" ><i class="icon-check"></i>&nbsp;Si</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancelar</button>
  </div>
</div>
                                         <!--modal end --> 
                                            
                                          <!-- Modal add rooms -->
<div id="edit_room<?php echo $roomID;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Agregar habitación</h3>
  </div>
  <div class="modal-body">
  
  <form action="edit_room.php<?php echo '?id=' . $roomID; ?>" class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Información</strong></div>
                                <hr>
                                                              
                                
                                <div class="control-group">
                                    
                                    <div align="center" class="controls">
                                        No. Habitación: <input required type="text" name="name" id="inputEmail" value="<?php echo $room_row['name'];?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        Descripción: <input type="text"  name="description" value="<?php echo $room_row['description'] ;?>" >
                                    </div>
                                </div>
                                
                            
                                <div class="control-group">
                                    <div style="margin-left:125px;" class="controls">
                                        Categoría: <select type="text" name="category"/>
                                        
                                        <option>--Select Category--</option>

          		<?php
				$rslt = mysql_query("SELECT * FROM tb_category where status='Disponible' ORDER BY category_id  ");
				while($tst = mysql_fetch_array($rslt))
				{
				if (!$rslt)
					{
					die("Error: Data not Found. . ");
					}
				echo "<option value=".$tst['category_id'].">".$tst['category_name']."</option>";
				}
				 ?>
                                  	
                                        </select>
                                                
                   						
                                      
                                    </div>
                                    
                                </div>
                                
  									
                                           

                                <div class="control-group">
                                   <div style="margin-left:250px;" class="controls">
                                        <input type="file" name="image"> 
                                    </div>
                                </div>

       
  
    
  </div>
  <div class="modal-footer">
   <button type="submit" name="roomupdate" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
    
  </div>
  
</div>
                        
    </form>                      
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                           											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
    <!--  <a href="#delete_room<?php echo $roomID;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete All</a>  -->

</div><!--container -->

	</div><!--item end -->



<div id="categoria_item" style="display:none"> <!--item 1 -->

<div style="margin-top:15px;" class="container thumbnail">

            <pre><h4><strong><i class="icon-list"></i> Lista de categorías</strong></h4></pre>
 
 		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th><div align="center">ID</div></th>
                        <th><div align="center">Nombre</div></th>
                        <th><div align="center">No. camas KingSize</div></th>
                        <th><div align="center">No. camas matrimoniales</div></th>
                        <th><div align="center">No. camas individuales</div></th>
                        <th><div align="center">No. adultos</div></th>
                        <th><div align="center">No. niños</div></th>
                        <th><div align="center">Precio</div></th> 
                        <th><div align="center">Status</div></th>
                        <th><div align="center">Menú</div></th>      
                    </tr>
                </thead>
                	
                    <?php
    $categoria_tabla = mysql_query("select  * from tb_category order by category_id") or die(mysql_error());
                                    $categoria_count = mysql_num_rows($categoria_tabla);
                                    while ($categoria_row = mysql_fetch_array($categoria_tabla)) {
                                        $category_id=$categoria_row['category_id'];
                                        ?>
                                        
              		
                <tbody>
                						<tr>
                                            
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['category_id'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['category_name'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['camas_kingsize'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['camas_matrimoniales'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['camas_individuales'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['no_adultos'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['no_ninios'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['precio'];?></div></td>
                                            <td><div style="font-size:11px; color:rgba(153,0,0,1);" align="center"><?php echo $categoria_row['status'];?></div></td>
                                            <td width="250"><div align="center">
                                            <a href="#edit_category<?php echo $category_id;?>" class="btn" role="button" data-toggle="modal"><i class="icon-edit"></i> Editar</a>
                                            <a href="#delete_category<?php echo $category_id;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Borrar</a>
                                            </div></td>
                                            
                                           

                                            
                                            
                                            <!-- Modal delete room -->
<div id="delete_category<?php echo $category_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger"><p>Estas seguro que deseas borrar? <strong>Categoria: <?php echo $categoria_row['category_name'];?></strong></p></div>
  </div>
  <div class="modal-footer">
  	<a class="btn btn-danger" href="delete_category.php<?php echo '?id=' . $category_id; ?>" ><i class="icon-check"></i>&nbsp;Si</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cancelar</button>
  </div>
</div>
                                         <!--modal end --> 
                                            
                                          <!-- Modal add rooms -->
<div id="edit_category<?php echo $category_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Agregar categoria</h3>
  </div>
  <div class="modal-body">
  
  <form action="edit_category.php<?php echo '?id=' . $category_id; ?>" class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Información</strong></div>
                                <hr>
                                                              
                                
                                <div class="control-group">
                                    
                                    <div align="center" class="controls">
                                        Nombre: <input required type="text" name="name" id="name" value="<?php echo $categoria_row['category_name'];?>">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        No. Camas Kingsize: <input type="text"  name="no_camasking" value="<?php echo $categoria_row['camas_kingsize'];?>" >
                                    </div>
                                </div>
                          
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        No. Camas matrimoniales: <input type="text"  name="no_camasmat" value="<?php echo $categoria_row['camas_matrimoniales'];?>" >
                                    </div>
                                </div>
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        No. Camas individuales: <input type="text"  name="no_camasind" value="<?php echo $categoria_row['camas_individuales'];?>" >
                                    </div>
                                </div>
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        No. Adultos: <input type="text"  name="no_adultos" value="<?php echo $categoria_row['no_adultos'];?>" >
                                    </div>
                                </div>
                                <div class="control-group">
                                   
                                    <div style="margin-left:104px;" class="controls">
                                        No. Niños: <input type="text"  name="no_ninios" value="<?php echo $categoria_row['no_ninios'];?>" >
                                    </div>
                                </div>
                            

                                <div class="control-group">
                                    <div style="margin-left:150px;" class="controls">
                                        Precio: <input type="text" name="price" value="<?php echo $categoria_row['precio'];?>">
                                        	<input type="hidden" name="status" value="Available" >
                                    </div>
                                </div>
                            <div class="control-group">
                                    <div  style="margin-left:104px;" class="controls">
                                        Status: 
                                        <select id="status_categoria" name="status_categoria">
                                        <option value="Disponible">Disponible</option>
                                        <option value="Baja">Baja</option>

                                        </select>
                                    </div>
                                </div>

       
    
  </div>
  <div class="modal-footer">
   <button type="submit" name="categoryupdate" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
    
  </div>
  
</div>
                        
    </form>                      
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                           											
                                        </tr>
               </tbody>
               
               <?php }?>
                
        </table>        
    <!--  <a href="#delete_room<?php echo $roomID;?>" class="btn btn-danger" role="button" data-toggle="modal"><i class="icon-trash"></i> Delete All</a>  -->

</div><!--container -->

	</div><!--item end -->




  </div>
  <!-- Carousel nav 
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
  -->
</div>
<script>
$( document ).ready(function() {
    $("#btt_reservaciones").click(function(){ 
       $("#reservaciones_item").css("display","block");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none");

        
     
    });
      $("#btt_checkin").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","block");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none");

        
     
    });
      $("#btt_checkout").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","block");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none"); 
     
    });
      $("#btt_canceladas").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","block");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none"); 
     
    });
      $("#btt_logs").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","block");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none"); 
     
    });
      $("#btt_clientes").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","block");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none"); 
     
    });
      $("#btt_usuarios").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","block");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","none"); 
     
    });
      $("#btt_habitaciones").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","block");
       $("#categoria_item").css("display","none"); 
     
    });
      $("#btt_categorias").click(function(){ 
       $("#reservaciones_item").css("display","none");
       $("#checkin_item").css("display","none");
       $("#checkout_item").css("display","none");
       $("#cancel_item").css("display","none");
       $("#logs_item").css("display","none");
       $("#members_item").css("display","none");
       $("#users_item").css("display","none");
       $("#rooms_items").css("display","none");
       $("#categoria_item").css("display","block"); 
     
    });

});
</script>