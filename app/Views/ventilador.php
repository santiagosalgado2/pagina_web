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
            <button class="button" id="on-off" onclick="enviarHex('0xBA45FF00','NEC',32,<?php echo session()->get('esp_ip');?>)">ON/OFF</button>
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
