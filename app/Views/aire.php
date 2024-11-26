<?php
#ARRAYS CON LOS VALORES CRUDOS DE LAS SEÑALES
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
      4450, 4350, 550, 1600, 550, 500, 600, 1550, 600, 1550,
    600, 500, 550, 500, 600, 1550, 600, 500, 550, 500, 600,
    1550, 650, 450, 550, 500, 600, 1550, 600, 1550, 600, 500,
    600, 1550, 600, 450, 600, 500, 600, 1550, 600, 1550, 600,
    1550, 600, 1550, 600, 1550, 600, 1550, 600, 1550, 600, 500,
    600, 450, 600, 500, 600, 450, 600, 500, 600, 450, 600, 500,
    600, 1550, 600, 1550, 600, 1550, 600, 450, 600, 500, 600,
    450, 600, 500, 600, 1550, 600, 450, 600, 500, 600, 450,
    600, 1550, 600, 1550, 600, 1550, 600, 1550, 600, 5100, 4500,
    4300, 600, 1550, 600, 500, 550, 1600, 600, 1550, 600, 450,
    600, 500, 600, 1550, 600, 450, 600, 500, 600, 1550, 600,
    450, 600, 500, 600, 1550, 600, 1550, 600, 450, 600, 1550,
    600, 500, 600, 450, 600, 1550, 550, 1600, 550, 1600, 550,
    1600, 550, 1600, 550, 1600, 550, 1650, 500, 1650, 500, 550,
    550, 550, 500, 550, 550, 550, 500, 550, 550, 550, 500, 550,
    550, 1600, 550, 1600, 550, 1600, 550, 550, 500, 550, 500,
    600, 500, 600, 450, 1700, 450, 600, 500, 600, 450, 600, 500,
    1650, 500, 1650, 500, 1650, 500, 1650, 500, 5250, 4350, 4450,
    450, 1700, 450, 1700, 450, 650, 450, 1700, 450, 600, 500,
    1650, 500, 600, 450, 1700, 450, 600, 500, 1650, 500, 1700,
    450, 600, 450, 650, 450, 1700, 450, 600, 450, 650, 450, 600,
    450, 650, 450, 600, 450, 650, 450, 600, 450, 650, 450, 600,
    450, 650, 450, 600, 450, 650, 450, 650, 400, 650, 450, 650,
    400, 650, 450, 650, 400, 650, 450, 650, 400, 650, 450, 650,
    400, 650, 450, 650, 400, 700, 400, 1750, 400, 1750, 400,
    1750, 350, 750, 350, 700, 350, 1800, 350
];

$tempdown= [
   
];

$swing= [
  4450, 4350,
  550, 1600, 550, 550, 550, 1550, 650, 1550,
  550, 1600, 550, 500, 550, 550, 550, 1600,
  550, 500, 550, 1600, 550, 550, 550, 500,
  550, 550, 550, 1600, 550, 1600, 550, 500,
  550, 1600, 550, 1600, 550, 1600, 600, 1550,
  600, 500, 550, 1600, 550, 500, 600, 1550,
  600, 500, 550, 500, 600, 500, 550, 500,
  600, 1550, 600, 500, 550, 1600, 600, 450,
  600, 500, 550, 500, 600, 500, 600, 450,
  600, 500, 600, 1550, 600, 450, 600, 1550,
  600, 1550, 600, 1550, 600, 1550, 600, 1550,
  600, 1550, 600, 500, 600, 1550, 600, 450,
  600, 5150, 4450, 4300, 600, 1600, 550, 500,
  600, 1550, 550, 1600, 550, 1600, 550, 500,
  600, 500, 550, 1600, 550, 500, 600, 1550,
  600, 500, 550, 500, 600, 500, 550, 1600,
  550, 1600, 600, 450, 600, 1550, 600, 1550,
  600, 1550, 600, 1550, 600, 500, 600, 1550,
  600, 500, 550, 1600, 550, 500, 550, 500,
  600, 500, 550, 550, 550, 1600, 550, 500,
  550, 1600, 550, 550, 550, 500, 550, 550,
  550, 550, 500, 550, 550, 500, 550, 1650,
  500, 550, 550, 1600, 550, 1600, 550, 1600,
  500, 1650, 500, 1650, 500, 1650, 500, 600,
  500, 1650, 500, 600, 450
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

#IMPLODE TRANSFORMA LOS ARRAYS A UN STRING CON LOS NUMEROS SEPARADOS POR ,
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
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("/css/airstyle.css") . '?v=' . time(); ?>">
    <title>Control Remoto Aire acondicionado</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    <?php
    $session = session();

    $permiso = $session->get("tipo");
?>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid justify-content-center"> <!-- centrado aquí -->
    <div class="d-flex align-items-center">
      <a class="navbar-brand" href="<?php echo base_url("/") ;?>" style="color: white;">
        <img src="<?php echo base_url("/img/logo1.png") ;?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        IRconnect
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent"> <!-- centrado aquí -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("/") ;?>" style="color: white;">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
            Mi usuario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url("/userInfo");?>" style="color: black;">Ver mi información</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url("/logout");?>">Cerrar sesión</a></li>
            <?php if($permiso==1):?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url("/showUsers");?> " style="color: black;">Administrar mis usuarios</a></li>
            <?php endif;?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

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


    <script src="<?php echo base_url('/js/sendIR.js');?>"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

