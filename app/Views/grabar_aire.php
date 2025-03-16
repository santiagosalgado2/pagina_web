<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Grabar señales</title>
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
<input type="hidden" id="deviceId" value="<?php echo $id;?>" />
    <input type="hidden" id="actionId" value="<?php echo session()->get('action_id');?>" /> <!-- Reemplaza 12345 con el ID real del dispositivo -->

    <input type="hidden" id="deleteAction" value="<?php echo base_url('/front/eliminar_accion') ?>" />

    <h1>Configuraciones del aire seleccionado</h1>
    <?php if($permiso==1):?>
      <div class="acciones">
        <center><button class="button2" type="button" onclick="openForm()">Crear configuración</button></center>
      </div>
    <?php endif;?>
    
<?php
if(!empty($config)):?>
    
    <div class="contenedores" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; width: 60rem; margin: auto;">
    <?php 
    $contador=1;
    foreach($config as $c):?>
    
    <div class="card" style="width: 18rem; margin-top:40px;">
        <div class="card-body">
            <h3 class="card-title">Configuración <?php echo $contador;?></h3>
            <p class="card-text"><b>Temperatura:</b> <?php echo $c['temperatura'];?> °C</p>
            <p class="card-text"><b>Swing:</b>  <?php echo $c['swing'];?></p>
            <p class="card-text"><b>Modo:</b>  <?php echo $c['modo'];?></p>
            <p class="card-text"><b>Fan speed:</b>  <?php echo $c['fanspeed'];?></p>
            <a href="#" class="card-link"><button class="button2">Grabar</button></a>
            <?php if($permiso==1):?>
              <button class="button2" onclick="deleteSignal('<?php echo base_url('/deleteConfig/'.$c['ID_senal']);?>')">Eliminar</button>

            <?php endif;?>
        </div>
    </div>

    <?php $contador+=1; endforeach; else:?>
</div>


<h1 style="padding-top: 50px;">No hay configuraciones creadas</h1>

<?php endif;?>

<style>
  body {
    height: 100vh;
    background: linear-gradient(135deg, #2C3E50, #4CA1AF); /* Azul marino a azul petróleo */
    color: #333333; /* Gris carbón para el texto */
    padding-top: 80px;
}

.card-text{
  font-size: 20px;
}

/* Barra de navegación */
nav.navbar {
    background: linear-gradient(135deg, #0F2027, #203A43, #2C5364); /* Negro a azul oscuro */
}

/* Links de navegación */
.navbar .nav-link {
    color: #BDC3C7; /* Gris claro */
}

.navbar .nav-link:hover {
    color: #2980B9; /* Azul profundo */
}

.circulo {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    animation: flotando 10s infinite ease-in-out;
}

.circulo:nth-child(1) {
    width: 200px;
    height: 200px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.circulo:nth-child(2) {
    width: 150px;
    height: 150px;
    top: 70%;
    left: 30%;
    animation-delay: 2s;
}

.circulo:nth-child(3) {
    width: 300px;
    height: 300px;
    top: 40%;
    right: 10%;
    animation-delay: 4s;
}

.circulo:nth-child(4) {
    width: 100px;
    height: 100px;
    bottom: 15%;
    right: 40%;
    animation-delay: 6s;
}
@keyframes flotando{0%, 100% {
    transform: translateY(0) translateX(0);
}
50% {
    transform: translateY(-50px) translateX(50px);
}}
.textos {
    font-size: larger;
    font-weight: 600;
}
.button2 {
    display: inline-block;
    transition: all 0.2s ease-in;
    position: relative;
    overflow: hidden;
    z-index: 1;
    color: #ffffff;
    padding: 0.2em 0,5em;
    cursor: pointer;
    font-size: 18px;
    border-radius: 0.5em;
    background: #2C3E50;
    border: 1px solid #2C3E50;
    box-shadow: 1px 1px 4px #c5c5c5, 0px 0px 3px #ffffff;

}

.button2:active {
    color: #666;
    box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
}

.button2:before {
    content: "";
    position: absolute;
    left: 50%;
    transform: translateX(-50%) scaleY(1) scaleX(1.25);
    top: 100%;
    width: 140%;
    height: 180%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
}

.button2:after {
    content: "";
    position: absolute;
    left: 55%;
    transform: translateX(-50%) scaleY(1) scaleX(1.45);
    top: 180%;
    width: 160%;
    height: 190%;
    background-color: #fa8560;
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
}

.button2:hover {
    color: #ffffff;
    border: 1px solid #2C3E50;
}

.button2:hover:before {
    top: -35%;
    background-image: linear-gradient(to right, #2980B9 0%, #4CA1AF 100%);
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}
.acciones button {
    font-size: 18px;
    padding: 15px 30px;
  }
  h1{
    text-align: center;
    margin-bottom: 37px;
    color: white;
    
    
  }

  /* Estilos para el formulario emergente */
  .modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 30%; /* Más angosto */
  }
</style>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Crear Configuración</h2>
    <form id="createConfigForm" >
      <input type="hidden" value="<?php echo $id;?>" name="id">
      <div class="mb-3">
        <label for="temperatura" class="form-label">Temperatura</label>
        <input type="number" class="form-control" id="temperatura" name="temperatura" min="0" max="255" required>
      </div>
      <div class="mb-3">
        <label for="swing" class="form-label">Swing</label>
        <select class="form-control" id="swing" name="swing" required>
          <option value="auto">Auto</option>
          <option value="on">On</option>
          <option value="off">Off</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="modo" class="form-label">Modo</label>
        <select class="form-control" id="modo" name="modo" required>
          <option value="cool">Cool</option>
          <option value="heat">Heat</option>
          <option value="fan">Fan</option>
          <option value="dry">Dry</option>
          <option value="auto">Auto</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="fanspeed" class="form-label">Fan Speed</label>
        <select class="form-control" id="fanspeed" name="fanspeed" required>
          <option value="auto">Auto</option>
          <option value="low">Low</option>
          <option value="mid">Mid</option>
          <option value="high">High</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>

<script>
  // Obtener el modal
  var modal = document.getElementById("myModal");

  // Obtener el botón que abre el modal
  var btn = document.getElementsByClassName("button2")[0];

  // Obtener el elemento <span> que cierra el modal
  var span = document.getElementsByClassName("close")[0];

  // Cuando el usuario hace clic en el botón, abre el modal 
  function openForm() {
    modal.style.display = "block";
  }

  // Cuando el usuario hace clic en <span> (x), cierra el modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // Cuando el usuario hace clic en cualquier lugar fuera del modal, lo cierra
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  // Manejo del formulario de creación de configuración
  document.getElementById("createConfigForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('<?php echo base_url('/crear_config');?>', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      // Manejar la respuesta del servidor
      if (data.success) {
        alert(data.success);
      } else if (data.error) {
        alert(data.error);
      }
      modal.style.display = "none";
      // Actualizar la vista con la nueva configuración si es necesario
    })
    .catch(error => {
      console.error("Error:", error);
    });
  });

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
  window.onkeypress = resetInactivityTimer; //
  window.addEventListener('scroll', resetInactivityTimer, true); // Detecta desplazamiento

  // Iniciar el temporizador de inactividad al cargar la página
  resetInactivityTimer();

  function deleteSignal(url) {
    if (confirm("¿Estás seguro de que deseas eliminar esta configuración?")) {
        fetch(url, { method: "GET" }) // Se ejecuta la ruta sin recargar la página
            .then(response => response.json()) // Espera una respuesta JSON
            .then(data => {
                if (data.success) {
                    alert("Configuración eliminada correctamente. Actualiza la página para ver los cambios");
                    // Opcionalmente, actualizar la vista sin recargar
                    document.getElementById("fila_" + data.id).remove();
                } 
            })
            .catch(error => {
                console.error("Error:", error);
              
            });
    }
}


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

