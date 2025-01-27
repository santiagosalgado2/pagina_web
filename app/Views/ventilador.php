<?php
$session=session();

$ip=$session->get('esp_ip');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Remoto ventilador</title>
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("/css/ventilador.css") . '?v=' . time(); ?>">

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
    
<div>
    <input type="hidden" id="deviceId" value="<?php echo $id;?>" /> <!-- Reemplaza 12345 con el ID real del dispositivo -->
    <input type="hidden" id="espIp" value="<?php echo $ip;?>" /> <!-- Reemplaza 12345 con el ID real del dispositivo -->
    <div class="remote-control" data-url-send-signal="<?= base_url('/enviar_senal') ?>">
        <div class="top-section">
            <button class="button" id="on-off" data-id="1">ON/OFF</button>
            <button class="button" id="tiempo" data-id="29">TIEMPO</button>
            <button class="button" id="velocidad" data-id="30">VELOCIDAD</button>
            <button class="button" id="modo-brisa" data-id="33">MODO BRISA</button>
        </div>
        <div class="logo-section">
            <p>Liliana</p>
        </div>
    </div>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const remoteControl = document.querySelector('.remote-control');
    const sendSignalUrl = remoteControl.getAttribute('data-url-send-signal'); // URL para leer señales

    // Seleccionar todos los botones que tienen el atributo "data-id"
    const buttons = document.querySelectorAll('[data-id]');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const functionId = this.getAttribute('data-id'); // ID de la función
            const deviceId = document.getElementById('deviceId').value;
            const espIp = document.getElementById('espIp').value; // ID del dispositivo            // Llamar a la función que verifica continuamente el CSV
            waitForSignal(functionId, deviceId, espIp);
        });
    });

    // Función para verificar continuamente el CSV
    async function waitForSignal(functionId, deviceId, espIp) {
        try {
            const response = await fetch(sendSignalUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ deviceId, functionId, espIp }),
            });


        } catch (error) {
            console.error(error);
            alert(error.message);
        }
    }
});

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
