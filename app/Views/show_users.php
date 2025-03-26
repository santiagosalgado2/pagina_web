<?php
    $session = session();

    $permiso = $session->get("tipo");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
  
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
  <link rel="stylesheet" href="<?php echo base_url("/css/userstyle.css") . '?v=' . time(); ?>">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
    <title>Lista de usuarios</title>
</head>
<body style="background-color: rgb(207, 226, 255); ">


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

 <div class="container mt-5 pt-5">
        <center><h1 class="mb-4">Información de tus usuarios</h1></center>
        
        <div class="d-flex flex-wrap gap-2 mb-4 acciones">
            <a href="<?php echo base_url('/new_user');?>" class="btn btn-success">Crear un nuevo usuario</a>
        </div>
        
        <?php 
        $error_data = $session->getFlashdata("error");
        if($error_data): ?>
            <div class="alert alert-danger"><?php echo $error_data; ?></div>
        <?php endif; ?>
        
        <?php 
        $success = session()->getFlashdata('success');
        if(isset($success)): ?>
            <div class="alert alert-success text-center">✔ <?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if(isset($datos) && !empty($datos)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Dirección de E-mail</th>
                            <th>Fecha de creación</th>
                            <th class="actions-header">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($datos as $d): ?>
                            <tr>
                                <td><?php echo $d["nombre_usuario"]; ?></td>
                                <td><?php echo $d["email"]; ?></td>
                                <td><?php echo $d["fecha_creacion"]; ?></td>
                                <td>
                                    <form action="<?php echo base_url('/permisos'); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $d["ID_usuario"]; ?>">
                                        <button type="submit" class="btn btn-primary">Administrar permisos</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">No tienes usuarios creados</div>
        <?php endif; ?>
    </div>
 

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>