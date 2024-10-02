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

    <h1 style="color: black;">Ingrese el email asociado a su cuenta para restaurar la contraseña</h1>
    <br>
    <form method="post" action="<?php echo base_url("/generate2/recuperar_contrasena");?>">

        <input type="email" name="mail" required>

        <input type="submit" value="Enviar">

    </form>
    <br><a href="<?php echo base_url("/");?>"><button>Volver</button></a>
</body>
</html>