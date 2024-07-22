<?php
require_once "conecta.php";
$conexao = conectar();

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// TODO armazenar a senha de modo seguro
$sql = "INSERT INTO usuario (usuario, email, senha) VALUES
('$usuario', '$email','$senha')";
$resultado = mysqli_query($conexao, $sql);
if ($resultado === false) {
    if (mysqli_errno($conexao) == 1062) {
        echo "Email já cadastrado no sistema! Tente fazer o login ou faça a recuperação de senha.";
    } else {
        echo "Erro ao inserir o novo usuário!"
            . mysqli_errno($conexao) . ":" . mysqli_error($conexao);
    }
}
header("Location: index.php");
