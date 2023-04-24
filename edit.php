<?php
require_once 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : null;
$dificuldade_preparo = isset($_POST['dificuldade_preparo']) ? $_POST['dificuldade_preparo'] : null;
$quanto_gosta = isset($_POST['quanto_gosta']) ? $_POST['quanto_gosta'] :null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if (empty($nome) || empty($ingredientes) || empty($dificuldade_preparo) || empty($quanto_gosta))
{
    echo "Volte e preencha todos os campos";
    exit;
}

if (($quanto_gosta < 0 || $quanto_gosta > 10) || ($dificuldade_preparo < 0 || $dificuldade_preparo > 10)){
    echo "Valor inválido";
    exit;
} 

$PDO = db_connect();
$sql = "UPDATE pratos SET nome = :nome, ingredientes = :ingredientes, dificuldade_preparo = :dificuldade_preparo, quanto_gosta = :quanto_gosta WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ingredientes', $ingredientes);
$stmt->bindParam(':dificuldade_preparo', $dificuldade_preparo);
$stmt->bindParam(':quanto_gosta', $quanto_gosta);
$stmt->bindParam(':id' , $id, PDO::PARAM_INT);

if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>