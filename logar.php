<?php
session_start();
include('conecta.php');
$usuario_login = $_POST['usuario'];
$senha = $_POST['senha'];
if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	echo "";
	exit();
}

$conexao = conectar();

$sql = "SELECT * FROM usuario WHERE usuario='$usuario_login' AND senha='$senha'";
$resultado = executarSQL($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
$email = $usuario['email'];
$nome = $usuario['usuario'];

$row = mysqli_num_rows($resultado);

if ($row == 1) {
	$_SESSION['email'] = $email;
	$_SESSION['usuario'] = $nome;
	header('Location: principal.php');
	exit();
}
else {
	header('Location: index.php');
}