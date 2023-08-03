<?php
date_default_timezone_set('America/Santo_Domingo');
setlocale(LC_ALL, 'es_ES');

require("./db.php");

try {
    $sql = "SELECT nombre, apellido, telefono, direccion, ciudad, estado, pais FROM autores";
    $stmt = $conn->query($sql);
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    $error = "No se pudo obtener los autores";
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
            <a class="navbar-brand" href="./index.php">Raymond Libreria</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="./libros.php">Libros</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#">Autores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./contacto.php">Contacto</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main class="d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4">Listado de autores</h1>
        </div>
        <br />
        <div class="card w-75">
            <div class="card-header">
                <h3 class="text-center">Detalles</h3>
            </div>
            <div class="card-body">
              <?php if (isset($error)): ?>
                <p><?php echo $error ?></p>
              <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Telefono</th>
                          <th>Direccion</th>
                          <th>Ciudad</th>
                          <th>Estado</th>
                          <th>Pais</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($autores as $autor): ?>
                          <tr>
                              <td><?php echo $autor['nombre'] ?></td>
                              <td><?php echo $autor['apellido'] ?></td>
                              <td><?php echo $autor['telefono'] ?></td>
                              <td><?php echo $autor['direccion'] ?></td>
                              <td><?php echo $autor['ciudad'] ?></td>
                              <td><?php echo $autor['estado'] ?></td>
                              <td><?php echo $autor['pais'] ?></td>
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