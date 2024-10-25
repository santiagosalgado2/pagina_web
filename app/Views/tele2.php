<?php
$session=session();

$ip=$session->get('esp_ip');

$subir_volumen = [
    4100, 3950, 550, 1950, 550, 1950, 550, 1950, 550, 1950,
    550, 950, 550, 1000, 500, 2000, 500, 1000,
    550, 1950, 500, 2000, 550, 1950, 500, 2000,
    500, 1000, 500, 1000, 550, 950, 550, 950,
    550, 1950, 550, 1950, 550, 1000, 500, 2000,
    500, 1000, 500, 1000, 500, 1000, 500, 1000,
    500
];

// Apagar
$apagar = [
    4050, 4000, 500, 2000, 500, 1950, 550, 2000, 500, 2000,
    500, 1000, 550, 950, 550, 1950, 550, 950,
    550, 1950, 550, 950, 550, 2000, 500, 1000,
    500, 1000, 500, 1000, 500, 1000, 500, 1000,
    500, 2000, 500, 2000, 500, 1000, 550, 1950,
    550, 950, 550, 1950, 550, 950, 550, 1950,
    550
];

// Bajar volumen
$bajar_volumen = [
    4100, 3950, 550, 1950, 550, 1950, 550, 1950, 550, 1950,
    550, 950, 550, 950, 550, 2000, 550, 950,
    550, 1950, 500, 2000, 500, 2000, 500, 1000,
    500, 1000, 500, 1000, 500, 1000, 550, 950,
    550, 1950, 550, 1950, 550, 950, 500, 2050,
    450, 1000, 550, 1000, 450, 1050, 500, 2000,
    500
];

// Netflix
$netflix = [
    4050, 4000, 500, 2000, 500, 1950, 550, 2000, 500, 2000,
    550, 1950, 550, 1950, 550, 1950, 550, 950,
    550, 1950, 550, 1950, 550, 2000, 500, 2000,
    500, 1000, 500, 950, 550, 1000, 500, 1000,
    500, 1000, 500, 1000, 500, 2000, 550, 950,
    550, 950, 550, 950, 550, 950, 550, 950,
    550
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remote Control App | theuicode.com </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url("/css/styletv.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>">

</head>

<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>


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
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('0x38','0x10038','<?php echo $ip;?>')">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="label">Input</span>
                </div>
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('0x40','0x10040','<?php echo $ip;?>')">
                    <i class="fas fa-cog"></i>
                    <span class="label">Control</span>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <i class="fas fa-bars"></i>
                    <span class="label">Menu</span>
                </div>
                <div class="d-flex flex-column align-items-center" onclick="enviarIR('<?php echo $rawData_string;?>','<?php echo $ip;?>')">
                    <i class="fas fa-circle"></i>
                    <span class="label">Netflix</span>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <i class="fas fa-arrow-left"></i>
                    <span class="label">Back</span>
                </div>
            </div>
        </div>

        <div class="d-flex flex-row mt-4 justify-content-between px-2">
            <div class="d-flex flex-column rounded-bg py-3 px-4 justify-content-center align-items-center">
                <i class="fas fa-chevron-up py-3 control-icon"></i>
                <span class="label py-3">Channel</span>
                <i class="fas fa-chevron-down py-3 control-icon"></i>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex flex-row grey-bg justify-content-center align-items-center">
                    <i class="fas fa-home p-3 home-icon" onclick="enviarHex('0xBA45FF00','NEC',32,<?php echo session()->get('esp_ip');?>)"></i>
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
            <div class="circle ok-inner position-absolute">
                <span>OK</span>
            </div>
            <div class="circle ok-outer position-absolute"></div>
            <i class="fas fa-caret-right position-absolute control-icon right"></i>
            <i class="fas fa-caret-right position-absolute control-icon bottom"></i>
            <i class="fas fa-caret-right position-absolute control-icon left"></i>
            <i class="fas fa-caret-right position-absolute control-icon top" onclick="enviarIR('0x40','0x10040','<?php echo $ip;?>')"></i>
        </div>

        <div class="d-flex flex-row justify-content-between mt-5 pt-4 px-3">
            <div class="d-flex flex-row grey-bg">
                <i class="fas fa-ellipsis-h p-3 control-icon"></i>
            </div>
            <div class="d-flex flex-row grey-bg">
                <i class="fas fa-volume-mute p-3 control-icon"></i>
            </div>
        </div>
        <div>
        <button class="button-small">1</button>
        <button class="button-small">2</button>
        <button class="button-small">3</button>
    </div>
    <div>
        <button class="button-small">4</button>
        <button class="button-small">5</button>
        <button class="button-small">6</button>
    </div>
    <div>
        <button class="button-small">7</button>
        <button class="button-small">8</button>
        <button class="button-small">9</button>
    </div>
        <button class="button-rect">0</button>
    </div>
</div>
    </div>



    <script src="<?php echo base_url('/js/sendIR.js');?>">

    </script>





</body>

</html>