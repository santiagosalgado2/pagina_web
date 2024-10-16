<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/changeuser.css");?>"> 
    <title>Document</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    <div class="form-container">
    <form method="post" action="<?php echo base_url("/change_user/change");?>">
        <h1>Cambia tu nombre de usuario</h1>
        <div class="mb-3">
        <span class="textos">Ingrese su nuevo nombre de usuario</span><input type="text" name="username">
        <br><br>
        <input type="submit" value="Aceptar">
        </div>
    </form>
    </div>

</body>
</html>