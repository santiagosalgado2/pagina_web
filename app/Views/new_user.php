<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Ingrese los datos del usuario que desea crear</h1>

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