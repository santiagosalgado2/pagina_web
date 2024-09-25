<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecutar Código en ESP32</title>
    <script>
        function enviarIR() {
            fetch('http://localhost/pagina_web/pagina_web/public/sendIR') // Asegúrate de que esta sea la ruta correcta
                .then(response => response.text())
                .then(data => {
                    console.log(data); // Muestra la respuesta en la consola
                    alert(data); // Muestra una alerta con la respuesta
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</head>
<body>
    <h1>Controlar ESP32</h1>

    <!-- Formulario con el botón -->
    <button onclick="enviarIR()">Enviar Señales IR</button>

</body>
</html>
