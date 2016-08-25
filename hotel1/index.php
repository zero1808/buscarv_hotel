<<<<<<< HEAD
<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
=======
<?php include('header.php')?>
<?php include('admin/connect.php');?>
>>>>>>> d59c23719b5d1f223c034231b42ff63d532f2df5
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
              <li class="active"><a href="#"><i class="icon-home"></i> Inicio</a></li>
              <li><a href="room.php"><i class="icon-list"></i> Habitación</a></li>
              <li><a href="#contact" data-toggle="modal"><i class="icon-envelope"></i> Contacto</a></li>
            </ul>
            <form method="post" class="navbar-form pull-right">
              <input class="search-query" type="text" name="username" placeholder="Username" required>
              <input class="search-query" type="password" name="password" placeholder="Password" required>
<<<<<<< HEAD
              
            <div class="btn-group">
  					<button type="submit" class="btn" name="login"><i class="icon-check"></i> Sign in</button>


=======
            <div class="btn-group">
  					<button type="submit" class="btn" name="login"><i class="icon-check"></i> Iniciar</button>
>>>>>>> d59c23719b5d1f223c034231b42ff63d532f2df5
  					<button class="btn dropdown-toggle" data-toggle="dropdown">
    				<span class="caret"></span>
  					</button>
  				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    				<li><a href="#cancel" data-toggle="modal"><i class="icon-remove"></i> Cancelar reservación</a></li>
                    <li class="divider"></li>
                    <li><a href="booking.php"><i class="icon-calendar"></i> Revisar disponibilidad</a></li>
  				</ul>
			</div>
            </form>
<<<<<<< HEAD
         <?php
                                if (isset($_POST['login'])) {
								                   function clean($str) {
=======
         <?php if (isset($_POST['login'])) {
								      function clean($str) {
>>>>>>> d59c23719b5d1f223c034231b42ff63d532f2df5
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
<<<<<<< HEAD
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
                                                alert("Por favor checa tu usuario y tu contraseña");
                                          </script>
                                        <?php
                                    }
                                }
                                ?>
            
          </div><!--/.nav-collapse -->
=======
                                       $_SESSION['id'] = $row['memberID'];
                                        header('location: member.php');//session_write_close();    
                                    } else {// session_write_close();?>
                                      <br>
                                      <p>&nbsp;</p>
                                        	<script type="text/javascript">
                                                alert("Usuario o contraseña incorrectos");
                                            </script>
                                        <?php }
                                }?></div><!--/.nav-collapse -->
>>>>>>> d59c23719b5d1f223c034231b42ff63d532f2df5
        </div>
      </div>
    </div><!-- Modal -->
<div id="about" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div><!--Modal end --><!-- Modal -->
<div id="contact" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><img style="margin-top:-5px;" src="media/kingsfields.png" width="30" height="30"> BASIC HOTEL</h3>
  </div>
  <div class="modal-body">
      <div align="center">	
                <form action="" method="post">   
                <div style="margin-left:-110px;">Your Full Name: <input name="name" type="text" required placeholder="Full name"></div>
        		<div style="margin-left:-105px;">Email Address: <input name="email" type="email" required placeholder="Email"></div>	
                <div style="margin-right:-75px;">Message: <textarea required placeholder="message" class="span4" name="message" rows="6"></textarea></div>
                </div>
                <?php if(isset($_POST['send']))
					{
						$name = $_POST['name'];
						$email = $_POST['email'];
						$messege = $_POST['message'];
						mysql_query("insert into tb_message (name,email,message) values ('$name','$email','$messege')") or die(mysql_error());?> 	
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
</div><!--Modal end --><!-- Modal -->
<div id="cancel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="cancel.php" method="post">
  <div class="modal-header">  	
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Por favor ingresa tu codigo para cancelación</h3>
  </div>
  <div class="modal-body">
    <div align="center"><input name="confirmation" type="text" placeholder="Confirmation Code" required></div>
    <div align="center"><input name="balance" type="text" placeholder="Your Balance" required></div>                
  </div>
  <div class="modal-footer">
  	<button type="submit" class="btn btn-info"><i class=" icon-arrow-right"></i> Proceder</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
  </form>
</div><!--Modal end -->
 
      <hr>
      <footer>
        <center>&copy; BASIC HOTEL 2016</center>
      </footer><!-- Le javascript ================================================== -->
  </body>
</html>