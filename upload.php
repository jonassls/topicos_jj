<?php
session_start();
include_once "conecta.php";
$pastaDestino = "/uploads/";
$email = $_SESSION['email'];
$alt_usuario = $_POST['usuario'];
$alt_email = $_POST['email'];


$conexao = conectar();
$sql1 = "SELECT * FROM usuario WHERE email='$email'";
$resultado1 = executarSQL($conexao, $sql1);
$usuario = mysqli_fetch_assoc($resultado1);



if ($_FILES['arquivo']['size'] > 2000000) { 
    echo "O tamanho da foto selecionada é maior que o limite permitido. Limite máximo: 2 MB.";
    die();
}

$extensao = strtolower(pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION));

if (
    $extensao != "png" && $extensao != "jpg" &&
    $extensao != "jpeg" && $extensao != "gif" &&
    $extensao != "jfif" && $extensao != "svg"
) {
    echo "O arquivo não é uma imagem! Apenas selecione arquivos 
    com extensão png, jpg, jpeg, gif, jfif ou svg.";
    die();
}

if (getimagesize($_FILES['arquivo']['tmp_name']) === false) {
    echo "Problemas ao enviar a imagem. Tente novamente.";
    die();
}

$nomeArquivo = uniqid();

$fezUpload = move_uploaded_file(
    $_FILES['arquivo']['tmp_name'],
    __DIR__ . $pastaDestino . $nomeArquivo . "." . $extensao);
if ($fezUpload == true) {
    $conexao = mysqli_connect("localhost", "root", "", "login");
    $sql = "UPDATE `usuario` SET `usuario`='$alt_usuario', `email`='$alt_email', `foto_perfil`='$nomeArquivo.$extensao' WHERE email='$email'";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado != false) {
        // se for uma alteração de arquivo
        if (isset($_POST['Nome_arquivo'])) {
            $apagou = unlink(__DIR__ . $pastaDestino . $_POST['Nome_arquivo']);
            if ($apagou == true) {
                $sql = "DELETE FROM usuario WHERE foto_perfil='" . $_POST['Nome_arquivo'] . "'";
                $resultado2 = mysqli_query($conexao, $sql);
                if ($resultado2 == false) {
                    echo "Erro ao apagar o arquivo do banco de dados.";
                    die();
                }
            } else {
                echo "Erro ao apagar o arquivo antigo.";
                die();
            }
        }
        header("Location: index.php");
    } else {
        echo "Erro ao registrar o arquivo no banco de dados.";
    }
} else {
    echo "Erro ao mover arquivo.";
}
