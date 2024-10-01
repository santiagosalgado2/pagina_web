<?php
$session=session();
?>

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

    <h1>Dispositivos disponibles con el esp seleccionado</h1>

    <table>

    <thead>
        <th>Dispositivos</th>
        <th>Acciones</th>
    </thead>

    <tbody>
        <?php foreach ($datos as $d):?>
        <tr>
            <td><?php echo $d["nombre"];?> </td>
            <td>
                <button>Controlar</button>
                <button>Editar</button>
        
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>

    </table>
    <a href="<?php echo base_url("/");?>"><button>Volver</button></a>
</body>
</html>