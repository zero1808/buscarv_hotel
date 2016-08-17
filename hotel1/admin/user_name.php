<?php
$username_query = mysql_query("select * from tb_user where user_id=$session_id") or die(mysql_error());
$user_row = mysql_fetch_array($username_query);
?>  
<div class="pull-right-date">
    <?php
    setlocale(LC_TIME, 'es_ES.UTF-8');

    $Today = date('m/d/y');
    $new = date('d / m / Y', strtotime($Today));
    echo "Fecha: ".$new;
    ?>
</div>
<div class="username">Bienvenido:&nbsp;&nbsp;<?php echo $user_row['firstname'] . " " . $user_row['lastname']; ?></div>

