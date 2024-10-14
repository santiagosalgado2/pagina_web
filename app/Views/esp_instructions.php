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
body {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    background: linear-gradient(135deg, #ff5a3c, #eb4930, #ee695a, #fa8560, #fcb185, #ffddaa);
    margin: 0;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    min-height: 145vh;
    overflow-y: auto; /* Permite el desplazamiento vertical */
}

h2 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

ul {
    list-style-type: none;
    padding: 0;
    max-width: 600px;
    margin: 0 auto;
}

li {
    background: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
    margin: 10px 0;
    padding: 20px; /* Ajusta el padding para un mejor espaciado */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.2s, box-shadow 0.2s;
    font-size: 18px;
    line-height: 1.6;
    color: #444;
}

li:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

li img {
    display: block;
    margin: 10px 0;
    max-width: 100%;
    height: auto;
    width: auto;
    max-height: 120px; /* Ajusta la altura máxima de las imágenes */
}

b {
    color: #3498db;
    font-weight: bold;
}

p {
    margin: 10px 0;
    text-align: justify;
}

a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}
</style>



</body>
</html>