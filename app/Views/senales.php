<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css") . '?v=' . time(); ?>">

    <title>Ver Señales</title>
    <script>
        function fetchSignals() {
            //ESTA FUNCION LO QUE HACE ES EJECUTAR EL CONTROLADOR DE ESA RUTA 
            //EL CONTROLADOR ENVIARA LAS SEÑALES ITERANDO EL ARCHIVO CSV Y DEVOLVIENDO UN JSON
            //Y ESTA FUNCION SE ENCARGA DE RELLENAR EL DIV CON ID signals CON LAS SEÑALES
            fetch('http://localhost/pagina_web/pagina_web/public/mostrar_senales')
                .then(response => response.json())
                .then(data => {
                    const signalsContainer = document.getElementById('signals');
                    signalsContainer.innerHTML = '';
                    data.forEach(signal => {
                        const signalElement = document.createElement('div');
                        signalElement.textContent = signal;
                        signalsContainer.appendChild(signalElement);
                    });
                })
                .catch(error => console.error('Error fetching signals:', error));
        }
        //ESTO HACE QUE SE EJECUTE CADA UN SEGUNDO
        setInterval(fetchSignals, 1000); 
    </script>
</head>
<body>
<h1>Prueba para ver codigos hexadecimales</h1>
<div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <h2>
    <div id="signals"></div>
    </h2>

<style>
    body{
        color: white;
    }
</style>

</body>
</html>