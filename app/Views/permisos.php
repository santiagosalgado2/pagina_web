<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><center>Administrar Permisos de <?php echo $user[0]['nombre_usuario']; ?></center></h1>


       
   

    <?php foreach ($datos as $ubicacion => $dispositivos): ?>
        <?php if (count($dispositivos) > 0): ?>
            <h2><?php echo $ubicacion; ?></h2>
            <table>
                <tr>
                    <th>Nombre del dispositivo</th>
                    <th>Seleccionar</th>
                </tr>
                <?php foreach ($dispositivos as $disp): ?>
                    <tr>
                        <td><?php echo $disp['nombre']; ?></td>
                        <td>
                        <form action="/ruta/actualizarPermiso" method="POST">
                            <input type="hidden" name="user" value="<?php echo $user[0]['nombre_usuario']; ?>">
                            <input type="hidden" name="device" value="<?php echo $disp['ID_dispositivo']; ?>">
                            <select name="permiso" onchange="this.form.submit()">
                                <option value="Permitido">Permitido</option>
                                <option value="Denegado">Denegado</option>
                            </select>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>




</body>
</html>