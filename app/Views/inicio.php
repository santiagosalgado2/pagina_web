<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
</head>
<body>
    <h1>Pagina principal</h1>
    <?php
    $session = session();
    ?>
    <h2>Bienvenido <?php echo $session->get("username");?></h2>

    <?php 

    if($session->get("tipo")==1):?>
        <a href="<?php echo base_url("/new_user");?>">Crear un nuevo usuario</a>
    <?php endif;
    ?> 
    <a href="<?php echo base_url("/logout");?>"> Cerrar sesion </a>
</body>
</html>