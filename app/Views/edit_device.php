<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/form.css") . '?v=' . time(); ?>">
    <title>Editar dispositivo</title>
</head>
<body>

<div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    <div class="form-container">
        <h1>Editar dispositivo seleccionado</h1>
    <form action="<?php echo base_url("/edit_device/update");?>" method="post">
    <div class="mb-3">
        <input type="text" name="name" value="<?php echo $device[0]['nombre'];?>">
        <input type="hidden" name="id" value="<?php echo $device[0]['ID_dispositivo'];?>">
        <select name="device_type">
                    <option value="tv">TV</option>
                    <option value="aire_acondicionado">Aire Acondicionado</option>
                    <option value="ventilador">Ventilador</option>
                </select>
        <input type="submit" value="Editar">
        </div>
        
    </form>
    </div>

</body>
</html>