
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de televisor</title>
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url("/css/styletv.css") . '?v=' . time(); ?>">
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
    <!--container-->
    <div>
    <input type="hidden" id="deviceId" value="<?php echo $id;?>" />
    <input type="hidden" id="actionId" value="<?php echo session()->get('action_id');?>" />
    <input type="hidden" id="deleteAction" value="<?php echo base_url('/front/eliminar_accion') ?>" /> <!-- Reemplaza 12345 con el ID real del dispositivo -->
    <div class="remote-control" data-url-receive-code="<?= base_url('/enviar_senal') ?>" 
    data-url-save-signal="<?= base_url('/insertar_senal'); ?>" data-url-verify-signal="<?= base_url('/js/verificar_grabacion');?>"
    data-url-verify-record="<?= base_url('/verificar_grabacion'); ?>">
    <div class="container">
        <div class="d-flex flex-row justify-content-between px-3 py-4 align-items-center">
            <i class="fas fa-chevron-left"></i>
            <span>AULA TV</span>
            <i class="fas fa-ellipsis-h"></i>
        </div>

        <div class="d-flex flex-row justify-content-center">
            <div class="menu-grid">
                <div class="d-flex flex-column align-items-center" data-id="1">
                    <i class="fas fa-power-off active"></i>
                    <span class="label">Power</span>
                </div>
                <div class="d-flex flex-column align-items-center" data-id="2">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="label">Input</span>
                </div>
                <div class="d-flex flex-column align-items-center" data-id="3">
                    <i class="fas fa-cog"></i>
                    <span class="label">Control</span>
                </div>
                <div class="d-flex flex-column align-items-center" data-id="4"> 
                    <i class="fas fa-bars"></i>
                    <span class="label">Menu</span>
                </div>
                <div class="d-flex flex-column align-items-center" data-id="5">
                    <i class="fas fa-circle"></i>
                    <span class="label">Netflix</span>
                </div>
                <div class="d-flex flex-column align-items-center" data-id="6">
                    <i class="fas fa-arrow-left"></i>
                    <span class="label">Back</span>
                </div>
            </div>
        </div>

        <div class="d-flex flex-row mt-4 justify-content-between px-2">
            <div class="d-flex flex-column rounded-bg py-3 px-4 justify-content-center align-items-center">
                <i class="fas fa-chevron-up py-3 control-icon" data-id="7"></i>
                <span class="label py-3">Channel</span>
                <i class="fas fa-chevron-down py-3 control-icon" data-id="8"></i>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex flex-row grey-bg justify-content-center align-items-center">
                    <i class="fas fa-home p-3 home-icon" data-id="9"></i>
                </div>
                <span class="label">Home</span>
            </div>
            <div class="d-flex flex-column rounded-bg py-3 px-4 justify-content-center align-items-center">
                <i class="fas fa-plus py-3 control-icon" data-id="10"></i>
                <span class="label py-3">Volume</span>
                <i class="fas fa-minus py-3 control-icon" data-id="11"></i>
            </div>
        </div>

        <div class="mt-5 pt-4 position-relative d-flex flex-row justify-content-center align-items-center">
            <div class="circle ok-inner position-absolute" data-id="16">
                <span>OK</span>
            </div>
            <div class="circle ok-outer position-absolute"></div>
            <i class="fas fa-caret-right position-absolute control-icon right" data-id="14"></i>
            <i class="fas fa-caret-right position-absolute control-icon bottom" data-id="15"></i>
            <i class="fas fa-caret-right position-absolute control-icon left" data-id="13"></i>
            <i class="fas fa-caret-right position-absolute control-icon top" data-id="12"></i>
        </div>

        <div class="d-flex flex-row justify-content-between mt-5 pt-4 px-3">
            <div class="d-flex flex-row grey-bg">
                <i class="fas fa-ellipsis-h p-3 control-icon" data-id="17"></i>
            </div>
            <div class="d-flex flex-row grey-bg">
                <i class="fas fa-volume-mute p-3 control-icon" data-id="18"></i>
            </div>
        </div>
        <div>
        <button class="button-small" data-id="19">1</button>
        <button class="button-small" data-id="20">2</button>
        <button class="button-small" data-id="21">3</button>
    </div>
    <div>
        <button class="button-small" data-id="22">4</button>
        <button class="button-small" data-id="23">5</button>
        <button class="button-small" data-id="24">6</button>
    </div>
    <div>
        <button class="button-small" data-id="25">7</button>
        <button class="button-small" data-id="26">8</button>
        <button class="button-small" data-id="27">9</button>
    </div>
        <button class="button-rect" data-id="28">0</button>
    </div>
</div>
    </div>
</div>
</div>


<script>
  function deleteAction() {
    const urlElement = document.getElementById('deleteAction');
    const actionElement = document.getElementById('actionId');

    if (urlElement && actionElement) {
      const url = urlElement.value;
      const action_id = actionElement.value;

      if (url && action_id) {
        const payload = new Blob([JSON.stringify({ action_id })], { type: 'application/json' });
        navigator.sendBeacon(url, payload);
      }
    }
  }

  window.addEventListener('beforeunload', function (e) {
    deleteAction();

    // Mensaje de confirmación antes de salir
    const confirmationMessage = '¿Estás seguro de que deseas abandonar esta página?';
    e.returnValue = confirmationMessage;
    return confirmationMessage;
  });

  // Tiempo de inactividad en milisegundos (5 minutos)
  const INACTIVITY_TIME = 3 * 60 * 1000;

  // Variable para almacenar el temporizador
  let inactivityTimer;

  // Función para redirigir al usuario
  function redirectToAnotherRoute() {
    deleteAction();
    window.location.href = '<?php echo base_url('/'); ?>';
  }

  // Función para reiniciar el temporizador de inactividad
  function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    inactivityTimer = setTimeout(redirectToAnotherRoute, INACTIVITY_TIME);
  }

  // Eventos para detectar actividad del usuario
  window.onload = resetInactivityTimer;
  window.onmousemove = resetInactivityTimer;
  window.onmousedown = resetInactivityTimer; // Detecta clics del mouse
  window.ontouchstart = resetInactivityTimer; // Detecta toques en dispositivos táctiles
  window.onclick = resetInactivityTimer; // Detecta clics
  window.onkeypress = resetInactivityTimer; // Detecta pulsaciones de teclas
  window.addEventListener('scroll', resetInactivityTimer, true); // Detecta desplazamiento

  // Iniciar el temporizador de inactividad al cargar la página
  resetInactivityTimer();
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    const remoteControl = document.querySelector('.remote-control');
    const receiveCodeUrl = remoteControl.getAttribute('data-url-receive-code'); // URL para leer señales
    const saveSignalUrl = remoteControl.getAttribute('data-url-save-signal');
    const verifySignalUrl = remoteControl.getAttribute('data-url-verify-signal'); // URL para guardar señal
    const verifyRecordUrl = remoteControl.getAttribute('data-url-verify-record'); // URL para verificar si la señal ya está grabada

    const buttons = document.querySelectorAll('[data-id]');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const functionId = this.getAttribute('data-id'); // ID de la función
            const deviceId = document.getElementById('deviceId').value; // ID del dispositivo
            const action_id = document.getElementById('actionId').value;

            // Mostrar mensaje de espera
            alert('Esperando la lectura de la señal IR. Por favor, pulse ACEPTAR y luego pulse el botón de su control original');

            // Llamar a la función que verifica continuamente el CSV
            waitForSignal(functionId, deviceId, action_id);
        });
    });

    // Función para verificar continuamente el CSV
    async function waitForSignal(functionId, deviceId, action_id) {
        try {

            const num=2;

            const response = await fetch(receiveCodeUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ deviceId, functionId, action_id, num }),
            });

            if (response.status !== 200) {
                throw new Error('Error al verificar la señal.');
            }

            let irCode=null;
            let protocolo=null;
            let bits=null;

            while (irCode === null){
              const verifyResponse =await fetch(verifySignalUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action_id, functionId }),
                });

              if(verifyResponse.status === 200){
                const verifyData = await verifyResponse.json();
                if (verifyData.hexadecimal) {
                  protocolo= verifyData.protocolo;
                  bits= verifyData.bits;
                  irCode = verifyData.hexadecimal;
                }
              }
            }
                  const verifyRecord =await fetch(verifyRecordUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ deviceId, functionId }),
                });

                if (verifyRecord.status === 200) { 
            // Mostrar un confirm al usuario
                    const userConfirmed = confirm("Esta señal ya está grabada, ¿deseas sobreescribirla?");
            // Si el usuario confirma
                    if (userConfirmed) {
                        const saveResponse = await fetch(saveSignalUrl, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ irCode, protocolo, bits, deviceId, functionId }),
                        });

                        alert(`Señal actualizada correctamente`);
                    }else{
                      alert('la señal no sera sobreescrita');
                    }
                }else{
                    const saveResponse = await fetch(saveSignalUrl, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ irCode, protocolo, bits, deviceId, functionId }),
                    });

                    alert(`Señal grabada correctamente`);
                    
                }
                }        catch (error) {
            console.error(error);
            alert(error.message);
        }
              }
              

            
                
            } 
 
     // Aquí se cierra la función waitForSignal

);

</script>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




</body>

</html>