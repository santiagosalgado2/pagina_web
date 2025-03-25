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
    <!-- CSS PARA NAV -->
    <link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <!-- HASTA ACA. MODIFICAR LOS CSS DE C/ VISTA PARA QUE EL NAV QUEDE BIEN -->
    <link rel="stylesheet" href="<?php echo base_url("/css/style.css") . '?v=' . time(); ?>">
</head>
<body class="p-3 mb-2 bg-primary-subtle text-primary-emphasis">


    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    
          <a href="<?php echo base_url("/") ;?>" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
           <img src="<?php echo base_url("/img/logo1.png") ;?>"  alt="logo"> 
            <h1 class="sitename">IRConnect</h1>
          </a>
    
          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="<?php echo base_url("/") ;?>">Inicio</a></li>
              <li><a href="<?php echo base_url("/userInfo");?>">Mi usuario</a></li>
              <?php if($permiso==1):?>
              <li><a href="<?php echo base_url("/showUsers");?>">Administrar mis usuarios</a></li>
              <?php endif;?>
              <li><a href="<?php echo base_url("/logout");?>">Cerrar sesión</a></li>
              </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
    
    
        </div>
      </header>
    


    
    <h1 style="margin-top: 80px;" class="titulos">Bienvenido <?php echo $session->get("username");?></h1>

   


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
if($error!=null){?>
    <center><h2>
    ❌ <?php echo $error;?></h2>
    </center>
<?php
  }
?>
    <?php if($permiso== 1):?>
      <a href="<?php echo base_url("/new_esp"); ?>"><center><button class="button2">Añadir nuevo Esp32</button></center></a><br><br>
    <?php endif;?>
    <?php if (isset($datos) && !empty($datos)): ?>
    <h1 class="titulos">Tus Esp disponibles</h1>
    
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

<!-- SCRIPTS PARA NAV -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>