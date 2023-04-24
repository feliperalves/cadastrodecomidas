<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql = "SELECT nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$pratos = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($pratos))
{
    echo "Nenhum prato encontrado";
}
?>
</doctype HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Comidas Favoritas</title>
		<link rel="stylesheet" href="estilo.css">
		<link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
		<link href = "bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src = "bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
	<div class="container-fluid">
		<header class="row" id="header">
			<a href="index.php" id="a-header">
				<h1 id="h1-header">Cadastro de Comidas Favoritas</h1>
			</a>
		</header>
	</div>
		<div class="container my-5">
		<div class="card p-3 mx-auto border border-danger" style="max-width: 500px;">
			<h2 class="text-center text-danger">Edite sua comida favorita</h2>
			<form action="edit.php" method="post">
				<div class="form-group">
					<label for="nome">Nome: </label>
					<input type="text" class="form-control col-sm border-danger" name="nome" id="nome"  value="<?php echo $pratos["nome"] ?>">
				</div>
				<div class="form-group">
					<label for="ingredientes">Ingredientes: </label>
					<input type="text" class="form-control col-sm border-danger"  name="ingredientes" id = "ingredientes"  value = "<?php echo $pratos["ingredientes"] ?>">
				</div>
				<div class="form-group">
					<label for="dificuldade_preparo">Dificuldade de preparo: </label>
					<input type="text" class="form-control col-sm border-danger" name="dificuldade_preparo" id="dificuldade_preparo"  value="<?php echo $pratos["dificuldade_preparo"] ?>">
				</div>
				<div class="form-group">
					<label for="quanto_gosta">Quanto Gosta: </label>
					<input type="text" class="form-control col-sm border-danger" name="quanto_gosta" id = "quanto_gosta"  value="<?php echo $pratos["quanto_gosta"] ?>">
				</div>
					<input type = "hidden" name = "id" value="<?php echo $id ?>">
					<button type="submit" class="btn btn-danger">Editar</button>
			</form>
		</div>
	</div>
		</body>
</html>
