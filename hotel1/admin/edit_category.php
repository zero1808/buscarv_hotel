<?php
include('connect.php');

$get_id=$_GET['id'];

                            if (isset($_POST['categoryupdate'])) {

                                $name = $_POST['name'];
                                $no_camasking = $_POST['no_camasking'];
                                $no_camasmat = $_POST['no_camasmat'];
                                $no_camasind = $_POST['no_camasind'];
                                $no_adultos = $_POST['no_adultos'];
                                $no_ninios = $_POST['no_ninios'];
                               
                                $precio= $_POST['price'];
                                $status_categoria=$_POST['status_categoria'];

                            	mysql_query("update tb_category set category_name='$name',camas_kingsize='$no_camasking',camas_matrimoniales='$no_camasmat',camas_individuales='$no_camasind',no_adultos='$no_adultos',no_ninios='$no_ninios',precio='$precio',status='$status_categoria' where category_id='$get_id'") or die(mysql_query());
                                header('location:progressbar.php');
                            }
                            ?>