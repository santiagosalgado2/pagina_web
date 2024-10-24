<?php

$valores = array(
    4600, 4300, 750, 1450, 750, 400, 700, 1450, 700, 1500,
    750, 400, 700, 400, 650, 1500, 750, 400, 700, 400,
    700, 1500, 700, 450, 700, 350, 700, 1500, 750, 1450,
    700, 400, 750, 1450, 750, 400, 700, 1450, 700, 1500,
    750, 1450, 750, 1400, 750, 400, 700, 1500, 700, 1500,
    650, 1450, 750, 450, 700, 400, 650, 450, 700, 400,
    750, 1450, 750, 350, 750, 400, 700, 1500, 700, 1500,
    700, 1450, 700, 450, 700, 400, 650, 450, 700, 450,
    700, 400, 650, 450, 700, 450, 700, 400, 650, 1550,
    700, 1450, 750, 1500, 700, 1500, 700, 1450, 700, 4650,
    4600, 4350, 750, 1450, 700, 450, 650, 1500, 750, 1450,
    650, 500, 650, 450, 650, 1500, 700, 450, 650, 500,
    650, 1500, 650, 450, 700, 400, 750, 1450, 650, 1550,
    650, 450, 650, 1550, 700, 500, 650, 1500, 700, 1500,
    700, 1500, 600, 1550, 700, 450, 650, 1500, 700, 1500,
    700, 1500, 700, 400, 700, 450, 650, 450, 650, 450,
    700, 1500, 700, 450, 650, 450, 650, 1550, 650, 1500,
    700, 1500, 650, 500, 600, 500, 700, 400, 700, 450,
    700, 450, 600, 500, 650, 450, 650, 500, 650, 1500,
    700, 1500, 650, 1500, 650, 1550, 650, 1550, 650
);

$apagar_string = implode(',', $valores);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/airstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <title>Control Remoto</title>
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
                <div class="boton">TEMP ▲</div>
                <div class="boton">TEMP ▼</div>
            </div>
        </div>

        <div class="seccion">
            <div class="power-boton">
                <div class="boton rojo" onclick="enviarIR('<?php echo $apagar_string;?>','<?php echo session()->get('esp_ip');?>')">ON/OFF</div>
            </div>
        </div>

        <div class="seccion">
            <div class="boton-container">
                <div class="boton-fan">FAN SPEED</div>
                <div class="boton">MODE</div>
            </div>
        </div>
    
        <div class="seccion">
            <div class="boton-container">
            
                <div class="boton">SWING</div>
                <div class="boton">SLEEP</div>
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

