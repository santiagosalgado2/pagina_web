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
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("/css/userinfostyle.css");?>">
    <title>Document</title>
</head>
<body>
    
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    
    <nav class="navbar navbar-expand-lg fixed-top" style="  background: linear-gradient(135deg, #f72611,#faa72b);">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?php echo base_url("/") ;?>" style="color: black;">
      <img src="<?php echo base_url("/img/logo1.png") ;?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      IRconnect
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("/") ;?>" style="color: black;">Inicio</a>
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
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
        <button class="btn btn-outline-success" type="submit" style="color: black;">Search</button>
      </form>
    </div>
  </div>
</nav>

    <center>
    <div class="container">
      <h1><?php 
        if($session->getFlashdata("error")){
            echo $session->getFlashdata("error");
        }
        if($session->getFlashdata("success")){
            echo $session->getFlashdata("success");
        }
      ?>
      </h1>
        <h1>Informacion de tu usuario</h1>
            <ul class="info">
                <li><b>Nombre de usuario: </b><?php echo $data[0]["nombre_usuario"]; ?>   <a href="<?php echo base_url("/change_user"); ?>"><button class="button2">Cambiar</button></a></li>
                <li><b>Contraseña: </b>********  <a href=<?php echo base_url("/generate/recuperar_contrasena"); ?>><button class="button2">Reestablecer</button></a></li>
                <li><b>Dirección de e-mail: </b><?php echo $data[0]["email"]; ?>   <a href="<?php echo base_url("/change_email"); ?>"></a></li>
                <li><b>Fecha de creación: </b><?php echo $data[0]["fecha_creacion"]; ?></li>
                <?php if(isset($admin)):?>
                <li><b>Tipo de usuario: </b>Profesor</li>
                <li><b>Administrador: </b><?php echo $admin[0]["nombre_usuario"]; ?></li>
                <?php else:?>
                <li><b>Tipo de usuario: </b>Administrador</li>
                <?php endif;?>
                <a href="<?php echo base_url("/");?>"><button class="button2">Volver</button></a>
            </ul>
    </div>        
    </center>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>