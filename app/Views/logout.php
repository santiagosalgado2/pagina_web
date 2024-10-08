<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css");?>">
    <title>Cerrar sesion</title>
</head>
<body>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    <h1 style="color: black;" class="mensaje">Sesion cerrada correctamente</h1>

    <a href="<?php echo base_url("/");?> " class="boton"> Iniciar sesion nuevamente </a>
    
<style>
    .mensaje {
    color: #333; /* Color de texto oscuro */
    font-family: 'Arial', sans-serif;
    text-align: center;
    margin-top: 100px;
    font-size: 28px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Sombra de texto */
}

.boton {
    display: inline-block;
    padding: 12px 24px;
    margin-top: 20px;
    background-color: #f44336; /* Color rojo */
    color: white;
    text-align: center;
    font-size: 18px;
    text-decoration: none;
    border-radius: 8px;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2); /* Sombra en el botón */
    transition: background-color 0.3s ease;
}

.boton:hover {
    background-color: #d32f2f; /* Color más oscuro al pasar el mouse */
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.4); /* Aumentar sombra en hover */
}



</style>


</body>
</html>