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
    
    <h1>Digite su nueva contraseña</h1>

    <form action="<?php echo base_url("/change");?> " method="post">

        <input type="password" name="password" required>Ingrese nueva contraseña

        <input type="password" name="pw-confirm"required>Confirme su contraseña

        <input type="submit" value="Confirmar">

    </form>
</body>
</html>