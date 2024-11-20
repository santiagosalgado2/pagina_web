<?php

$apagar  = [
    1350, 350,
    1300, 400, 450, 1200, 1350, 350, 1300, 400,
    450, 1200, 500, 1200, 450, 1200, 500, 1200,
    500, 1200, 450, 1200, 1350, 7200, 1350, 350,
    1300, 400, 450, 1200, 1350, 350, 1300, 350,
    500, 1200, 500, 1200, 450, 1200, 500, 1200,
    450, 1250, 450, 1200, 1300, 7250, 1350, 350,
    1300, 400, 450, 1200, 1300, 400, 1300, 400,
    450, 1200, 500, 1200, 450, 1200, 450, 1250,
    450, 1250, 400, 1250, 1300, 7250, 1250, 450,
    1250, 450, 450, 1200, 1250, 450, 1250, 450,
    400, 1250, 400, 1300, 400, 1300, 350, 1300,
    400, 1300, 350, 1300, 1250, 7300, 1250, 450,
    1250, 450, 400, 1300, 1200, 450, 1250, 450,
    400, 1250, 400, 1300, 400, 1300, 350, 1300,
    400, 1250, 450, 1250, 1250, 7300, 1250, 450,
    1250, 450, 400, 1250, 1250, 450, 1250, 450,
    400, 1250, 450, 1250, 400, 1250, 450, 1250,
    450, 1250, 450, 1200, 1300
];

$tiempo= [
    1350, 350,
    1300, 350, 500, 1200, 1300, 400, 1300, 350,
    500, 1200, 450, 1200, 500, 1200, 500, 1200,
    450, 1200, 1350, 350, 450, 8050, 1350, 400,
    1300, 350, 500, 1200, 1300, 350, 1350, 350,
    500, 1200, 450, 1200, 500, 1200, 450, 1200,
    500, 1200, 1300, 400, 450, 8050, 1350, 350,
    1350, 350, 500, 1200, 1300, 350, 1350, 350,
    450, 1200, 500, 1200, 500, 1200, 450, 1200,
    500, 1200, 1300, 400, 450, 8050, 1350, 350,
    1350, 350, 450, 1200, 1350, 350, 1350, 350,
    450, 1200, 500, 1150, 550, 1150, 500, 1200,
    500, 1150, 1350, 350, 450
];

$velocidad= [
    1350, 400,
    1300, 350, 500, 1200, 1300, 350, 1350, 350,
    450, 1250, 450, 1200, 1300, 400, 450, 1200,
    500, 1200, 450, 1200, 500, 8050, 1350, 350,
    1350, 350, 450, 1200, 1350, 350, 1300, 400,
    450, 1200, 500, 1200, 1300, 350, 500, 1200,
    500, 1200, 450, 1200, 500, 8050, 1350, 350,
    1300, 400, 450, 1200, 1350, 350, 1300, 350,
    500, 1200, 500, 1200, 1300, 350, 500, 1200,
    450, 1250, 450, 1200, 500, 8050, 1350, 350,
    1300, 400, 450, 1200, 1300, 400, 1300, 350,
    500, 1200, 500, 1200, 1300, 350, 500, 1200,
    450, 1200, 500, 1200, 500, 8050, 1350, 350,
    1300, 350, 500, 1200, 1300, 400, 1300, 350,
    500, 1200, 450, 1250, 1300, 350, 500, 1150,
    500, 1200, 500, 1150, 500
];

$modobrisa= [
    1350, 350,
    1300, 400, 450, 1200, 1300, 400, 1300, 350,
    500, 1150, 500, 1200, 500, 1200, 1300, 400,
    450, 1200, 500, 1150, 500, 8050, 1350, 400,
    1300, 350, 450, 1200, 1350, 350, 1300, 400,
    450, 1200, 500, 1200, 450, 1200, 1350, 400,
    450, 1200, 450, 1250, 450, 8050, 1350, 350,
    1300, 400, 450, 1200, 1350, 350, 1300, 400,
    450, 1200, 500, 1200, 450, 1200, 1350, 350,
    500, 1200, 450, 1250, 450, 8050, 1350, 350,
    1300, 400, 450, 1250, 1250, 400, 1300, 400,
    400, 1250, 450, 1250, 450, 1250, 1250, 400,
    450, 1250, 400, 1250, 450
];

$apagar_string = implode(',', $apagar);
$tiempo_string = implode(',', $tiempo);
$velocidad_string= implode(',', $velocidad);
$modobrisa_string = implode(',', $modobrisa);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Remoto ventilador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            <button class="button" id="tiempo" onclick="enviarIR('<?php echo $tiempo_string;?>','<?php echo session()->get('esp_ip');?>')">TIEMPO</button>
            <button class="button" id="velocidad" onclick="enviarIR('<?php echo $velocidad_string;?>','<?php echo session()->get('esp_ip');?>')">VELOCIDAD</button>
            <button class="button" id="modo-brisa" onclick="enviarIR('<?php echo $modobrisa_string;?>','<?php echo session()->get('esp_ip');?>')">MODO BRISA</button>
        </div>
        <div class="logo-section">
            <p>Liliana</p>
        </div>
    </div>

    <script src="<?php echo base_url('/js/sendIR.js');?>">

    </script>
</body>
</html>
