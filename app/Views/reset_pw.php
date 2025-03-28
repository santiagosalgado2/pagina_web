<?php
$session=session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">

    <link rel="stylesheet" href="<?php echo base_url("/css/form.css") . '?v=' . time(); ?>">
    <title>Reestablecer contraseña</title>
</head>
<body>

<div class="row">
<div class="col-md-12">
    
    <form action="<?php echo base_url("/change"); ?>" method="post">
    <h1>Reestablecer contraseña</h1>

    <fieldset>
    <label for="password">Ingrese nueva contraseña</label>
    <input type="password" name="password" required id="password">
    </fieldset>

    <fieldset>
    <label for="pw-confirm">Confirme su contraseña</label>
    <input type="password" name="pw-confirm" required id="pw-confirm">
    </fieldset>
    <button type="submit">Reestablecer</button>

    </form>
    </div>
</div>

</body>
</html>