<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><center>Iniciar sesión</center></h1>
    <form method="post" action="<?php echo base_url("/login");?>">
        <input type="text" placeholder="Nombre de usuario" required name="username">
        <label for="username">Ingrese usuario</label><br>

        <input type="password" placeholder="Contraseña" required name="password">
        <label for="password">Ingrese contraseña</label><br>

        <input type="checkbox" name="remember">
        <label for="remember">Recordarme</label><br><br>

        <input type="submit" value="Ingresar">
    </form>
</body>
</html>