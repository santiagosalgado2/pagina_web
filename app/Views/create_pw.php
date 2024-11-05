<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/createpwstyle.css");?>"> 
    <title>Cambio de contraseña</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    
    
    <div class="form-container">
    <form action="<?php echo base_url("/change");?> " method="post">
    <h1>Digite su nueva contraseña</h1>
        <div class="mb-3">

        <span class="textos">Ingrese nueva contraseña</span><input type="password" name="password" required>

        <span class="textos">Confirme su contraseña</span><input type="password" name="pw-confirm"required>

        <input type="submit" value="Confirmar">

        </div>

    </form>
    </div>


</body>
</html>