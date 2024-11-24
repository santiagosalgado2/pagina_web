<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><center>Administrar Permisos de <?php echo $user[0]['nombre_usuario']; ?></center></h1>

    <form>
        <input type="hidden" name="id_usuario" value="<?php echo $user[0]['ID_usuario']; ?>">
       
   

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
                            <input type="checkbox" name="seleccionados[]" value="<?php echo $disp['nombre']; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>


    <button type="submit">Guardar</button>
    </form>

</body>
</html>