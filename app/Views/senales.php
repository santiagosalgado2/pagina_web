<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Señales</title>
    <script>
        function fetchSignals() {
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

        setInterval(fetchSignals, 1000); // Actualizar cada 1 segundo
    </script>
</head>
<body>
    <div id="signals"></div>
</body>
</html>