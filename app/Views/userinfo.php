<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css");?>">
    <title>Document</title>
</head>
<body>
    
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    
    <center>
    <h1>Informacion de tu usuario</h1>

        <ul>
            <li><b>Nombre de usuario: </b><?php echo $data[0]["nombre_usuario"]; ?>   <a href="<?php echo base_url("/change_user"); ?>"><button>Cambiar</button></a></li>
            <li><b>Contraseña: </b>********  <a href=<?php echo base_url("/generate/recuperar_contrasena"); ?>><button>Reestablecer</button></a></li>
            <li><b>Dirección de e-mail: </b><?php echo $data[0]["email"]; ?>   <a href="<?php echo base_url("/change_email"); ?>"><button>Cambiar</button></a></li>
            <li><b>Fecha de creación: </b><?php echo $data[0]["fecha_creacion"]; ?></li>
            <?php if(isset($admin)):?>
            <li><b>Tipo de usuario: </b>Profesor</li>
            <li><b>Administrador: </b><?php echo $admin[0]["nombre_usuario"]; ?></li>
            <?php else:?>
            <li><b>Tipo de usuario: </b>Administrador</li>
            <?php endif;?>
            <a href="<?php echo base_url("/");?>"><button>Volver</button></a>


        </ul>
        </center>
</body>
</html>