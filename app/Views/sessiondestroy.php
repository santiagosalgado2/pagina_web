<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/form.css") . '?v=' . time(); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url("/img/logo1.png") ;?>">
    <title>Eliminar sesiones</title>
</head>
<body>
    

<div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    
   
    
    <div class="form-container">
        <h1>Elimina las sesiones de tu cuenta</h1>
        
        <form method="post" action="<?php echo base_url("/sessiondestroy");?>">
            <div class="mb-3">
                    <span class="textos">Ingrese el email asociado a su cuenta</span><input type="email" name="mail">
                
                <br><br><input type="submit" value="Enviar">
            </div>
        </form>
        <?php if(isset($error)):?>
        <div class="error"><h1><?php echo $error;?></h1></div>
            
            <?php endif;?>
    </div>


</body>
</html>