<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("/css/newuserstyle.css");?>">
    <title>Creación de usuario</title>
</head>
<body>
    
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    

    <div class="form-container">
    <h1>Ingrese los datos del usuario que desea crear</h1>
    <form method="post" action="<?php echo base_url("/create_user") ;?>">
    
    <div class="mb-3">

    <span class="textos">Nombre de usuario</span><input type="text" name="username" required><br><br>
    
    <span class="textos">Dirección e-mail</span><input type="email" name="email" required><br><br>


    <input type="submit" value="Crear usuario">

    </div>
    </form>

    </div>


</body>
</html>