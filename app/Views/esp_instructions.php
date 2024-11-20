<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/instructions.css") . '?v=' . time(); ?>">

    <title>Instrucciones de conexión</title>
</head>
<body>

<div class="circulo"></div>
<div class="circulo"></div>
<div class="circulo"></div>
<div class="circulo"></div>

<h2 style="color:white;">Sigue los siguientes pasos para vincular un nuevo Esp32</h2>

<ul>
    <b>
    <li>Conecta tu Esp32 a la corriente</li>
    <li>Descarga la aplicación <b>EspTouch</b> en tu dispositivo móvil
    <img src="<?php echo base_url("/img/app.png"); ?>" alt="Aplicacion">
    </li>
    <li>Abre la aplicación y seleciona la primera opción (EspTouch)
    <img src="<?php echo base_url("/img/option1.png"); ?>" alt="Opcion 1">

    </li>
    <li>Ingresa la contraseña de la conexión Wi-Fi a la que estás conectado en tu dispositivo móvil (Ten en cuenta que debe ser la misma conexión a la que estás conectado a la página para lograr la vinculación)</li>
    <li>Presione el botón <b>Confirm</b></li>
    <li>Aguarde hasta ver un mensaje como este: 
    <img src="<?php echo base_url("/img/message.png"); ?>" alt="Mensaje de exito">

    </li>
    <li>En unos segundos recibirá un mail para verificar si el dispositivo se vinculo correctamente y será redirigido automáticamente a la página de inicio</li>
    </b>

</ul>

<script>


    document.addEventListener('DOMContentLoaded', function() {
        const code = '<?= $code ?>'; 
        const baseUrl = '<?= base_url() ?>';

        setInterval(() => {
            fetch(`${baseUrl}/return_after_vinculation/${code}`)
                .then(response => response.json())
                .then(data => {
                    if (data === true) {
                        window.location.href = `${baseUrl}?success=1`;
                    }
                })
                .catch(error => console.error('Error:', error));
        }, 1000); // 1000 ms = 1 segundo
    });


</script>

</body>
</html>