<?php include('header.php')?>
<?php include('admin/connect.php');?>

  <body>


     <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><img style="margin-top:-5px;" src="media/kingsfields.png" width="30" height="30"> Kingsfield Express inn</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#"><i class="icon-home"></i> Home</a></li>
              <li><a href="room.php"><i class="icon-list"></i> Rooms</a></li>
              <li><a href="#contact" data-toggle="modal"><i class="icon-envelope"></i> Contact</a></li>
            </ul>
            <form method="post" class="navbar-form pull-right">
 
              <input class="search-query" type="text" name="username" placeholder="Username" required>
              <input class="search-query" type="password" name="password" placeholder="Password" required>
              
              
              
            <div class="btn-group">
  					<button type="submit" class="btn" name="login"><i class="icon-check"></i> Sign in</button>
  					<button class="btn dropdown-toggle" data-toggle="dropdown">
    				<span class="caret"></span>
  					</button>
  				<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
    				<li><a href="#cancel" data-toggle="modal"><i class="icon-remove"></i> Cancel Reservation</a></li>
                    <li class="divider"></li>
                    <li><a href="booking.php"><i class="icon-calendar"></i> Check Availability</a></li>
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
    <h3 id="myModalLabel">Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
</div><!--Modal end -->


<!-- Modal -->
<div id="contact" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><img style="margin-top:-5px;" src="media/kingsfields.png" width="30" height="30"> Kingsfields Express Inn</h3>
  </div>
  <div class="modal-body">
  
      <div align="center">
                	
                <form action="" method="post">
                        
                <div style="margin-left:-110px;">Your Full Name: <input name="name" type="text" required placeholder="Full name"></div>
        		<div style="margin-left:-105px;">Email Address: <input name="email" type="email" required placeholder="Email"></div>	
                   
                <div style="margin-right:-75px;">Message: <textarea required placeholder="message" class="span4" name="message" rows="6"></textarea></div>
            		
               	
                
                
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
  <button class="btn btn-primary" name="send" type="submit"><i class="icon-envelope"></i> Send</button>             
  <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
  </form>
  
</div><!--Modal end -->

<!-- Modal -->
<div id="cancel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="cancel.php" method="post">
  <div class="modal-header">  	
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Please Enter Your Cancelation Code</h3>
  </div>
  <div class="modal-body">
    <div align="center"><input name="confirmation" type="text" placeholder="Confirmation Code" required></div>
    <div align="center"><input name="balance" type="text" placeholder="Your Balance" required></div>                
  </div>
  <div class="modal-footer">
  	<button type="submit" class="btn btn-info"><i class=" icon-arrow-right"></i> Proceed</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
  </div>
  </form>
</div><!--Modal end -->




<div style="margin-bottom:10px;" class="container thumbnail">
	


    <!-- Carousel
    ================================================== -->
    <div style="margin-bottom:0px;" id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="admin/slider/IMG_5561.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>WELCOME TO KINGSFIELD</h1>
              <p class="lead" align-justify>"Welcome to KINGSFIELD Express Inn!
Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms.
Enjoy an intimate and peaceful night’s rest in the city!".</p>
              <a class="btn btn-primary btn-large" href="booking.php"><i class="icon-calendar"></i> Book Online Here</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="admin/slider/IMG_5563.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>WELCOME TO KINGSFIELD</h1>
              <p class="lead" align-justify>"Welcome to KINGSFIELD Express Inn!
Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms.
Enjoy an intimate and peaceful night’s rest in the city!".</p>
              <a class="btn btn-primary btn-large" href="booking.php"><i class="icon-calendar"></i> Book Online Here</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="admin/slider/IMG_5565.jpg" alt="">
          <div class="container">
             <div class="carousel-caption">
              <h1>WELCOME TO KINGSFIELD</h1>
              <p class="lead" align-justify>"Welcome to KINGSFIELD Express Inn!
Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms.
Enjoy an intimate and peaceful night’s rest in the city!".</p>
              <a class="btn btn-primary btn-large" href="booking.php"><i class="icon-calendar"></i> Book Online Here</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="admin/slider/IMG_5566.jpg" alt="">
          <div class="container">
             <div class="carousel-caption">
              <h1>WELCOME TO KINGSFIELD</h1>
              <p class="lead" align-justify>"Welcome to KINGSFIELD Express Inn!
Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms.
Enjoy an intimate and peaceful night’s rest in the city!".</p>
              <a class="btn btn-primary btn-large" href="booking.php"><i class="icon-calendar"></i> Book Online Here</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="admin/slider/IMG_5560.jpg" alt="">
          <div class="container">
             <div class="carousel-caption">
              <h1>WELCOME TO KINGSFIELD</h1>
              <p class="lead" align-justify>"Welcome to KINGSFIELD Express Inn!
Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms.
Enjoy an intimate and peaceful night’s rest in the city!".</p>
              <a class="btn btn-primary btn-large" href="booking.php"><i class="icon-calendar"></i> Book Online Here</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="admin/slider/IMG_5564.jpg" alt="">
          <div class="container">
             <div class="carousel-caption">
              <h1>WELCOME TO KINGSFIELD</h1>
              <p class="lead" align-justify>"Welcome to KINGSFIELD Express Inn!
Kingsfield Express Inn is located at Circumferential Road, Tagum City, we take a warm and friendly approach to hospitality, whether you are travelling for business or a vacation you will love an exceptional location, good value, clean and comfortable rooms.
Enjoy an intimate and peaceful night’s rest in the city!".</p>
              <a class="btn btn-primary btn-large" href="booking.php"><i class="icon-calendar"></i> Book Online Here</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
    
    
</div>



	
        
      <hr>

      <footer>
        <center>&copy; Kingsfield Express Inn, All right reserved 2014</center>
      </footer>

    <!-- Le javascript
    ================================================== -->
   
  </body>
</html>