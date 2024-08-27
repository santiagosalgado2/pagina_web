<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?php echo base_url("/css/estilo.css");?>">
    <title>Document</title>


    
    
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
<<<<<<< HEAD
<div class="login-wrap">
	<div class="login-html">
	
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar sesion</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
				<form method="post" action="<?php echo base_url("/login");?>">
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
				</form>
				<div class="foot-lnk">
					<label for="tab-1">Ya tienes una cuenta?</a>
				</div>
			</div>
		</div>
	</div>
</div>
    

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Iniciar sesión</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab">Registrarse</label>
            
            <div class="login-form">
                <!-- Formulario para Iniciar Sesión -->
                <form method="post" action="<?php echo base_url("/login");?>">
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
                            <input type="submit" class="button" value="Iniciar sesión">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="#forgot">¿Has olvidado tu contraseña?</a>
                        </div>
                    </div>
                </form>

                
                <form action="/register" method="POST">
                    <div class="sign-up-htm">
                        <div class="group">
                            <label for="user" class="label">Nombre de usuario</label>
                            <input id="user" type="text" class="input" name="username" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Contraseña</label>
                            <input id="pass" type="password" class="input" name="password" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="pass-confirm" class="label">Confirmar contraseña</label>
                            <input id="pass-confirm" type="password" class="input" name="password_confirm" data-type="password" required>
                        </div>
                        <div class="group">
                            <label for="email" class="label">Correo electrónico</label>
                            <input id="email" type="text" class="input" name="email" required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Registrarme">
                        </div>
                        <div class="foot-lnk">
                            <label for="tab-1">¿Ya tienes una cuenta?</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>