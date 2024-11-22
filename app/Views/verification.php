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

    <title>Verificar usuario dentro del sitio</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>


    <div class="form-container">
        <h1>Digite el codigo enviado a su direccion email</h1>
        <form action="<?php echo base_url("/verification");?>" method="post">
        <div class="mb-3">
            <span class="textos">Código:</span><input type="text" name="code" required>

            <input type="submit" value="Enviar">
            </div>
        </form>

        </div>

</body>
</html>