


                        <!-- Modal add rooms -->
<div id="addroom" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Agregar habitación</h3>
  </div>
  <div class="modal-body">
  
  <form class="form-horizontal" method="post"  enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Información</strong></div>
                                <hr>
                                                              
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">No. de habitación</label>
                                    <div class="controls">
                                        <input required="required" type="text" name="name" id="inputEmail">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Descripción:</label>
                                    <div class="controls">
                                        <input type="text"  name="description" >
                                    </div>
                                </div>
                                
                            
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Categoría:</label>
                                    <div class="controls">
                                        <select type="text" name="category">
                                  		
                                        <option>--Seleccione Categoría--</option>
          		<?php
				$result = mysql_query("SELECT * FROM tb_category ORDER BY category_id");
				while($test = mysql_fetch_array($result))
				{
				if (!$result)
					{
					die("Error: Data not Found. . ");
					}
				echo "<option value=".$test['category_id'].">".$test['category_name']."</option>";
				}
					mysql_close($conn);
				 ?>
                                  	
                                        </select>
                                                
                   						
                                      
                                    </div>
                                    
                                </div>
                                
  									
                             

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Precio:</label>
                                    <div class="controls">
                                        <input type="text" name="price">
                                        <input type="hidden" name="status" value="Available" >
                                    </div>
                                </div>

                               

                                <div class="control-group">
                                    <label class="control-label" for="input01">Imagen:</label>
                                    <div class="controls">
                                        <input type="file" name="image"> 
                                    </div>
                                </div>

       
  
    
  </div>
  <div class="modal-footer">
   <button type="submit" name="roomsave" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
    
  </div>
  
</div>
                        
    </form>                   
              <?php
                            if (isset($_POST['roomsave'])) {

                                $name = $_POST['name'];
                                $description = $_POST['description'];
                                $category = $_POST['category'];
                                
                                $price = $_POST['price'];
                         
								$status = $_POST['status'];

                                //image
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);
//
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $location = "upload/" . $_FILES["image"]["name"];


                                mysql_query("insert into tb_rooms (name,description,category_id,price,location,status)
                            	values ('$name','$description','$category','$price','$location','$status')
                                ") or die(mysql_error());

                                header('location:progressbar.php');
                            }
                            ?>           
       



<!--add room modal end -->



<!--add category modal -->
<div id="addcategory" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Agregar categoria</h3>
  </div>
  <div class="modal-body">
    <form id="align-center" class="form-horizontal" method="post">
    <div class="alert alert-info"><strong>Información</strong></div>
                                <hr>
                                    
                                <div class="control-group">
                                    <label class="control-label" for="nombre_categoria">Nombre de la categoría:</label>
                                    <div class="controls">
                            <input name="nombre_categoria" type="text" required="required"  id="nombre_categoria"   >
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" for="camas_king">Numero de camas KingSize:</label>
                                    <div class="controls">
                            <input name="camas_king" type="text" required="required"  id="camas_king">
                                    </div>
                                </div>
                                  <div class="control-group">
                                <label class="control-label" for="camas_mat">Numero de camas Matrimoniales:</label>
                                    <div class="controls">
                            <input name="camas_mat" type="text" required="required"  id="camas_mat">
                                    </div>
                                </div>                         
                                  <div class="control-group">
                                <label class="control-label" for="camas_ind">Numero de camas Individuales:</label>
                                    <div class="controls">
                            <input name="camas_ind" type="text" required="required"  id="camas_ind">
                                    </div>
                                </div>                         
                                  <div class="control-group">
                                <label class="control-label" for="no_adultos">Numero de adultos:</label>
                                    <div class="controls">
                            <input name="no_adultos" type="text" required="required"  id="no_adultos">
                                    </div>
                                </div>                         
                                  <div class="control-group">
                                <label class="control-label" for="no_ninios">Numero de niños:</label>
                                    <div class="controls">
                            <input name="no_ninios" type="text" required="required"  id="no_ninios">
                                    </div>
                                </div>                                                                                 

                                
                            

                           
  </div>
  <div class="modal-footer">
  	
  	<button type="submit" name="save_category" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
   
    
  </div>
</div><!--modal -->

 </form>
 


	 					<?php
                            if (isset($_POST['save_category'])) {

                                $nombre_categoria = $_POST['nombre_categoria'];
                                $no_camas_king=$_POST['camas_king'];
                                $no_camas_mat=$_POST['camas_mat'];
                                $no_camas_ind=$_POST['camas_ind'];
                                $no_adultos=$_POST['no_adultos'];
                                $no_ninios=$_POST['no_ninios'];
                                mysql_query("insert into tb_category (category_name,camas_kingsize,camas_matrimoniales,camas_individuales,no_adultos,no_ninios) values('$nombre_categoria','$no_camas_king','$no_camas_mat','$no_camas_ind','$no_adultos','$no_ninios')") or die(mysql_error());
                                header('location:progressbar.php');
                            }
							
                            ?>
							
                            
<!--add user modal end -->     
                       


<!--adduser modal -->
<div id="adduser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Agregar usuario</h3>
  </div>
  <div class="modal-body">
    <form id="align-center" class="form-horizontal" method="post">
    <div class="alert alert-info"><strong>Información</strong></div>
                                <hr>
    
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Nombre(s):</label>
                                    <div class="controls">
                                        <input name="fn" type="text" required="required" id="inputEmail"   >
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Apellido Paterno:</label>
                                    <div class="controls">
                                        <input type="text" required="required"  name="ln">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Nombre de usuario:</label>
                                    <div class="controls">
                                        <input type="text" required="required" name="un">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Contraseña:</label>
                                    <div class="controls">
                                        <input type="password" required="required" name="p">
                                    </div>
                                </div>

								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Teléfono:</label>
                                    <div class="controls">
                                        <input name="cn" type="text" required="required" max="13">
                                    </div>
                                </div>

                                
                            

                           
  </div>
  <div class="modal-footer">
  	
  	<button type="submit" name="saveu" class="btn btn-success"><i class="icon-check"></i> Guardar</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
   
    
  </div>
</div><!--modal -->

 </form>
 


	 					<?php
                            if (isset($_POST['saveu'])) {

                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $un = $_POST['un'];
                                $p = md5($_POST['p']);
								$cn = $_POST['cn'];

                                mysql_query("insert into tb_user (firstname,lastname,username,password,contact) values('$fn','$ln','$un','$p',$cn)") or die(mysql_error());
                                header('location:progressbar.php');
                            }
							
                            ?>
							
                            
<!--add user modal end -->     
                       

<!--Modal Product --> 
<div id="addproduct" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">Agregar producto <strong>Información</strong></div>
                 
                 	<form method="post">
               
                	<div align="center">Nombre del producto: <input name="pproduct" type="text" value="" />
                        </div>
                 
                <div style="margin-left: 90px" align="center">Precio: <input name="pprice" type="text" value="" /></div>

                     
  </div>
  	 
  <div class="modal-footer">
  		<button class="btn btn-info" type="submit" name="product"><i class="icon-check"></i> Guardar</button>
      	<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
  
  					</form>
</div>             
                            
<!--Product end --> 

	<?php 
	
		if(isset($_POST['product'])){
	
		$pproduct = $_POST['pproduct'];
		$pprice	= $_POST['pprice'];
		
		mysql_query("insert into tb_products (name,price) values('$pproduct','$pprice')") or die(mysql_error());
		header('location:admin.php');
	
	
		}
		
	?>

<!--Modal Product --> 
<div id="adddiscount" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">Agregar descuento <strong>Información</strong></div>
                 
                 	<form method="post">
                 
                	<div style="margin-left: 10px" align="center">Tipo de descuento: <input name="ndiscount" type="text" value="" /></div>
                    <div align="center">Monto de descuento: <input name="price" type="text" value="" /></div>
                     
  </div>
  	 
  <div class="modal-footer">
  		<button class="btn btn-info" type="submit" name="discount"><i class="icon-check"></i> Guardar</button>
      	<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
  </div>
  
  					</form>
</div>             
                            
<!--Product end --> 

	<?php 
	
		if(isset($_POST['discount'])){
	
		$ndiscount = $_POST['ndiscount'];
		$price	= $_POST['price'];
		
		mysql_query("insert into tb_discount (name,price) values('$ndiscount','$price')") or die(mysql_error());
		header('location:admin.php');
	
	
		}
		
	?>
    

<!--Modal Log-out --> 
<div id="logout" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  </div>
  <div class="modal-body">
  <div class="alert alert-info">¿Estas seguro que quieres desconectarte?<strong> Cerrar sesión</strong>?</div>
  </div>
  <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Cerrar</button>
      <a href="logout.php" class="btn btn-info"><i class="icon-off"></i> Cerrar sesión</a>
  </div>
</div>             
                            
<!--Logout end -->                           
                            

