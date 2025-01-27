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
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
 
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
                    $grabar=base_url('/grabar_aire');
                } elseif ($d["ID_tipo"] == 2) {
                    $url = base_url('/prueba_control');
                    $grabar=base_url('/grabar_tele');
                } else {
                    $url = base_url('/prueba_ventiladorcontrol');
                    $grabar=base_url('/grabar_ventilador'); 
                }
            ?>
        <tr>
            <td><?php echo $d["nombre"];?> </td>
        
            <td>
            <form action="<?php echo $url;?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $d['ID_dispositivo'];?>">
                  <button class="button2" type="submit">Controlar</button></a>
                </form>
                <?php
                if($permiso==1):?>  
                <form action="<?php echo base_url('/edit_device');?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $d['ID_dispositivo'];?>">
                  <button class="button2" type="submit">Editar</button></a>
                </form>
                <button class="button2" onclick="deleteDevice('<?php echo base_url('/delete_device/'.$d['ID_dispositivo']);?>')">Eliminar</button>
                <form action="<?php echo $grabar;?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $d['ID_dispositivo'];?>">
                  <button class="button2" type="submit">Grabar señales</button></a>
                </form>

                <?php endif;?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>

    </table>

    <?php else:?>
      <br><br>
    <h1>No hay dispositivos vinculados a este esp32</h1>
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


<style>
  body {
    height: 100vh;
    background: linear-gradient(135deg, #2C3E50, #4CA1AF); /* Azul marino a azul petróleo */
    color: #333333; /* Gris carbón para el texto */
}

/* Barra de navegación */
nav.navbar {
    background: linear-gradient(135deg, #0F2027, #203A43, #2C5364); /* Negro a azul oscuro */
}

/* Links de navegación */
.navbar .nav-link {
    color: #BDC3C7; /* Gris claro */
}

.navbar .nav-link:hover {
    color: #2980B9; /* Azul profundo */
}

.circulo {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    animation: flotando 10s infinite ease-in-out;
}

.circulo:nth-child(1) {
    width: 200px;
    height: 200px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.circulo:nth-child(2) {
    width: 150px;
    height: 150px;
    top: 70%;
    left: 30%;
    animation-delay: 2s;
}

.circulo:nth-child(3) {
    width: 300px;
    height: 300px;
    top: 40%;
    right: 10%;
    animation-delay: 4s;
}

.circulo:nth-child(4) {
    width: 100px;
    height: 100px;
    bottom: 15%;
    right: 40%;
    animation-delay: 6s;
}
@keyframes flotando{0%, 100% {
    transform: translateY(0) translateX(0);
}
50% {
    transform: translateY(-50px) translateX(50px);
}}
.textos {
    font-size: larger;
    font-weight: 600;
}
.button2 {
    display: inline-block;
    transition: all 0.2s ease-in;
    position: relative;
    overflow: hidden;
    z-index: 1;
    color: #ffffff;
    padding: 0.2em 0,5em;
    cursor: pointer;
    font-size: 14px;
    border-radius: 0.5em;
    background: #2C3E50;
    border: 1px solid #2C3E50;
    box-shadow: 1px 1px 4px #c5c5c5, 0px 0px 3px #ffffff;

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
    border: 1px solid #2C3E50;
}

.button2:hover:before {
    top: -35%;
    background-image: linear-gradient(to right, #2980B9 0%, #4CA1AF 100%);
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
}


table {
    min-width: 700px;
    border-collapse: collapse;
    margin: 0 auto;
    border:2px solid #2C3E50;
    border-radius: 12px;
    background-color: #4CA1AF;
    color: #000000;
  }

  td,tr,th {
    border: 1px solid #2C3E50;
    padding: 8px;
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
    color: white;
    
  }
</style>
</body>
</html>