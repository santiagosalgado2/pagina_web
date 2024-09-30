<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?php echo base_url("/change_user/change");?>">

        <input type="text" name="username">Ingrese su nuevo nombre de usuario
        <br><br>
        <input type="submit" value="Aceptar">

    </form>
</body>
</html>