<?php
$session=session();
?>

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

    <h1>Ingrese una nueva contraseña</h1>

    <form action="<?php echo base_url("/change"); ?>" method="post">

        <input type="password" name="password" placeholder="Contraseña">

        <input type="password" name="pw-confirm" placeholder="Confirmar contraseña">

        <input type="submit" value="Cambiar">

    </form>

</body>
</html>