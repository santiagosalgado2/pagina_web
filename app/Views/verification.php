<?php
    $session=session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Digite el codigo enviado a su direccion email</h1>

    <form action="<?php echo base_url("/verification");?>" method="post">

        <input type="text" name="code" required>

        <input type="submit" value="Enviar">

    </form>
</body>
</html>