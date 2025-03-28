<?php
$session=session();
?>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Inicia sesión en el sitio</title>    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?php echo base_url();?>" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo1.png" alt="logo"> 
        <h1 class="sitename">IRConnect</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url('/#hero');?>">Inicio</a></li>
          <li><a href="<?= base_url('/#about');?>">Acerca del producto</a></li>
          <li><a href="<?= base_url('/#features');?>">Características</a></li>
          <li><a href="<?= base_url('/#pricing');?>" >Compra aquí</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a> -->
            <!-- <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul> -->
          </li>
          <li><a href="<?= base_url('/#contact');?>">Contáctanos</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>



    </div>
  </header>



  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
	  <img class="backImg" src="<?= base_url('/assets/img/about-2.webp');?>">

        <div class="text">
          <span class="text-1">Inicia sesión en <br> IRConnect</span>
          <span class="text-2">Controla todos tus dispositivos</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="<?= base_url('/assets/img/about-5.webp');?>">
        <div class="text">
          <span class="text-1">Maneja tus dispositivos <br> desde un solo lugar</span>
          <span class="text-2">Regístrate ahora</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Inicia sesión</div>
          <form action="<?php echo base_url("/login");?> " method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Nombre de usuario" required name="username">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Contraseña" required name="password">
              </div>
			  <div class="checkbox-box">
                <input type="checkbox" name="remember">   <span class="text-2">Recordarme</span><br><br>
              </div>
              <div class="text"><a href="<?php echo base_url("/reset");?>">Olvidaste tu contraseña?</a></div>
              <div class="button input-box">
                <input type="submit" value="Iniciar sesión">
              </div>
              <div class="text sign-up-text">No tienes una cuenta? <label for="flip">Regístrate</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Registrarse</div>
        <form action="<?php echo base_url("/register");?> " method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Nombre de usuario" required name="username">
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="mail" placeholder="Dirección de E-mail" required name="email">
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Contraseña" required onfocus="showPasswordMessage()" onblur="hidePasswordMessage()" name="password">
				<div id="password-tooltip" class="tooltip">
    			La contraseña debe tener al menos 8 caracteres, incluir al menos una letra mayúsucula, un número y un caracter especial
  				</div>
              </div>
			  <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirma tu contraseña" required name="password_confirm">
              </div>
              <div class="button input-box">
                <input type="submit" value="Registrarse">
              </div>
              <div class="text sign-up-text">Ya tienes una cuenta? <label for="flip">Inicia sesión</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>

  <script>
  function showPasswordMessage() {
    document.getElementById('password-tooltip').style.display = 'block';
  }

  function hidePasswordMessage() {
    document.getElementById('password-tooltip').style.display = 'none';
  }
</script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/js/main.js"></script>
<style>
	/* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #7d2ae8;
  padding: 30px;
}
.container {
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  perspective: 2700px;
}
.container .cover {
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
  backface-visibility: hidden;
}
.container #flip:checked ~ .cover {
  transform: rotateY(-180deg);
}
.container #flip:checked ~ .forms .login-form {
  pointer-events: none;
}
.container .cover .front,
.container .cover .back {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.cover .back {
  transform: rotateY(180deg);
}
.container .cover img {
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}
.container .cover .text {
  position: absolute;
  z-index: 10;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.container .cover .text::before {
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  opacity: 0.5;
  background: #7d2ae8;
}
.cover .text .text-1,
.cover .text .text-2 {
  z-index: 20;
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}
.cover .text .text-2 {
  font-size: 15px;
  font-weight: 500;
}
.container .forms {
  height: 100%;
  width: 100%;
  background: #fff;
}
.container .form-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form {
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title {
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #7d2ae8;
}
.forms .signup-form .title:before {
  width: 20px;
}
.forms .form-content .input-boxes {
  margin-top: 30px;
}
.forms .form-content .input-box {
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0, 0, 0, 0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid {
  border-color: #7d2ae8;
}
.form-content .input-box i {
  position: absolute;
  color: #7d2ae8;
  font-size: 17px;
}
.forms .form-content .text {
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a {
  text-decoration: none;
}
.forms .form-content .text a:hover {
  text-decoration: underline;
}
.forms .form-content .button {
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input {
  color: #fff;
  background: #7d2ae8;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover {
  background: #5b13b9;
}
.forms .form-content label {
  color: #5b13b9;
  cursor: pointer;
}
.forms .form-content label:hover {
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text {
  text-align: center;
  margin-top: 25px;
}
.container #flip {
  display: none;
}
@media (max-width: 730px) {
  .container .cover {
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form {
    width: 100%;
  }
  .form-content .signup-form {
    display: none;
  }
  .container #flip:checked ~ .forms .signup-form {
    display: block;
  }
  .container #flip:checked ~ .forms .login-form {
    display: none;
  }
}

.tooltip {
  display: none; /* Oculto por defecto */
  position: absolute;
  top: 100%; /* Aparece justo debajo del input */
  left: 50%; /* Centrado horizontalmente */
  transform: translateX(-50%); /* Ajusta el centrado */
  background: #f3f3f3;
  color: #7d2ae8;
  font-size: 12px;
  padding: 8px 12px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  z-index: 10;
  max-width: 250px; /* Limita el ancho máximo */
  text-align: center; /* Centra el texto */
  word-wrap: break-word; /* Permite que el texto se ajuste */
}

.tooltip::after {
  content: '';
  position: absolute;
  top: -5px; /* Flecha apuntando hacia el input */
  left: 50%;
  transform: translateX(-50%);
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent #f3f3f3 transparent;
}
</style>


</body>
</html>