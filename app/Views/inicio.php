<?php
    $session = session();

    $permiso = $session->get("tipo");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("/css/style.css");?>">
</head>
<body class="p-3 mb-2 bg-primary-subtle text-primary-emphasis">
<nav class="navbar navbar-expand-lg fixed-top" style="  background: linear-gradient(135deg, #f72611,#faa72b);">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?php echo base_url("/") ;?>" style="color: black;">
      <img src="<?php echo base_url("/img/logo.png") ;?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Nombre_pagina
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("/") ;?>" style="color: black;">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: black;">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
            Mi usuario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo base_url("/userInfo");?>" style="color: black;">Ver mi informacion</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url("/logout");?>">Cerrar sesión</a></li>
            <?php if($permiso==1):?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url("/showUsers");?> " style="color: black;">Administrar mis usuarios</a></li>
            <?php endif;?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true" style="color: black;">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
        <button class="btn btn-outline-success" type="submit" style="color: black;">Search</button>
      </form>
    </div>
  </div>
</nav>
    
    <h1 style="margin-top: 40px;">Bienvenido <?php echo $session->get("username");?></h1>

   

<main>
    


    <?php if($permiso== 1):?>
      <a href="<?php echo base_url("/new_esp"); ?>"><button class="button2">Añadir nuevo Esp32</button></a><br><br>
    <?php endif;?>
    <?php if (isset($datos) && !empty($datos)): ?>
    <h2>Tus Esp disponibles</h2>
    
    <ul>
        <?php foreach ($datos as $esp): ?>
            <li>
              <form action="<?php echo base_url("/esp32"); ?>" method="post">

                <input type="hidden" name="esp_id" value="<?php echo $esp["ID_dispositivo"];?> ">

                <button class="button2" type="submit" > <?php  echo $esp["ubicacion"];?> </button>

              </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hay ESP32 disponibles.</p>
<?php endif; ?>


</main>




<style>
 .button2 {
  margin: 2px;
 width: 9em;
 height: 3em;
 border-radius: 30em;
 font-size: 15px;
 font-family: inherit;
 border: none;
 position: relative;
 overflow: hidden;
 z-index: 1;
 box-shadow: 1,5px 1,5px 4px #c5c5c5, 0px 0px 3px #ffffff;
}

.button2::before {
 content: '';
 width: 0;
 height: 3em;
 border-radius: 30em;
 position: absolute;
 top: 0;
 left: 0;
 background-image: linear-gradient(to right, #fa8560 0%, #ffddaa 100%);
 transition: .5s ease;
 display: block;
 z-index: -1;
}

.button2:hover::before {
 width: 9em;
}
</style>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>