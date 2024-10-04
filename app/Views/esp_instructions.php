<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css");?>"> 
    <title>Document</title>
</head>
<body>

<div class="circulo"></div>
<div class="circulo"></div>
<div class="circulo"></div>
<div class="circulo"></div>

<h2>Sigue los siguientes pasos para vincular un nuevo Esp32</h2>

<ul>
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
    <li>En unos segundos recibirá un mail para verificar si el dispositivo se vinculo correctamente</li>
    

</ul>


<style>
    /* Estilos generales */
body {
    font-family: 'Arial', sans-serif;
    
}

/* Estilos para las instrucciones */
h2 {
    font-size: 26px;
    font-weight: bold;
    text-align: center;
    color: #fff;  /* Contraste en el título */
    margin-bottom: 30px;
}

/* Lista de pasos */
ul {
    list-style-type: none;
    padding: 0;
    margin: 0 auto;
    max-width: 800px;
}

ul li {
    font-size: 20px;
    margin-bottom: 30px;  /* Espacio entre los pasos */
    line-height: 1.6;
    color: #fff;
}

/* Imagenes */
ul li img {
    max-width: 100%;
    height: auto;
    margin-top: 15px;
    border: 3px solid #fff;  /* Añadir borde a las imágenes */
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Sombra suave */
}
</style>


</body>
</html>