<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/form.css") . '?v=' . time(); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
 
    <title>Cambio de contraseña</title>
</head>
<body>
    
    
<div class="row">
<div class="col-md-12">
<form action="<?php echo base_url("/change");?> " method="post">
    <h1>Digite su nueva contraseña</h1>


    <fieldset>
    <label for="password">Ingrese nueva contraseña</label>
    <input type="password" name="password" required id="password">
    </fieldset>

    <fieldset>
    <label for="pw-confirm">Confirme su contraseña</label>
    <input type="password" name="pw-confirm" required id="pw-confirm">
    </fieldset>

    </form>
    </div>
</div>


</body>
</html>