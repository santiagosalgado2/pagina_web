<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/defaultstyle.css");?>"> 
    <link rel="stylesheet" href="<?php echo base_url("/css/emailstyle.css");?>"> 
    <title>Document</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    
   
    
    <div class="form-container">
        <h1>Reestablece tu contraseña</h1>
        <form method="post" action="<?php echo base_url("/generate2/recuperar_contrasena");?>">
            <div class="mb-3">
                    <span class="textos">Ingrese el email asociado a su cuenta</span><input type="email" name="mail">
                
                <br><br><input type="submit" value="Enviar">
            </div>
        </form>
    </div>
    
   
    
   

  

</body>
</html>