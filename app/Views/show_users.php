<?php
    $session = session();

    $permiso = $session->get("tipo");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="stylesheet" href="<?php echo base_url("/css/userstyle.css") . '?v=' . time(); ?>">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
    <br><br><br><h1>Información de tus usuarios</h1>
      <div class="acciones">
     <a href="<?php echo base_url("/new_user");?>"><button class="button2">Crear un nuevo usuario</button></a> 
    <a href="<?php echo base_url("/");?>"><button class="button2">Volver</button></a><br>
    <?php 
     $error_data = $session->getFlashdata("error");
     if($error_data){
      echo "<h1>".$error_data."</h1>";
     }
     
     ?>
     </div>
    
    <?php if(isset($datos) && !empty($datos)):?>

        <table>
            <thead>
                <th>Nombre de usuario</th>
                <th>Dirección de E-mail</th>
                <th>Fecha de creación</th>
            </thead>
            <tbody>
                <?php foreach($datos as $d):?>
                    <tr>
                        <td><?php echo $d["nombre_usuario"];?> </td>
                        <td><?php echo $d["email"];?> </td>
                        <td><?php echo $d["fecha_creacion"];?> </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php else:?>
        <h2>No tienes usuarios creados</h2>
    <?php endif;?>

    

    <style>

      
    </style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>