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
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css");?>">
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
      <img src="<?php echo base_url("/img/logo.png") ;?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Nombre_pagina
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url("/") ;?>" style="color: black;">Home</a>
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

    <center>
    <div class="container">
        <h1>Informacion de tu usuario</h1>
            <ul>
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
    <style>
        body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Altura completa de la ventana */
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f3f3f3; /* Color de fondo suave */
        }
        ul{
            list-style-position: inside;
            
        }
        .container{
            max-width: 100%;
            max-height: 100vh; /* Altura máxima no mayor al 100% del viewport */
            text-align: justify;
            background: rgba(211, 64, 64, 0.849);; /* Fondo blanco rojizo */
            padding: 40px; /* Más padding para un diseño espacioso */
            border-radius: 12px; /* Bordes más redondeados */
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada */
            width: 600px; /* Ajuste del ancho */
            border: 2px solid #ff9999; /* Borde suave */
            font-size: 18px;
        }
        button:hover {
            opacity: 1;
        }

        button:active {
            top: 4px;
            box-shadow: #c0392b 0px 3px 2px,#000 0px 3px 5px;
        }
        .button2 {
            display: inline-block;
            transition: all 0.2s ease-in;
            position: relative;
            overflow: hidden;
            z-index: 1;
            color: #090909;
            padding: 0.2em 0,5em;
            cursor: pointer;
            font-size: 14px;
            border-radius: 0.5em;
            background: #e8e8e8;
            border: 1px solid #e8e8e8;
            box-shadow: 1,5px 1,5px 4px #c5c5c5, 0px 0px 3px #ffffff;
  
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
            border: 1px solid #fa8560;
        }

        .button2:hover:before {
            top: -35%;
            background-color: #fa8560;
            transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
        }

        .button2:hover:after {
            top: -45%;
            background-color: #fa8560;
            transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
        }

    </style>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>