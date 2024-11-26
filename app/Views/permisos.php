<?php
$resultado = [];

foreach ($permisos as $permiso) {
    $idUsuario = $permiso['Id_usuario'];
    $idDispositivo = $permiso['ID_dispositivo'];
    if (isset($resultado[$idUsuario])) {
        $resultado[$idUsuario][] = $idDispositivo;
    } else {
        $resultado[$idUsuario] = [$idDispositivo]; // Creamos el array si no existe
    }
}

$permiso=session()->get('tipo');
#var_dump($resultado);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("/css/permisosstyle.css") . '?v=' . time(); ?>">
    <title>Administrar permisos de <?php echo $user[0]['nombre_usuario']; ?></title>
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

<div>-</div>
<div>-</div>
<div>-</div>


<h1><center  style="color: white;">Administrar Permisos de <?php echo $user[0]['nombre_usuario']; ?></center></h1>
       
    <form action="<?php echo base_url('/actualizar_permiso');?>" method="POST">
    
    <?php foreach ($datos as $ubicacion => $dispositivos): ?>
        <?php if (count($dispositivos) > 0): ?>
            <table>
                <caption><?php echo $ubicacion;?></caption>
                <tr>
                    <th>Nombre del dispositivo</th>
                    <th>Acceso</th>
                </tr>
                <?php foreach ($dispositivos as $disp): ?>
                    <?php
                    
                    if(isset($resultado[$user[0]['ID_usuario']]) && in_array($disp['ID_dispositivo'], $resultado[$user[0]['ID_usuario']])) {
                        $permiso2 = true;
                    } else {
                        $permiso2 = false;
                    }
                        
                    ?>
                    <tr>
                        <td><?php echo $disp['nombre']; ?></td>
                        <td>
                        
                            <input type="hidden" name="user" value="<?php echo $user[0]['ID_usuario']; ?>">
                            <select name="permiso[<?php echo $disp['ID_dispositivo']; ?>]" class="form-select" aria-label="Default select example">
                                    <option value="permitido" <?php echo $permiso2 == true ? 'selected' : ''; ?>>Permitido</option>
                                    <option value="denegado" <?php echo $permiso2 == false ? 'selected' : ''; ?>>Denegado</option>
                            </select>
                        
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="acciones">

    <center><button type="submit" class="button2">Actualizar permisos de <?php echo $user[0]['nombre_usuario']; ?></button></center>
    </div>
    </form>
  




</body>
</html>