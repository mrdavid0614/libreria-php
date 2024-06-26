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
                  <a class="nav-link" href="./autores.php">Autores</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./contacto.php">Contacto</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main class="d-flex flex-column justify-content-center align-items-center" style="height: 70vh;">
        <div class="text-center">
            <h1 class="display-4">Raymond Libreria</h1>
            <p>Donde puedes encontrar todo tipo de información sobre libros, sus autores, etc.</p>
        </div>

        <div class="d-flex justify-content-center align-items-center gap-3">
          <a class="btn btn-primary" style="font-size: 1.2rem;" href="./libros.php">Ver libros</a>
          <a class="btn btn-info" style="font-size: 1.2rem;" href="./autores.php">Ver autores</a>
        </div>
    </main>

    <footer class="p-3 bg-dark d-flex justify-content-end fixed-bottom">
      <a class="btn btn-outline-light" style="font-size: 1.2rem;" href="./contacto.php">Contáctanos</a>
    </footer>
</body>
</html>