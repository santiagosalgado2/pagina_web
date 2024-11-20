<?php
$session=session();

$ip=$session->get('esp_ip');

$subir_volumen  = [
    2650, 950,
    500, 800, 500, 400, 500, 400, 500, 800,
    800, 500, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 400, 500, 350, 950, 850,
    500, 350, 550, 350, 500, 400, 500
];

// Apagar
$apagar = [
    2800, 850,
    500, 800, 500, 400, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 350, 550, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    950, 400, 500, 850, 500, 350, 500
];

// Bajar volumen
$bajar_volumen = [
    2750, 850,
    500, 800, 500, 400, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 350, 550, 350, 500, 400,
    500, 400, 500, 350, 500, 400, 950, 850,
    500, 350, 500, 400, 950
];

$canalup = [
    2750, 900,
    500, 800, 500, 400, 500, 400, 500, 800,
    850, 450, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 950, 850, 500, 350, 950, 400,
    500, 850, 500, 350, 500
];

$canaldown = [
    2800, 800,
    500, 850, 500, 400, 500, 400, 450, 850,
    900, 400, 500, 400, 450, 400, 500, 400,
    500, 400, 500, 400, 450, 400, 500, 400,
    500, 400, 950, 800, 500, 400, 950, 400,
    500, 800, 950
];

$mute= [
    2800, 850,
    450, 850, 500, 400, 500, 400, 450, 850,
    900, 400, 500, 400, 450, 400, 500, 400,
    500, 400, 500, 400, 450, 400, 500, 400,
    500, 400, 500, 400, 450, 400, 500, 400,
    950, 400, 500, 800, 950
];

$home= [
    2750, 850,
    500, 850, 500, 400, 500, 350, 500, 800,
    950, 400, 500, 350, 500, 400, 500, 400,
    500, 400, 500, 350, 500, 400, 500, 400,
    500, 400, 900, 850, 950, 850, 900, 850,
    500, 400, 500
];
$ok= [
    2800, 800,
    500, 850, 500, 400, 500, 350, 1400, 1250,
    500, 350, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 400,
    950, 800, 950, 400, 500, 400, 500, 800,
    500, 400, 500
];

$uparrow= [
    2800, 850,
    450, 850, 500, 400, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 950, 850, 900, 400, 500, 850,
    500, 400, 450, 400, 500
];

$leftarrow= [
    2800, 800,
    500, 850, 500, 400, 500, 400, 500, 800,
    900, 400, 500, 400, 450, 400, 500, 400,
    500, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 950, 800, 950, 400, 500, 850,
    950, 800, 500
];

$rightarrow= [
    2750, 850,
    450, 900, 450, 450, 450, 400, 450, 850,
    900, 400, 500, 400, 450, 450, 450, 450,
    450, 450, 450, 400, 450, 450, 450, 450,
    450, 450, 850, 900, 900, 450, 400, 900,
    900, 450, 450
];

$downarrow= [
    2700, 900,
    500, 850, 500, 400, 500, 350, 500, 800,
    850, 450, 550, 350, 500, 400, 500, 400,
    500, 400, 500, 350, 500, 400, 500, 400,
    500, 400, 950, 800, 950, 400, 500, 800,
    550, 350, 950
];

$uno= [
    2650, 950,
    500, 800, 550, 350, 500, 400, 500, 800,
    800, 500, 500, 400, 500, 350, 550, 350,
    500, 400, 500, 400, 500, 350, 550, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 350, 950
];

$dos= [
    2700, 900,
    500, 800, 500, 400, 500, 400, 500, 800,
    850, 450, 500, 400, 500, 350, 550, 350,
    500, 400, 500, 400, 500, 350, 550, 350,
    500, 400, 500, 400, 500, 350, 550, 350,
    500, 400, 500, 400, 950, 800, 500
];

$tres= [
    2750, 850,
    500, 850, 500, 400, 500, 350, 500, 800,
    900, 400, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 950, 400, 500
];

$cuatro= [
    2750, 850,
    500, 850, 500, 350, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 950, 850, 500, 350, 500
];

$cinco= [
    2750, 850,
    500, 800, 500, 400, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 400, 450, 400,
    500, 400, 500, 400, 500, 400, 450, 400,
    500, 400, 500, 400, 500, 400, 450, 400,
    500, 400, 950, 800, 950
];

$seis= [
    2750, 850,
    500, 850, 500, 350, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 950, 400, 500, 800, 500
];

$siete= [
    2700, 900,
    500, 850, 500, 400, 500, 350, 500, 800,
    850, 450, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 400,
    500, 350, 950, 400, 500, 400, 500
];

$ocho= [
    2750, 850,
    450, 850, 500, 400, 500, 400, 500, 800,
    900, 400, 500, 350, 500, 400, 500, 400,
    500, 400, 500, 350, 500, 400, 500, 400,
    500, 400, 500, 350, 500, 400, 500, 400,
    950, 800, 500, 400, 500, 400, 500
];

$nueve= [
    2750, 850,
    500, 850, 450, 400, 500, 400, 500, 800,
    900, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    500, 400, 500, 400, 500, 400, 500, 350,
    950, 850, 500, 400, 900
];

$cero= [
    2700, 900,
    500, 850, 500, 400, 500, 350, 500, 800,
    850, 450, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 400,
    500, 350, 500, 400, 500, 400, 500, 350,
    550, 350, 500, 400, 500, 400, 500, 350,
    550
];

$tres_puntitos= [
    2750, 850,
    550, 800, 500, 400, 500, 400, 500, 800,
    850, 450, 500, 350, 500, 400, 500, 400,
    500, 400, 500, 350, 500, 400, 500, 400,
    950, 350, 550, 800, 500, 400, 950, 350,
    500, 850, 500, 400, 500
];

$input= [
    2700, 900,
    500, 800, 500, 400, 500, 400, 500, 800,
    850, 450, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 400, 950, 350, 500, 400,
    500, 850, 500, 350, 500, 400, 500
];

$config= [
    2700, 900,
    500, 800, 500, 400, 500, 400, 500, 800,
    850, 450, 500, 400, 500, 350, 500, 400,
    500, 400, 500, 400, 500, 350, 500, 400,
    500, 400, 950, 800, 500, 400, 500, 400,
    500, 350, 550, 350, 500, 400, 500
];

$back= [
    2700, 900,
    500, 850, 450, 450, 450, 400, 500, 800,
    850, 500, 450, 400, 500, 400, 450, 450,
    450, 450, 450, 400, 500, 400, 450, 450,
    450, 450, 450, 400, 500, 400, 450, 450,
    950, 800, 950, 850, 500
];
# Netflix reemplaza al boton smart tv del control original
$netflix = [
    2750, 850,
    450, 850, 500, 400, 500, 400, 450, 800,
    950, 400, 500, 350, 500, 400, 500, 400,
    500, 400, 450, 400, 500, 400, 500, 400,
    900, 850, 950, 400, 500, 400, 450, 400,
    500, 400, 500, 850, 450
];

$rawData = [

    9050, 4550,
    550, 600,
    600, 550,
    650, 500,
    600, 550,
    600, 500,
    600, 550,
    600, 550,
    600, 550,
    600,1650,
    600, 1650,
    600, 1650,
    600, 1650,
    600, 1650,
    600, 1650,
    600, 1600,
    650, 1650,
    600, 1650,
    600, 500,
    650, 1600,
    650, 500,
    650, 500,
    650, 500,
    600, 1650,
    600, 550,
    600, 500,
    650, 1600,
    650, 500,
    650, 1600,
    650, 1600,
    650, 1600,
    650, 500,
    600, 1650,
    600
];



$subir_volumen_string = implode(',', $subir_volumen);
$apagar_string = implode(',', $apagar);
$bajar_volumen_string = implode(',', $bajar_volumen);
$netflix_string = implode(',', $netflix);
$rawData_string = implode(',', $rawData);
$canalup_string = implode(',', $canalup);
$canaldown_string = implode(',', $canaldown);
$mute_string = implode(',', $mute);
$home_string = implode(',', $home);
$ok_string = implode(',', $ok);
$uparrow_string = implode(',', $uparrow);
$leftarrow_string = implode(',', $leftarrow);
$rightarrow_string = implode(',', $rightarrow);
$downarrow_string = implode(',', $downarrow);
$uno_string = implode(',', $uno);
$dos_string = implode(',', $dos);
$tres_string = implode(',', $tres);
$cuatro_string = implode(',', $cuatro);
$cinco_string = implode(',', $cinco);
$seis_string = implode(',', $seis);
$siete_string = implode(',', $siete);
$ocho_string = implode(',', $ocho);
$nueve_string = implode(',', $nueve);
$cero_string = implode(',', $cero);
$tres_puntitos_string = implode(',', $tres_puntitos);
$input_string = implode(',', $input);
$config_string = implode(',', $config);
$back_string = implode(',', $back);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de televisor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url("/css/styletv.css") . '?v=' . time(); ?>">
</head>

<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>


    <?php
    $session = session();

    $permiso = $session->get("tipo");
?>

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
    <!--container-->
    <div class="container">
        <div class="d-flex flex-row justify-content-between px-3 py-4 align-items-center">
            <i class="fas fa-chevron-left"></i>
            <span>AULA TV</span>
            <i class="fas fa-ellipsis-h"></i>
        </div>

        <div class="d-flex flex-row justify-content-center">
            <div class="menu-grid">
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('<?php echo $apagar_string;?>','<?php echo $ip;?>')">
                    <i class="fas fa-power-off active"></i>
                    <span class="label">Power</span>
                </div>
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('<?php echo $input_string;?>','<?php echo $ip;?>')">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="label">Input</span>
                </div>
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('<?php echo $config_string;?>','<?php echo $ip;?>')">
                    <i class="fas fa-cog"></i>
                    <span class="label">Control</span>
                </div>
                <div class="d-flex flex-column align-items-center"> 
                    <i class="fas fa-bars"></i>
                    <span class="label">Menu</span>
                </div>
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('<?php echo $netflix_string;?>','<?php echo $ip;?>')">
                    <i class="fas fa-circle"></i>
                    <span class="label">Netflix</span>
                </div>
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('<?php echo $back_string;?>','<?php echo $ip;?>')">
                    <i class="fas fa-arrow-left"></i>
                    <span class="label">Back</span>
                </div>
            </div>
        </div>

        <div class="d-flex flex-row mt-4 justify-content-between px-2">
            <div class="d-flex flex-column rounded-bg py-3 px-4 justify-content-center align-items-center">
                <i class="fas fa-chevron-up py-3 control-icon" onclick="enviarIR('<?php echo $canalup_string;?>','<?php echo $ip;?>')"></i>
                <span class="label py-3">Channel</span>
                <i class="fas fa-chevron-down py-3 control-icon" onclick="enviarIR('<?php echo $canaldown_string;?>','<?php echo $ip;?>')"></i>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex flex-row grey-bg justify-content-center align-items-center">
                    <i class="fas fa-home p-3 home-icon" onclick="enviarHex('<?php echo $home_string;?>','<?php echo session()->get('esp_ip');?>')"></i>
                </div>
                <span class="label">Home</span>
            </div>
            <div class="d-flex flex-column rounded-bg py-3 px-4 justify-content-center align-items-center">
                <i class="fas fa-plus py-3 control-icon" onclick="enviarIR('<?php echo $subir_volumen_string;?>','<?php echo $ip;?>')"></i>
                <span class="label py-3">Volume</span>
                <i class="fas fa-minus py-3 control-icon" onclick="enviarIR('<?php echo $bajar_volumen_string;?>','<?php echo $ip;?>')"></i>
            </div>
        </div>

        <div class="mt-5 pt-4 position-relative d-flex flex-row justify-content-center align-items-center">
            <div class="circle ok-inner position-absolute" onclick="enviarIR('<?php echo $ok_string;?>','<?php echo $ip;?>')">
                <span>OK</span>
            </div>
            <div class="circle ok-outer position-absolute"></div>
            <i class="fas fa-caret-right position-absolute control-icon right" onclick="enviarIR('<?php echo $rightarrow_string;?>','<?php echo $ip;?>')"></i>
            <i class="fas fa-caret-right position-absolute control-icon bottom" onclick="enviarIR('<?php echo $downarrow_string;?>','<?php echo $ip;?>')"></i>
            <i class="fas fa-caret-right position-absolute control-icon left" onclick="enviarIR('<?php echo $leftarrow_string;?>','<?php echo $ip;?>')"></i>
            <i class="fas fa-caret-right position-absolute control-icon top" onclick="enviarIR('<?php echo $uparrow_string;?>','<?php echo $ip;?>')"></i>
        </div>

        <div class="d-flex flex-row justify-content-between mt-5 pt-4 px-3">
            <div class="d-flex flex-row grey-bg">
                <i class="fas fa-ellipsis-h p-3 control-icon" onclick="enviarIR('<?php echo $tres_puntitos_string;?>','<?php echo $ip;?>')"></i>
            </div>
            <div class="d-flex flex-row grey-bg">
                <i class="fas fa-volume-mute p-3 control-icon" onclick="enviarIR('<?php echo $mute_string;?>','<?php echo $ip;?>')"></i>
            </div>
        </div>
        <div>
        <button class="button-small" onclick="enviarIR('<?php echo $uno_string;?>','<?php echo $ip;?>')">1</button>
        <button class="button-small" onclick="enviarIR('<?php echo $dos_string;?>','<?php echo $ip;?>')">2</button>
        <button class="button-small" onclick="enviarIR('<?php echo $tres_string;?>','<?php echo $ip;?>')">3</button>
    </div>
    <div>
        <button class="button-small" onclick="enviarIR('<?php echo $cuatro_string;?>','<?php echo $ip;?>')">4</button>
        <button class="button-small" onclick="enviarIR('<?php echo $cinco_string;?>','<?php echo $ip;?>')">5</button>
        <button class="button-small" onclick="enviarIR('<?php echo $seis_string;?>','<?php echo $ip;?>')">6</button>
    </div>
    <div>
        <button class="button-small" onclick="enviarIR('<?php echo $siete_string;?>','<?php echo $ip;?>')">7</button>
        <button class="button-small" onclick="enviarIR('<?php echo $ocho_string;?>','<?php echo $ip;?>')">8</button>
        <button class="button-small" onclick="enviarIR('<?php echo $nueve_string;?>','<?php echo $ip;?>')">9</button>
    </div>
        <button class="button-rect" onclick="enviarIR('<?php echo $cero_string;?>','<?php echo $ip;?>')">0</button>
    </div>
</div>
    </div>



    <script src="<?php echo base_url('/js/sendIR.js');?>">

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




</body>

</html>