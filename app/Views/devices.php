<?php
    $session = session();

    $permiso = $session->get("tipo");
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("/css/userstyle.css") . '?v=' . time(); ?>">
 
    <title>Dispositivos</title>
</head>
<body>
    
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

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
    

    <br><br><br><h1>Dispositivo <?php echo $esp[0]['ubicacion']; ?></h1>
    <div class="acciones">
    <a href="<?php echo base_url("/ver_senales"); ?>"><button class="button2">Prueba para ver codigos hex</button></a><br><br>


    <?php if($session->get('tipo')==1): ?>
    <a href="<?php echo base_url("/new_device");?>"><button class="button2">Vincular nuevo dispositivo</button></a>
    <?php endif;?>
    <?php if(isset($datos) && !empty($datos)):?>

      </div>

    <table>

    <thead>
        <th>Dispositivos</th>
        <th>Acciones</th>
    </thead>


    <tbody>
        <?php foreach ($datos as $d):?>
          <?php 
                if ($d["ID_tipo"] == 1) {
                    $url = base_url('/prueba_aircontrol');
                } elseif ($d["ID_tipo"] == 2) {
                    $url = base_url('/prueba_control');
                } else {
                    $url = base_url('/prueba_ventiladorcontrol'); 
                }
            ?>
        <tr>
            <td><?php echo $d["nombre"];?> </td>
            <td>
                <a href="<?php echo $url; ?>"><button class="button2">Controlar</button></a>
                <?php
                if($permiso==1):?>  
                <a href="<?php echo base_url('/edit_device/'.$d['ID_dispositivo']); ?>"><button class="button2">Editar</button></a>
                <button class="button2" onclick="deleteDevice('<?php echo base_url('/delete_device/'.$d['ID_dispositivo']);?>')">Eliminar</button>
                <button class="button2">Grabar control remoto</button>
                <?php endif;?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>

    </table>

    <?php else:?>

    <p>No hay dispositivos vinculados a este esp32</p>
    <?php endif;?>

    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   

<script>

      function deleteDevice(url){
        //CUANDO EL USUARIO TOCA ELIMINAR, SE EJECUTA ESTE JS QUE PREGUNTA SI ESTA SEGURO DE ELIMINAR EL DISPOSITIVO. EN CASO DE ACEPTAR, SE EJECUTA LA URL QUE SE PASA COMO PARAMETRO
        //QUE LLEVA AL USUARIO AL CONTROLADOR ENCARGADO DE ELIMINAR EL REGISTRO DE LA BASE DE DATOS
        if (confirm("¿Estás seguro de que deseas eliminar este dispositivo? Se eliminaran todos los accesos y las señales asociadas al mismo")) {
          window.location.href = url;
        }

      }

</script>
</body>
</html>