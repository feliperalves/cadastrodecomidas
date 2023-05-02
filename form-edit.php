<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id)) {
	echo "ID para alteração não definido";
	exit;
}

$PDO = db_connect();
$sql = "SELECT nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$pratos = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($pratos)) {
	echo "Nenhum prato encontrado";
}
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
	<div class="container-fluid">
		<nav class="navbar navbar-expand bg-white nav-justified ">
			<div class="container-fluid justify-content-center align-items-center">
				<ul class="navbar-nav ">
					<a class="navbar-brand" href="index.php">
						<span class="navbar-text" style="color: orange;"> Cadastro de Comidas Favoritas</span>
					</a>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
							style="color: orange;">Pratos</a>
						<ul class="dropdown-menu">
							<li>
								<a href="form-add.php" class="dropdown-item">Cadastrar Prato</a>
							</li>
							<li>
								<a href="form-edit-navbar.php" class="dropdown-item">Editar Prato</a>
							</li>
							<li>
								<a href="form-remove-navbar.php" class="dropdown-item">Remover Prato</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
							style="color: orange;">Ingredientes</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#" class="dropdown-item">Em breve</a>
							</li>
							<li>
								<a href="#" class="dropdown-item">Em Breve</a>
							</li>
							<li>
								<a href="#" class="dropdown-item">Em Breve</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="container my-5">
		<div class="card p-3 mx-auto border border-warning" style="max-width: 500px;">
			<h2 class="text-center text-warning">Edite sua comida favorita</h2>
			<form action="edit.php" method="post">
				<div class="form-group">
					<label for="nome" style="color: orange;">Nome: </label>
					<input type="text" class="form-control col-sm border-warning" name="nome" id="nome"
						value="<?php echo $pratos["nome"] ?>">
				</div>
				<div class="form-group">
					<label for="ingredientes" style="color: orange;">Ingredientes: </label>
					<input type="text" class="form-control col-sm border-warning" name="ingredientes" id="ingredientes"
						value="<?php echo $pratos["ingredientes"] ?>">
				</div>
				<div class="form-group">
					<label for="dificuldade_preparo" style="color: orange;">Dificuldade de preparo: </label>
					<input type="text" class="form-control col-sm border-warning" name="dificuldade_preparo"
						id="dificuldade_preparo" value="<?php echo $pratos["dificuldade_preparo"] ?>">
				</div>
				<div class="form-group">
					<label for="quanto_gosta" style="color: orange;">Quanto Gosta: </label>
					<input type="text" class="form-control col-sm border-warning" name="quanto_gosta" id="quanto_gosta"
						value="<?php echo $pratos["quanto_gosta"] ?>">
				</div>
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<button type="submit" class="btn btn-warning" style = "color: white;">Editar</button>
			</form>
		</div>
	</div>
</body>

</html>