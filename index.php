<?php
require_once 'init.php';
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM pratos ORDER BY nome ASC";
$sql = "SELECT id, nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos ORDER BY nome ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype hmtl>
<html>

<head>
  <meta charset="utf-8">
  <title>Cadastro de Comidas Favoritas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="estilo.css">
  <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
  <script src="bootstrap/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class = "navbar navbar-expand bg-white nav-justified ">
  <div class = "container-fluid justify-content-center">
    <ul class = "navbar-nav">
      <a class = "navbar-brand" href ="index.php">
        <span class = "navbar-text" style = "color: orange;"> Cadastro de Comidas Favoritas</span>
      </a>
      
      <li class = "nav-item dropdown">
        <a class = "active nav-link dropdown-toggle" data-bs-toggle = "dropdown" href = "#" style = "color: orange;">Pratos</a>
        <ul class = "dropdown-menu">
          <li>
            <a href = "form-add.php" class = "dropdown-item">Cadastrar Prato</a>
          </li>
          <li>
            <a href = "form-edit-navbar.php" class = "dropdown-item">Editar Prato</a>
          </li>
          <li>
            <a href = "form-remove-navbar.php" class = "dropdown-item">Remover Prato</a>
          </li>
        </ul>
      </li>
      <li class = "nav-item dropdown">
        <a class = "active nav-link dropdown-toggle" data-bs-toggle = "dropdown" href = "#" style = "color: orange;">Ingredientes</a>
        <ul class = "dropdown-menu">
          <li>
            <a href = "#" class = "dropdown-item">Em breve</a>
          </li>
          <li>
            <a href = "#" class = "dropdown-item">Em Breve</a>
          </li>
          <li>
            <a href = "#" class = "dropdown-item">Em Breve</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>  
  <div class="container-fluid mt-5">
    <div class="card-deck justify-content-center">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img
            src= "img/cardimg_1.png"
            class="card-img-top" alt="Cadastrar">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Nova Comida</h5>
            <p class="card-text">Cadastre uma nova comida para a sua lista de comidas favoritas.</p>
            <a href="form-add.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista de Comidas Favoritas</h5>
            <?php if ($total > 0): ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ingredientes</th>
                    <th>Dificuldade de Preparo</th>
                    <th>Quanto Gosta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($pratos = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                      <td>
                        <?php echo $pratos['nome'] ?>
                      </td>
                      <td>
                        <?php echo $pratos['ingredientes'] ?>
                      </td>
                      <td>
                        <?php echo $pratos['dificuldade_preparo'] ?>
                      </td>
                      <td>
                        <?php echo $pratos['quanto_gosta'] ?>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p class="card-text">Nenhuma comida cadastrada ainda.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>