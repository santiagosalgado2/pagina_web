<?php
$session=session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilo.css");?>">
    <title>Inicia sesión en el sitio</title>
</head>
<body>

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
                <form action="<?php echo base_url("/login");?> " method="post">
				<div class="group">
                <label for="username">Ingrese usuario</label><br>
				<input type="text" id="user" class="input"  required name="username">
				</div>
				<div class="group">
				<label for="password">Ingrese contraseña</label><br>
					<input type="password" id="pass" class="input"  required name="password">
				</div>
				<div class="group">
					<input type="checkbox" name="remember">
        			<label for="remember">Recordarme</label><br><br>
				</div>
				<?php

	$error_data = $session->getFlashdata("error");
	if($error_data){
		if(!is_array($error_data)){
			echo $error_data ;
		}else{
			foreach ($error_data as $e){
				echo $e."<br>";
		}
			
	}
			
	}
	
	?>
				<div class="group">
					<input type="submit" class="button" value="Iniciar sesion">
				</div>
            </form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="<?php echo base_url("/reset");?>">Has olvidado tu contraseña?</a>
				</div>
			</div>
			
			<div class="sign-up-htm">
            <form action="<?php echo base_url("/register");?> " method="post">
				<div class="group">
					<label for="user" class="label">Nombre de usuario</label>
					<input id="user" type="text" class="input" required name="username">
				</div>
				<div class="group">
					<label for="pass" class="label">Contraseña</label>
					<input id="pass" type="password" class="input" data-type="password" required name="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Confirmar contraseña</label>
					<input id="pass" type="password" class="input" data-type="password" required name="password_confirm">
				</div>
				<div class="group">
					<label for="pass" class="label">Correo electrónico</label>
					<input id="pass" type="mail" class="input" required name="email">
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



</body>
</html>