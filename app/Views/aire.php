<?php

$on_off= [
    3050, 1750,
    450, 1050, 500, 1050, 500, 350, 450, 350,
    500, 350, 500, 1050, 500, 300, 500, 350,
    500, 1050, 500, 1050, 500, 350, 450, 1100,
    450, 350, 500, 350, 450, 1050, 500, 1100,
    450, 350, 500, 1050, 500, 1050, 500, 350,
    450, 350, 500, 1050, 500, 350, 450, 400,
    450, 1050, 500, 350, 500, 350, 450, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 1100, 450, 350,
    500, 350, 450, 1050, 500, 350, 500, 350,
    500, 1050, 500, 1050, 500, 350, 450, 350,
    500, 350, 450, 350, 500, 350, 450, 400,
    450, 350, 500, 1000, 550, 1000, 500, 1050,
    500, 350, 500, 350, 450, 350, 500, 350,
    500, 1050, 500, 1050, 500, 300, 500, 350,
    500, 300, 500, 350, 500, 1050, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 350,
    500, 300, 500, 350, 500, 300, 550, 300,
    500, 300, 550, 300, 500, 300, 550, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 1100, 450, 400, 450, 1100, 450, 1100,
    450, 400, 400, 400, 450, 400, 400, 1150,
    400
];

$tempup = [
    3050, 1700,
    500, 1050, 500, 1050, 500, 350, 450, 350,
    500, 350, 450, 1100, 450, 350, 500, 350,
    450, 1100, 450, 1100, 450, 350, 500, 1050,
    500, 350, 450, 350, 500, 1050, 500, 1100,
    450, 350, 500, 1050, 500, 1050, 450, 400,
    450, 350, 500, 1000, 500, 400, 450, 350,
    500, 1050, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 500, 300, 500, 1050, 500, 350,
    500, 300, 500, 1050, 500, 350, 500, 300,
    500, 1050, 500, 1050, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 350,
    500, 1050, 500, 300, 500, 1050, 500, 1050,
    500, 350, 500, 300, 500, 350, 500, 300,
    550, 1000, 500, 1050, 500, 350, 500, 300,
    500, 350, 450, 350, 500, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 300, 500, 350, 500, 300, 550, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 400, 450, 350, 450, 400, 450, 350,
    450, 400, 450, 400, 400, 400, 450, 400,
    450, 400, 400, 400, 450, 1100, 450, 1100,
    400, 400, 450, 400, 400, 1150, 400, 450,
    400
];

$tempdown= [
    3100, 1700,
    450, 1100, 500, 1050, 450, 350, 500, 350,
    450, 350, 500, 1050, 500, 350, 450, 400,
    450, 1050, 500, 1100, 400, 400, 450, 1100,
    450, 400, 400, 400, 400, 1150, 400, 1150,
    400, 450, 400, 1100, 450, 1150, 350, 450,
    400, 450, 400, 1150, 350, 450, 400, 450,
    400, 1150, 400, 450, 400, 400, 450, 400,
    400, 400, 450, 400, 450, 350, 500, 350,
    450, 350, 500, 350, 500, 300, 500, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 500, 300, 500, 1050, 500, 350,
    450, 350, 500, 1050, 500, 350, 450, 400,
    450, 1050, 500, 1100, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 350, 450, 1050, 500, 1050, 500, 1050,
    500, 350, 450, 350, 500, 350, 450, 400,
    450, 1050, 500, 1050, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 300, 500, 350, 500, 350, 450, 350,
    500, 350, 450, 350, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    550, 300, 500, 350, 500, 300, 500, 350,
    500, 300, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 400, 450, 350,
    500, 1050, 500, 350, 450, 1100, 450, 1100,
    450, 400, 400, 400, 400, 1150, 400, 450,
    400
];

$swing= [
    3100, 1700,
    450, 1050, 500, 1100, 450, 350, 500, 300,
    500, 300, 550, 1050, 500, 350, 450, 350,
    500, 1050, 500, 1050, 500, 350, 500, 1050,
    500, 300, 500, 350, 500, 1000, 500, 1100,
    500, 300, 500, 1050, 500, 1050, 500, 300,
    550, 300, 500, 1050, 500, 300, 500, 350,
    500, 1100, 450, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 450, 400, 450, 350, 500, 350,
    500, 1050, 500, 300, 500, 350, 500, 1050,
    450, 350, 500, 350, 500, 1050, 450, 1100,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 350, 450, 1100, 450, 1100, 450, 1100,
    450, 350, 500, 350, 450, 350, 450, 400,
    450, 1100, 450, 1100, 450, 350, 450, 1100,
    450, 1100, 450, 1100, 450, 400, 450, 400,
    450, 350, 450, 400, 450, 350, 500, 350,
    450, 350, 450, 400, 450, 350, 450, 400,
    450, 400, 400, 400, 450, 400, 450, 350,
    500, 350, 450, 350, 450, 400, 450, 400,
    450, 350, 450, 400, 450, 350, 450, 400,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 400, 450, 350, 450, 400, 450, 350,
    450, 400, 450, 350, 450, 400, 450, 350,
    500, 1050, 500, 350, 450, 1100, 450, 350,
    500, 350, 450, 350, 500, 350, 450, 1100,
    450
];

$fan= [
    3050, 1700,
    500, 1050, 500, 1050, 500, 350, 450, 350,
    500, 300, 500, 1100, 450, 350, 500, 350,
    500, 1050, 500, 1050, 450, 400, 450, 1050,
    500, 300, 500, 350, 500, 1050, 500, 1100,
    450, 350, 500, 1050, 500, 1050, 500, 300,
    500, 350, 500, 1050, 500, 350, 450, 350,
    500, 1050, 500, 350, 450, 400, 450, 350,
    450, 350, 500, 300, 550, 350, 450, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 350, 450, 400, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 1100, 450, 350,
    500, 350, 450, 1100, 450, 350, 500, 350,
    500, 1050, 500, 1050, 500, 300, 500, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 350, 500, 1050, 450, 1100, 450, 1050,
    500, 350, 500, 350, 450, 350, 500, 350,
    500, 1050, 500, 300, 500, 1100, 450, 1100,
    450, 1050, 500, 1100, 450, 300, 550, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    550, 300, 500, 300, 500, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 350, 450, 350, 450, 400, 450, 350,
    500, 350, 450, 350, 500, 350, 450, 400,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 1050, 500, 1050, 500, 1050, 450, 350,
    500, 350, 500, 300, 500, 350, 500, 1050,
    500
];

$mode= [
    3050, 1700,
    500, 1050, 500, 1050, 500, 350, 450, 350,
    500, 350, 450, 1100, 450, 350, 500, 350,
    500, 1050, 500, 1050, 500, 300, 500, 1050,
    500, 350, 450, 350, 500, 1050, 500, 1050,
    500, 350, 500, 1050, 500, 1050, 500, 350,
    450, 350, 500, 1050, 500, 350, 450, 350,
    500, 1050, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 500, 300, 500, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 450, 350, 500, 350, 500, 350,
    450, 350, 500, 350, 450, 1050, 500, 350,
    500, 350, 450, 1050, 500, 350, 500, 350,
    500, 350, 450, 1050, 500, 350, 500, 350,
    450, 350, 500, 300, 500, 350, 500, 300,
    550, 300, 500, 1050, 500, 1050, 500, 1050,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 350, 450, 350, 500, 350, 450, 1100,
    450, 1100, 450, 1100, 450, 350, 500, 350,
    500, 300, 550, 300, 500, 300, 550, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 450, 400,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 400,
    400, 400, 450, 400, 400, 400, 400, 450,
    400, 400, 450, 400, 400, 400, 400, 450,
    400, 1150, 400, 450, 400, 400, 400, 450,
    400, 400, 400, 450, 400, 400, 400, 1200,
    400
];

$sleep= [
    3100, 1700,
    450, 1100, 450, 1100, 450, 350, 500, 350,
    450, 350, 500, 1050, 500, 350, 450, 400,
    450, 1100, 450, 1100, 450, 350, 500, 1050,
    500, 300, 500, 350, 500, 1050, 500, 1050,
    500, 350, 450, 1100, 450, 1050, 500, 350,
    500, 350, 450, 1100, 450, 350, 500, 350,
    500, 1050, 500, 300, 500, 300, 550, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 350,
    500, 300, 500, 350, 500, 300, 500, 350,
    500, 300, 500, 350, 500, 1050, 500, 300,
    500, 350, 500, 1050, 500, 300, 500, 350,
    500, 1100, 450, 1100, 450, 350, 500, 300,
    500, 350, 500, 300, 500, 350, 500, 300,
    550, 300, 500, 1050, 500, 1050, 500, 1050,
    450, 350, 500, 350, 500, 300, 500, 350,
    500, 1050, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    500, 350, 450, 350, 500, 350, 450, 350,
    500, 350, 450, 350, 500, 350, 450, 400,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 350, 500, 350, 450, 350, 500, 350,
    450, 400, 450, 350, 450, 400, 450, 350,
    450, 400, 450, 350, 450, 400, 450, 350,
    500, 350, 450, 400, 450, 350, 450, 400,
    400, 400, 450, 400, 400, 400, 450, 400,
    450, 1100, 450, 1100, 400, 450, 400, 1150,
    400, 400, 400, 450, 400, 1150, 400, 450,
    400
];

$on_off_string = implode(",", $on_off);
$tempup_string = implode(",", $tempup);
$tempdown_string = implode(",", $tempdown);
$swing_string = implode(",", $swing);
$fan_string = implode(",", $fan);
$mode_string = implode(",", $mode);
$sleep_string = implode(",", $sleep);


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/airstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <title>Control Remoto Aire acondicionado</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

<div class="control-remoto">
        <div class="pantalla">AIRE </div>
        
        <div class="seccion">
            <div class="temp-botones">
                <div class="boton" onclick="enviarIR('<?php echo $tempup_string;?>','<?php echo session()->get('esp_ip');?>')">TEMP ▲</div>
                <div class="boton" onclick="enviarIR('<?php echo $tempdown_string;?>','<?php echo session()->get('esp_ip');?>')">TEMP ▼</div>
            </div>
        </div>

        <div class="seccion">
            <div class="power-boton">
                <div class="boton rojo" onclick="enviarIR('<?php echo $on_off_string;?>','<?php echo session()->get('esp_ip');?>')">ON/OFF</div>
            </div>
        </div>

        <div class="seccion">
            <div class="boton-container">
                <div class="boton-fan" onclick="enviarIR('<?php echo $fan_string;?>','<?php echo session()->get('esp_ip');?>')">FAN SPEED</div>
                <div class="boton" onclick="enviarIR('<?php echo $mode_string;?>','<?php echo session()->get('esp_ip');?>')">MODE</div>
            </div>
        </div>
    
        <div class="seccion">
            <div class="boton-container">
            
                <div class="boton" onclick="enviarIR('<?php echo $swing_string;?>','<?php echo session()->get('esp_ip');?>')">SWING</div>
                <div class="boton" onclick="enviarIR('<?php echo $sleep_string;?>','<?php echo session()->get('esp_ip');?>')">SLEEP</div>
            </div>
        </div>
        
        <div class="seccion">
            <div class="boton-container">
                <div class="boton-on">TIMER ON</div>
                <div class="boton-timer">TIMER OFF</div>
            </div>
        </div>
        
        <div class="seccion">
            <div class="boton-container">
                <div class="boton-led">LED DISPLAY</div>
                <div class="boton">TURBO</div>
            </div>
        </div>
        <div class="seccion">
                <div class="boton-direc">DIRECCION</div>
            </div>
    </div>


    <script src="<?php echo base_url('/js/sendIR.js');?>">

    </script>



</body>
</html>

