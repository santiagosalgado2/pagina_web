<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/newdevicestyle.css");?>"> 
    <title>Document</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    
      
    <div class="form-container">
        <h1>Registro de nuevo dispositivo</h1>
    <form method="post" action="<?php echo base_url("/new_device/insert"); ?>">
            <div class="mb-3">
            <span class="textos">Ingrese el nombre de su dispositivo</span><input type="text" name="name" >
                <br><br>
                <span class="textos">Ingrese el tipo de dispositivo</span>
                <select name="device_type">
                    <option value="tv">TV</option>
                    <option value="aire_acondicionado">Aire Acondicionado</option>
                    <option value="ventilador">Ventilador</option>
                </select>
                <br><br><input type="submit" value="Registrar">
            </div>
        </form>
        </div>



</body>
</html>