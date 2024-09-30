<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("/css/estilog.css");?>">   
    <title>Document</title>
</head>
<body>

    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>
    <div class="circulo"></div>

    <h1>Información de tus usuarios</h1>

    <h2> <a href="<?php echo base_url("/new_user");?>">Crear un nuevo usuario</a> </h2>

    <?php if(isset($datos) && !empty($datos)):?>

        <table>
            <thead>
                <th>Nombre de usuario</th>
                <th>Dirección de E-mail</th>
                <th>Fecha de creación</th>
            </thead>
            <tbody>
                <?php foreach($datos as $d):?>
                    <tr>
                        <td><?php echo $d["nombre_usuario"];?> </td>
                        <td><?php echo $d["email"];?> </td>
                        <td><?php echo $d["fecha_creacion"];?> </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php else:?>
        <h2>No tienes usuarios creados</h2>
    <?php endif;?>
    <a href="<?php echo base_url("/");?>"><button>Volver</button></a>

</body>
</html>