<?php
require 'init.php';
?>
</doctype HTML>
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
  <div class = "container-fluid justify-content-center align-items-center">
    <ul class = "navbar-nav ">
      <a class = "navbar-brand" href ="index.php">
        <span class = "navbar-text" style = "color: orange;"> Cadastro de Comidas Favoritas</span>
      </a>
      <li class = "nav-item dropdown">
        <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown" href = "#" style = "color: orange;">Pratos</a>
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
        <a class = "nav-link dropdown-toggle" data-bs-toggle = "dropdown" href = "#" style = "color: orange;">Ingredientes</a>
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
	<div class="container my-5">
		<div class="card p-3 mx-auto border border-primary" style="max-width: 500px;">
			<h2 class="text-center text-primary">Cadastro de Comida </h2>
			<form action="add.php" method="post">
				<div class="form-group">
					<label for="nome" style = "color: #007bff;">Prato: </label>
					<input type="text" class="form-control col-sm border-primary" name="nome" id="nome" 
						placeholder="Informe o prato">
				</div>
				<div class="form-group">
					<label for="ingredientes" style = "color: #007bff;">Ingredientes: </label>
					<input type="text" class="form-control col-sm border-primary" name="ingredientes" id="ingredientes"
						 placeholder="Informe os ingredientes">
				</div>
				<div class="form-group">
					<label for="dificuldade_preparo" style = "color: #007bff;">Dificuldade de preparo: </label>
					<input type="number" class="form-control col-sm border-primary" name="dificuldade_preparo" id="dificuldade_preparo"
						 placeholder="Nível de dificuldade (0 a 10)">
				</div>
				<div class="form-group">
					<label for="quanto_gosta" style = "color: #007bff;">Quanto Gosta: </label>
					<input type="number" class="form-control col-sm border-primary" name="quanto_gosta" id="quanto_gosta"
						 placeholder="Nota (0 a 10)">
				</div>
				<button type="submit" class="btn btn-primary" style="color: white;">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>

