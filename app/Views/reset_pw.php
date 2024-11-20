<?php
$session=session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/form.css") . '?v=' . time(); ?>">
    <title>Reestablecer contraseña</title>
</head>
<body>
    
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>


    <div class="form-container">
    <h1>Reestablecer contraseña</h1>
    <div class="mb-3">
    <form action="<?php echo base_url("/change"); ?>" method="post">

        <span class="textos">Ingresa tu nueva contraseña</span><input type="password" name="password" required>

        <span class="textos">Confirma tu nueva contraseña</span><input type="password" name="pw-confirm" required>

        <input type="submit" value="Cambiar">
    </div>
    </form>
    </div>

</body>
</html>