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

    <h1 style="color: black;">Ingrese los datos del usuario que desea crear</h1>

    <form method="post" action="<?php echo base_url("/create_user") ;?>">

    <label for="username">Nombre de Usuario:</label>
    <input type="text" name="username" required><br><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" required><br><br>

    <br><br>
    <input type="submit" value="Crear usuario">

    </form>

</body>
</html>