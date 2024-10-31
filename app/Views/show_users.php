<?php
    $session = session();

    $permiso = $session->get("tipo");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>">     
    <link rel="stylesheet" href="<?php echo base_url("/css/userstyle.css");?>">     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

      table {
        min-width: 700px;
        border-collapse: collapse;
        margin: 0 auto;
        border:2px solid #ff9999;
        border-radius: 12px;
        background-color: rgba(211, 64, 64, 0.849);
        color: white;
      }

      td,tr,th {
        border: 1px solid #ff9999;
        padding: 10px;
        text-align: center;
        font-size: 20px;
      }
      .acciones{
        text-align: center;
        margin: 0 auto;
        margin-bottom: 33px;
        
      }
      .acciones button {
        font-size: 18px;
        padding: 15px 30px;
      }

      h1{
        text-align: center;
        margin-bottom: 37px;
      }
    </style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>