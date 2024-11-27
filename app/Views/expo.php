<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semáforo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin-top: 50px;
      height: 100vh;
    background: linear-gradient(135deg, #2C3E50, #4CA1AF); /* Azul marino a azul petróleo */
    color: #333333; /* Gris carbón para el texto */
    }
    .semaforo {
      width: 100px;
      height: 250px;
      background-color: black;
      border-radius: 10px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      justify-content: space-around;
      padding: 10px;
    }
    .luz {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background-color: gray;
      margin: 0 auto;
    }
    .luz.roja {
      background-color: gray;
    }
    .luz.verde {
      background-color: gray;
    }
    .luz.amarilla {
      background-color: gray;
    }
    button {
      margin: 5px;
      padding: 10px 20px;
      font-size: 16px;
    }
    .circulo {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    animation: flotando 10s infinite ease-in-out;
}

.circulo:nth-child(1) {
    width: 200px;
    height: 200px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.circulo:nth-child(2) {
    width: 150px;
    height: 150px;
    top: 70%;
    left: 30%;
    animation-delay: 2s;
}

.circulo:nth-child(3) {
    width: 300px;
    height: 300px;
    top: 40%;
    right: 10%;
    animation-delay: 4s;
}

.circulo:nth-child(4) {
    width: 100px;
    height: 100px;
    bottom: 15%;
    right: 40%;
    animation-delay: 6s;
}
@keyframes flotando{0%, 100% {
    transform: translateY(0) translateX(0);
}
50% {
    transform: translateY(-50px) translateX(50px);
}}
  </style>
</head>
<body>
<div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
  <h1>Semáforo</h1>
  <div class="semaforo">
    <div id="rojo" class="luz roja"></div>
    <div id="amarillo" class="luz amarilla"></div>
    <div id="verde" class="luz verde"></div>
  </div>


<script>
      
      let redLight = document.getElementById("red");
let yellowLight = document.getElementById("yellow");
let greenLight = document.getElementById("green");

function resetLights() {
    redLight.style.backgroundColor = 'black';  // Apagar el rojo
    yellowLight.style.backgroundColor = 'black';  // Apagar el amarillo
    greenLight.style.backgroundColor = 'black';  // Apagar el verde
}

function runTrafficLight() {
    let estado = ['rojo', 'amarillo', 'verde']; // Orden de las luces
    let tiempos = [5000, 2000, 5000]; // Duración de cada luz en milisegundos

    let i = 0;  // Inicia con el rojo

    function cicloSemaforo() {
        resetLights();  // Apagar todas las luces
        switch (estado[i]) {
            case 'rojo':
                redLight.style.backgroundColor = 'red';  // Enciende el rojo
                break;
            case 'amarillo':
                yellowLight.style.backgroundColor = 'yellow';  // Enciende el amarillo
                break;
            case 'verde':
                greenLight.style.backgroundColor = 'green';  // Enciende el verde
                break;
        }

        // Esperar el tiempo correspondiente antes de cambiar al siguiente color
        setTimeout(() => {
            i = (i + 1) % estado.length;  // Cambia al siguiente color, reiniciando al rojo después del verde
            cicloSemaforo();  // Llama a la función recursiva para el siguiente ciclo
        }, tiempos[i]);
    }

    cicloSemaforo();  // Iniciar el ciclo de luces
}

// Llamada a la función para ejecutar el semáforo coordinado
runTrafficLight();
  setInterval(fetchEstado, 1000); // Consulta cada segundo
</script>
  
</body>
</html>
