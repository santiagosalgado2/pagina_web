<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><center>Iniciar sesión</center></h1>
    <form method="post" action="<?php echo base_url("/login");?>">
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar sesion</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
				<input type="text" placeholder="Nombre de usuario" required name="username">
        		<label for="username">Ingrese usuario</label><br>

				</div>
				<div class="group">
					<input type="password" placeholder="Contraseña" required name="password">
        			<label for="password">Ingrese contraseña</label><br>
				
				</div>
				<div class="group">
					<input type="checkbox" name="remember">
        			<label for="remember">Recordarme</label><br><br>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Iniciar sesion">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Has olvidado tu contraseña?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Nombre de usuario</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Contraseña</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Confirmar contraseña</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Correo electrónico</label>
					<input id="pass" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Registrarme">
				</div>
				
				<div class="foot-lnk">
					<label for="tab-1">Ya tienes una cuenta?</a>
				</div>
			</div>
		</div>
	</div>
</div>
    </form>
</body>
</html>