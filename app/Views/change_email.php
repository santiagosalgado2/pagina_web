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

    <form method="post" action="<?php echo base_url("/change_email/change");?>">

    <input type="mail" name="mail">Ingrese una nueva dirección e-mail
    <br><br>
    <input type="submit" value="Aceptar">

    </form>

</body>
</html>