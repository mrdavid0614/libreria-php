<?php
error_reporting(E_ALL & ~E_DEPRECATED);

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raymond Libreria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
</head>
<body>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ps-5">
            <a class="navbar-brand" href="#">Raymond Libreria</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Libros</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="./pages/autores/index.php">Autores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./pages/contacto/index.php">Contacto</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main class="d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4">Listado de libros</h1>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Disponibles</h3>
            </div>
            <div class="card-body">
              <?php if (isset($error)): ?>
                <p><?php echo $error ?></p>
              <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Tipo</th>
                            <th>ID publicacion</th>
                            <th>Precio</th>
                            <th>Total de ventas</th>
                            <th>Fecha de publicación</th>
                            <th>Autor</th>
                        </tr>
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
            </div>
        </div>
    </main>
</body>
</html>