<?php
    $session = session();

    $permiso = $session->get("tipo");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido <?php echo $session->get('username');?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("/css/style.css") . '?v=' . time(); ?>">
</head>
<body class="p-3 mb-2 bg-primary-subtle text-primary-emphasis">

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
    


    
    <h1 style="margin-top: 40px;">Bienvenido <?php echo $session->get("username");?></h1>

   

<main>
<?php if(isset($success)): ?>
  <center>
    <div style="background-color: green; border: 1px solid green; padding: 10px; border-radius: 5px; height:70px; width: 220px; ">
        ✔ <?php echo $success; ?>
    </div>
    </center>
<?php endif; ?>
<?php
$success2=$session->getFlashdata("success");
if($success2!=null){
    echo "<center><div style='background-color: green; border: 1px solid green; padding: 10px; border-radius: 5px; height:70px; width: 220px; '>
    ✔ $success2
    </div></center>";
}

?>
<?php
$error=$session->getFlashdata("error");
if($error!=null){
    echo "<center><div style='background-color: red; border: 1px solid red; padding: 10px; border-radius: 5px; height:70px; width: 220px; color:white;'>
    ❌ $error
    </div></center>";
}
?>
    <?php if($permiso== 1):?>
      <a href="<?php echo base_url("/new_esp"); ?>"><center><button class="button2">Añadir nuevo Esp32</button></center></a><br><br>
    <?php endif;?>
    <?php if (isset($datos) && !empty($datos)): ?>
    <h1>Tus Esp disponibles</h1>
    
    <ul>
        <?php foreach ($datos as $esp): ?>
            <li>
              <form action="<?php echo base_url("/esp32"); ?>" method="post">

                <input type="hidden" name="esp_id" value="<?php echo $esp["ID_dispositivo"];?> ">

                <input type="hidden" name="esp_ip" value="<?php echo $esp["direccion_ip"];?> ">

                <input type="hidden" name="esp_code" value="<?php echo $esp["codigo"];?> ">

                <center><button class="button2" type="submit" id="esp"> <?php  echo $esp["ubicacion"];?> </button></center>

              </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <h2>No hay ESP32 disponibles.</h2>
<?php endif; ?>


</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>