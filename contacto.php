<?php

require("./db.php");

if (isset($_POST['submit'])) {
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $comentario = $_POST['comentario'];
    echo "<script> alert($correo); </script>";

    $sql = "INSERT INTO contacto (correo, nombre, asunto, comentario) VALUES (:correo, :nombre, :asunto, :comentario)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt ->bindParam(':correo', $correo);
        $stmt ->bindParam(':nombre', $nombre);
        $stmt ->bindParam(':asunto', $asunto);
        $stmt ->bindParam(':comentario', $comentario);
        $stmt->execute();

        echo "<script> alert('Su comentario fue enviado exitosamente.'); </script>";
        
    } catch (\Throwable $th) {
        echo "<script> alert('Hubo un error al enviar su comentario.'); </script>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto | Raymond Libreria</title>
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
                  <a class="nav-link" href="./autores.php">Autores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contacto</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main class="d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4">Formulario de contacto</h1>
        </div>
        <br />
        <div class="card w-75 d-flex">
            <div class="card-header">
                <h3 class="text-center">Detalles</h3>
            </div>
        
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="correo">Correo electrónico</label>
                            <input type="email" class="form-control form-control-sm" name="correo" required />
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label class="form-label" for="nombre" >Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre" required />
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="asunto" >Asunto</label>
                            <input type="text" class="form-control form-control-sm" name="asunto" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label class="form-label" for="comentario" >Comentario</label>
                            <textarea class="form-control" name="comentario" required></textarea>
                        </div>
                    </div>
                    <button name="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>