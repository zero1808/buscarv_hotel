
<?php include('header.php');?>
<?php include('admin/connect.php');?>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
      }

      .form-signin {
        max-width: 1000px;
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
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
  
    </style>
    
    <script type="text/javascript" src="js/jquery-2.0.2.min.js"></script> 

	<script type="text/javascript" src="js/sagallery.js"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/jquery.easing.js" type="text/javascript"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/script.js" type="text/javascript"></script>
	<script src="gallery/jquery-photo-gallery/jquery-photo-gallery/js/jquery.prettyPhoto.js" type="text/javascript"></script> 
	<link href="gallery/jquery-photo-gallery/jquery-photo-gallery/css/prettyPhoto.css" rel="stylesheet" type="text/css" />


  </head>


  <body>
  
 	
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><img style="margin-top:-5px;" src="media/kingsfields.png" width="30" height="30"> BASIC HOTEL</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php"><i class="icon-home"></i> Inicio</a></li>
              <li class="active"><a href="room.php"><i class="icon-list"></i>Habitaciones</a></li>
              <li><a href="#contact" data-toggle="modal"><i class="icon-envelope"></i>Contacto</a></li>
            </ul>
            <form method="post" class="navbar-form pull-right">
 
              <input class="search-query" type="text" name="username" placeholder="Username" required>
              <input class="search-query" type="password" name="password" placeholder="Password" required>
              
              
              
            <div class="btn-group">
  					<button type="submit" class="btn" name="login"><i class="icon-check"></i>Iniciar Sesion</button>
  					<button class="btn dropdown-toggle" data-toggle="dropdown">
    				<span class="caret"></span>
  					</button>
  				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    				<li><a href="#cancel" data-toggle="modal"><i class="icon-remove"></i> Cancelar Reservacion</a></li>
                    <li class="divider"></li>
                    <li><a href="booking.php"><i class="icon-calendar"></i> Checar Disponibilidad</a></li>
  				</ul>
			</div>
              
            </form>
            
            
         <?php
                                if (isset($_POST['login'])) {
								
								      function clean($str) {
                                        $str = @trim($str);
                                        if (get_magic_quotes_gpc()) {
                                            $str = stripslashes($str);
                                        }
                                        return mysql_real_escape_string($str);
                                    }
                                    $username = clean($_POST['username']);
                                    $password = md5($_POST['password']);

                                    $query = mysql_query("select * from tb_member where username='$username' and password='$password'") or die(mysql_error());
                                    $count = mysql_num_rows($query);
                                    $row = mysql_fetch_array($query);


                                    if ($count > 0) {
                                       session_start();
                                        session_regenerate_id();
                                        $_SESSION['id'] = $row['memberID'];
                                        header('location:member.php');
										session_write_close();
                                    } else {
									   session_write_close();
                                        ?>
                                      <br>
                                      <p>&nbsp;</p>
                                      
                                        	<script type="text/javascript">
                                                alert("Please Check Your Password And Email Address");
                                            </script>
                                            
                                        <?php
                                    }
                                }
                                ?>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
    <!-- Modal -->
<div id="about" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
</div><!--Modal end -->


<!-- Modal -->
<div id="contact" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><img style="margin-top:-5px;" src="media/kingsfields.png" width="30" height="30"> BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
  
      <div align="center">
                	
                <form action="" method="post">
                        
                <div style="margin-left:-110px;">Tu nombre completo: <input name="name" type="text" required placeholder="Nombre Completo"></div>
        		<div style="margin-left:-105px;">Email: <input name="email" type="email" required placeholder="Email"></div>	
                   
                <div style="margin-right:-75px;">Mensaje: <textarea required placeholder="Mensaje" class="span4" name="message" rows="6"></textarea></div>
            		
               	
                
                
                </div>
   
                <?php 
				
					if(isset($_POST['send']))
					{
					
						$name = $_POST['name'];
						$email = $_POST['email'];
						$messege = $_POST['message'];

						mysql_query("insert into tb_message (name,email,message) values ('$name','$email','$messege')") or die(mysql_error());
						
					?> 	
						
											<script type="text/javascript">
                                                alert("You are Succesfully Sent Your Message");
                                                window.location= "contact.php";
                                            </script>
				
				
					<?php }?>
						
  
  </div>
  <div class="modal-footer">
  <button class="btn btn-primary" name="send" type="submit"><i class="icon-envelope"></i> Enviar</button>             
  <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
  </form>
  
</div><!--Modal end -->

<!-- Modal -->
<div id="cancel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="cancel.php" method="post">
  <div class="modal-header">  	
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Por favor, Ingresa tu codigo de Cancelacion</h3>
  </div>
  <div class="modal-body">
    <div align="center"><input name="confirmation" type="text" placeholder="Confirmation Code" required></div>
    <div align="center"><input name="roomid" type="text" placeholder="Room ID" required></div>                
  </div>
  <div class="modal-footer">
  	<button type="submit" class="btn btn-info"><i class=" icon-arrow-right"></i> Proceder</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
  </form>
</div><!--Modal end -->



    <div class="container">

		<hr>
        				
      	
                                            
        	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">                      
                            <thead class=" hero-unit">
                                <tr>
                                
                                	<th width="60"><div align="center" style="margin-top:10px;">Foto</div></th>
                                    <th width="20"><div align="center" style="margin-top:10px;">No.</div></th>
                                    <th width="100"><div align="center" style="font-size:16px">Precio</div></th>
                                    <th width="50"><div align="center" style="font-size:18px;">Adultos</div><div style="font-size:10px;" align="center"> Age: 8+</div></th>
                                    <th width="50"><div align="center" style="font-size:18px;">Niños</div><div style="font-size:10px;" align="center"> Age: 0-7</div></th>
                                    <th width="50"><div align="center" style="font-size:18px;">No. Camas</div><div style="font-size:10px;" align="center"> KingSize</div></th>
                                    <th width="50"><div align="center" style="font-size:18px;">No.Camas</div><div style="font-size:10px;" align="center">Matrimoniales</div></th>
                                    <th width="50"><div align="center" style="font-size:18px;">No.Camas</div><div style="font-size:10px;" align="center">Individuales</div></th>
                                    <th width="180"><div align="center" style="font-size:16px">Categoría</div></th>
                                    <th><div align="center" style="font-size:16px">Status</div></th>
                            
                          
                                </tr>
                            </thead>
                            <tbody>
                              
                                      <?php
									  
                                    $query = mysql_query("select * from tb_rooms order by category_id ASC ") or die(mysql_error());
                                    while ($row = mysql_fetch_array($query)) {
                                        $id = $row['roomID'];
										$catid = $row['category_id'];
										
										$cat = mysql_query("select * from tb_category where category_id = '$catid'") or die(mysql_error());
										while ($cat_row = mysql_fetch_array($cat)){
									   
										
                                        ?>
                                 
                                    

                                        <tr>
                                        	<td width="60"><a href="admin/upload/without window and without garage room.jpg" class="image-zoom" rel="prettyPhoto[gallery]" title="Without window and without garage room"><img style="margin-top:30px;" class="img-rounded thumbnail" src="admin/<?php echo $row['location']?>" height="50" width="50"></a></td>
                                            
                                            <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{echo $row['name'];;}?></div></td>
                                             
                                    		<td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{
                                            echo "$".$cat_row['precio']." MXN";
											
											}?></div></td>
                                            <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{
										
                                                echo $cat_row['no_adultos'];
                                            
												
										
											
											}?></div></td> 
                                            <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{
										
                                                echo $cat_row['no_ninios'];
                                            
												
										
											
											}?></div></td> 
                                       
                                       
                                       <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{
                                            echo $cat_row['camas_kingsize'];
                                            
											}?></div></td>  
                                            
                                        <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{
                                            echo $cat_row['camas_matrimoniales'];
                                            
											}?></div></td>  
                                            <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{
                                            echo $cat_row['camas_individuales'];
                                            
											}?></div></td>  
                                            
                                            
                                               
                                            
                                            <td><div align="center" style="margin-top:20px"><?php if($row['status']=='Reserved'){ echo '-&deg;-';}else{echo $cat_row['category_name'];}?></div></td> 
 											
                                                
                                            
                                            <td><div align="center" style="margin-top:20px"><strong>
											<?php if ($row['status']=='Available'){
												
												$disabled = "";
												
												echo 'Available';}
																								
													elseif($row['status']=='Reserved'){
														
															echo 'Reserved';
													
													
															$disabled = 'disabled="disabled"';
														
														}
														
													else{
													
													echo $row['status'];
													
													
													$disabled = 'disabled="disabled"';
													
													}
													
												
												?></strong></div></td>						
                                           
             
               
											
                                  </tr>
                                  
                                  
                                                                     
                        		<?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
 
           
           
                        <hr>
 

    </div> <!-- /container -->
    
    
   <div class="container">
   
      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Promos</h2>
          <p>Prepayment is required to confirm your reservation and this is non-refundable.

No additional charge if you cancel 24 hour(s) or more before your arrival date. For cancellations made less than 24 hour(s) before the arrival date, the cost of the first night will be apply. </p>
          <p><a class="btn" href="#"><i class="icon-gift"></i> View details</a></p>
        </div>
        <div class="span4">
          <h2>About Us</h2>
          <p>Prepayment is required to confirm your reservation and this is non-refundable.

No additional charge if you cancel 24 hour(s) or more before your arrival date. For cancellations made less than 24 hour(s) before the arrival date, the cost of the first night will be apply. </p>
          <p><a class="btn" href="#about" data-toggle="modal"><i class="icon-book"></i> About</a></p>
       </div>
        <div class="span4">
          <h2>Contact Us</h2>
          <p>Prepayment is required to confirm your reservation and this is non-refundable.

No additional charge if you cancel 24 hour(s) or more before your arrival date. For cancellations made less than 24 hour(s) before the arrival date, the cost of the first night will be apply.</p>
          <p><a class="btn" href="#contact" data-toggle="modal"><i class="icon-envelope"></i> Contact</a></p>
        </div>
		
		</div><!--container end -->
        
      <hr>

      <footer>
        <p>&copy; BASIC HOTEL 2016 </p>
      </footer>

    <!-- Le javascript
    ================================================== -->



  </body>
  
  
</html>
