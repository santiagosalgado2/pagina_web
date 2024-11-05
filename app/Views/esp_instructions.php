<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <title>Instrucciones de conexión</title>
</head>
<body>

<div class="circulo"></div>
<div class="circulo"></div>
<div class="circulo"></div>
<div class="circulo"></div>

<h2>Sigue los siguientes pasos para vincular un nuevo Esp32</h2>

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
    <li>En unos segundos recibirá un mail para verificar si el dispositivo se vinculo correctamente</li>
    </b>

</ul>

<style>
    body {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    background: linear-gradient(135deg, #ff7e5f, #feb47b);
    margin: 0;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    min-height: 160vh;
    overflow-y: auto;
}

h2 {
    color: black;
    margin-bottom: 20px;
    text-align: center;
    font-size: 32px;
    font-weight: 900;
    text-transform: capitalize;
    letter-spacing: 2px;
}

ul {
    list-style-type: none;
    padding: 0;
    max-width: 600px;
    margin: 0 auto;
}

li {
    background: rgba(211, 64, 64, 0.849);
    margin: 15px 0;
    padding: 15px 20px; /* Ajusta el padding para un mejor espaciado */
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s, box-shadow 0.3s;
    font-size: 20px;
    line-height: 1.8;
    color: white;
    min-height: 50px; /* Asegura que las cajas no sean demasiado pequeñas */
}

li:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
}

li img {
    display: block;
    margin: 10px 0;
    max-width: 100%;
    height: auto;
    width: auto;
    max-height: 150px;
}

b {
    color: lightgreen;
    font-weight: bold;
}

p {
    margin: 10px 0;
    text-align: justify;
}

a {
    color: #2980b9;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

a:hover {
    color: #1abc9c;
    text-decoration: underline;
}
</style>


</body>
</html>