<?php
include "conecta.php";



session_start();
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
                <?php echo $usuario['usuario'] . "<br>"; ?>
                <?php echo $usuario['email'] . "<br>"; ?>

               
                    <input type="submit" value="Enviar">
                </form>
            </tbody>
            </form>
            </fieldset>
</body>

</html>