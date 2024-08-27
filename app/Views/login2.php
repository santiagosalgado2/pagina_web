<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url("/login");?>" method="post">
    <input type="text" name="username" required placeholder="nombre de usuario"><br>
    <input type="password" name="password" required placeholder="contraseña"><br>
    <input type="submit" value="aceptar">


</form>
</body>
</html>