<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>">
    <title>Document</title>
</head>
<body>

<div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    <div class="form-container">
        <h1>Editar dispositivo seleccionado</h1>
    <form action="<?php echo base_url("/edit_device/update");?>" method="post">
    <div class="mb-3">
        <input type="text" name="name" value="<?php echo $device[0]['nombre'];?>">
        <input type="hidden" name="id" value="<?php echo $device[0]['ID_dispositivo'];?>">
        <select name="device_type">
                    <option value="tv">TV</option>
                    <option value="aire_acondicionado">Aire Acondicionado</option>
                    <option value="ventilador">Ventilador</option>
                </select>
        <input type="submit" value="Editar">
        </div>
        
    </form>
    </div>


    <style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Altura completa de la ventana */
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f3f3f3; /* Color de fondo suave */
}

.form-container {
    background: rgba(211, 64, 64, 0.849);; /* Fondo blanco rojizo */
    padding: 40px; /* Más padding para un diseño espacioso */
    border-radius: 12px; /* Bordes más redondeados */
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada */
    width: 500px; /* Ajuste del ancho */
    border: 2px solid #ff9999; /* Borde suave */
}

.mb-3 input[type="text"] {
    width: 100%; /* Ocupa el ancho completo */
    padding: 14px; /* Más espaciado interno */
    margin: 15px 0; /* Mayor espaciado entre elementos */
    border: 1px solid #bbb; /* Borde gris claro */
    background: rgba(255, 255, 255, .1); /* Fondo translúcido */
    border-radius: 6px; /* Bordes más redondeados */
    font-size: 16px; /* Tamaño de fuente */
    box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
    transition: border-color 0.3s ease; /* Transición suave del borde */
    color: #333; /* Color del texto */
}

.mb-3 input[type="text"]:focus {
    border-color: #888; /* Cambio de color de borde al enfocar */
    outline: none; /* Quitar borde por defecto */
}

.mb-3 select {
    width: 100%; /* Ocupa el ancho completo */
    padding: 14px; /* Más espaciado interno */
    margin: 15px 0; /* Mayor espaciado entre elementos */
    border: 1px solid #bbb; /* Borde gris claro */
    background: rgba(255, 255, 255, .1); /* Fondo translúcido */
    border-radius: 6px; /* Bordes más redondeados */
    font-size: 16px; /* Tamaño de fuente */
    box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
    transition: border-color 0.3s ease; /* Transición suave del borde */
    color: #333; /* Color del texto */
}

.mb-3 select:focus {
    border-color: #888; /* Cambio de color de borde al enfocar */
    outline: none; /* Quitar borde por defecto */
}

.mb-3 input[type="submit"] {
    width: 100%; /* El botón ocupa el mismo ancho que los campos */
    padding: 14px; /* Espaciado interno */
    margin: 15px 0; /* Espaciado entre elementos */
    background-color: #ff4d4d; /* Color rojo más fuerte */
    color: black; /* Texto blanco */
    border: none; /* Sin borde */
    border-radius: 6px; /* Bordes redondeados */
    font-size: 16px; /* Tamaño de fuente */
    cursor: pointer; /* Cambiar cursor */
    transition: background-color 0.3s ease; /* Transición suave del color */
}

.mb-3 input[type="submit"]:hover {
    background-color: #cc0000; /* Color rojo más oscuro al pasar el mouse */
}

.textos {
    font-size: larger;
    font-weight: 600;
}

h1 {
    padding-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    
}
</style>


</body>
</html>