<?php include('session.php'); ?>
<?php include('core.php'); ?>		
<?php include('connect.php');?>
<?php include('hover.php');?>
        <form class="navbar-form pull-right"> 
<div class="input-prepend">
  				<div class="btn-group">          
    <a class="btn" href="#logout" data-toggle="modal"><i class="icon-off"></i> Cerrar sesión</a>
    <a class="btn" href="print.php"><i class="icon-print"></i> Reportes</a>          
 	<button class="btn dropdown-toggle" data-toggle="dropdown"> Menú <span class="caret"></span></button>
    		<ul class="dropdown-menu">
    				<li><a href="#adduser" data-toggle="modal"><i class="icon-plus-sign"></i> Agregar usuarios</a></li>
                    <li><a href="#addroom" data-toggle="modal"><i class="icon-plus-sign"></i> Agregar habitación</a></li>
                    <li><a href="#addcategory" data-toggle="modal"><i class="icon-plus-sign"></i> Agregar categoría</a></li>
                <li><a href="#addproduct" data-toggle="modal"><i class="icon-plus-sign"></i>Agregar producto</a></li>
                    <!--<li><a href="addtransaction.php"><i class="icon-plus-sign"></i> Transsación</a></li>-->
                    <li><a href="#adddiscount" data-toggle="modal"><i class="icon-plus-sign"></i> Agregar descuento</a></li>   
    		</ul>
  	</div>
  			<input class="span2" id="prependedDropdownButton" type="text">     
</div>
		</form>
<?php include('title.php');?>
<?php include('body.php');?>
<?php include('modals.php');?>
<?php include('script.php');?>