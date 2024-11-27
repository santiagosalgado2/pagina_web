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
      
const redLight = document.getElementById('rojo');
    const yellowLight = document.getElementById('amarillo');
    const greenLight = document.getElementById('verde');

    // Función para apagar todas las luces
    function resetLights() {
      redLight.style.backgroundColor = 'gray';
      yellowLight.style.backgroundColor = 'gray';
      greenLight.style.backgroundColor = 'gray';
    }

    // Función para activar el modo semáforo
    function runTrafficLight() {
      resetLights();

      setTimeout(() => { redLight.style.backgroundColor = 'red'; }, 0);
      setTimeout(() => { redLight.style.backgroundColor = 'gray'; yellowLight.style.backgroundColor = 'yellow'; }, 5000);
      setTimeout(() => { yellowLight.style.backgroundColor = 'gray'; greenLight.style.backgroundColor = 'green'; }, 7000);
      setTimeout(() => { greenLight.style.backgroundColor = 'gray'; }, 12000);
    }

  function fetchEstado() {
    fetch('http://localhost/pagina_web/pagina_web/public/expo/getEstado')
      .then(response => response.json())
      .then(data => {
    console.log(data);

        resetLights();

        switch (data.estado) {
          case 'rojo':
            redLight.style.backgroundColor = 'red';
            break;
          case 'amarillo':
            yellowLight.style.backgroundColor = 'yellow';
            break;
          case 'verde':
            greenLight.style.backgroundColor = 'green';
            break;
          case 'semaforo':
            runTrafficLight();
            break;
        }
      })
      .catch(error => console.error('Error:', error));
  }

  setInterval(fetchEstado, 1000); // Consulta cada segundo
</script>
  

</body>
</html>
