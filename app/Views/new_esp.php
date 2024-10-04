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
    
    <form method="post" action="<?php echo base_url("/new_esp/insert"); ?>">

        <input type="text" name="code">Ingrese el código ubicado en la caja de la Esp32
        <br><br>
        <input type="text" name="location">Ingrese la ubicacion donde estara el dispositivo

        <br><br><input type="submit" value="Enviar">

    </form>
</body>
</html>