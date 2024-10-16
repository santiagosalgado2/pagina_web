<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/newespstyle.css");?>"> 
    <title>Document</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    
      
    <div class="form-container">
        <h1>Registro de nuevo Esp32</h1>
    <form method="post" action="<?php echo base_url("/new_esp/insert"); ?>">
            <div class="mb-3">
            <span class="textos">Ingrese el código incluído con su dispositivo</span><input type="text" name="code" >
                <br><br>
                <span class="textos">Ingrese la ubicacion donde estara el dispositivo</span><input type="text" name="location">
                <br><br><input type="submit" value="Registrar">
            </div>
        </form>
        </div>

</body>
</html>