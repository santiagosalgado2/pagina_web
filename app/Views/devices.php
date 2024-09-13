<?php
$session=session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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

</body>
</html>