<?php
date_default_timezone_set('America/Santo_Domingo');
setlocale(LC_ALL, 'es_ES');

require("./db.php");

try {
    $sql = "SELECT titulo, tipo, id_pub, precio, total_ventas, fecha_pub, nombre as autor_nombre, apellido as autor_apellido FROM titulos inner join titulo_autor on titulos.id_titulo = titulo_autor.id_titulo inner join autores on titulo_autor.id_autor = autores.id_autor";
    $stmt = $conn->query($sql);
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    $error = "No se pudo obtener los libros";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Listado de Libros</title>
</head>
<body>
  <h1>Listado de Libros Disponibles</h1>

  <?php if (isset($error)): ?>
    <p><?php echo $error ?></p>
  <?php else: ?>
    <table>
        <thead>
            <th>Titulo</th>
            <th>Tipo</th>
            <th>ID Publicacion</th>
            <th>Precio</th>
            <th>Total de ventas</th>
            <th>Fecha de publicación</th>
            <th>Autor</th>
        </thead>
        <tbody>
            <?php foreach($libros as $libro): ?>
                <tr>
                    <td><?php echo $libro['titulo'] ?></td>
                    <td><?php echo $libro['tipo'] ?></td>
                    <td><?php echo $libro['id_pub'] ?></td>
                    <td><?php echo $libro['precio'] ?></td>
                    <td><?php echo $libro['total_ventas'] ?></td>
                    <td>
                        <?php
                            $fechaOriginal = $libro['fecha_pub'];
                            $timestamp = strtotime($fechaOriginal);
                            $mesesEnEspañol = array(
                                'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
                                'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
                              );
                              
                            $fechaFormateada = strftime('%d de ' . $mesesEnEspañol[date('n', $timestamp) - 1] . ' de %Y', $timestamp);
                            
                            echo $fechaFormateada;
                        ?>
                    </td>
                    <td><?php echo $libro['autor_nombre'] . " " . $libro['autor_apellido'] ?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
  <?php endif; ?>
</body>
</html>
