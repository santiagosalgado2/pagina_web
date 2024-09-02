<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ingrese el email asociado a su cuenta para restaurar la contraseña</h1>
    <br>
    <form method="post" action="<?php echo base_url();?>">

        <input type="email" name="mail" required>

        <input type="submit" value="Enviar">

    </form>
</body>
</html>