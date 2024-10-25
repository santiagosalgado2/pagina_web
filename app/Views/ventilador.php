<?php

$apagar = [

    9050, 4550,
    550, 600,
    600, 550,
    650, 500,
    600, 550,
    600, 500,
    600, 550,
    600, 550,
    600, 550,
    600,1650,
    600, 1650,
    600, 1650,
    600, 1650,
    600, 1650,
    600, 1650,
    600, 1600,
    650, 1650,
    600, 1650,
    600, 500,
    650, 1600,
    650, 500,
    650, 500,
    650, 500,
    600, 1650,
    600, 550,
    600, 500,
    650, 1600,
    650, 500,
    650, 1600,
    650, 1600,
    650, 1600,
    650, 500,
    600, 1650,
    600
];

$apagar_string = implode(',', $apagar);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Remoto</title>
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/ventilador.css");?>"> 
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    
    <div class="remote-control">
        <div class="top-section">
            <button class="button" id="on-off" onclick="enviarIR('<?php echo $apagar_string;?>','<?php echo session()->get('esp_ip');?>')">ON/OFF</button>
            <button class="button" id="tiempo">TIEMPO</button>
            <button class="button" id="velocidad">VELOCIDAD</button>
            <button class="button" id="modo-brisa">MODO BRISA</button>
        </div>
        <div class="logo-section">
            <p>Liliana</p>
        </div>
    </div>

    <script src="<?php echo base_url('/js/sendIR.js');?>">

    </script>
</body>
</html>
