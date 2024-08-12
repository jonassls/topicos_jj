<?php
include "conecta.php";

session_start();
if (isset($_SESSION['email'])) {
$usuario_logado = $_SESSION['email'];
$conexao = conectar();
$sql = "SELECT * FROM usuario WHERE email='$usuario_logado'";
$resultado = executarSQL($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
$foto = $usuario['foto_perfil'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend><h1>Perfil</h1></legend>
                <img src="./uploads/<?php echo $foto ?>" width="50" height="50"><br>
                Usuário: <?php echo $usuario['usuario'] . "<br><br>"; ?>
                Email: <?php echo $usuario['email'] . "<br>"; ?>

               <hr>
                    <a href="alterar-conta.php?foto=<?php echo $foto ?>">Alterar Informações da Conta</a><br><br>
                    <a href="sair.php">Logout</a>
                </form>
            </tbody>
            </form>
            </fieldset>
</body>
</html>
<?php }
else {
    header( "Location: index.php");
}
?>