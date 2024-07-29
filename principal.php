<?php
include "conecta.php";

$conexao = conectar();
$sql = "SELECT * FROM usuario WHERE usuario = 'aa'";
$resultado = executarSQL($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>

<body>
    <h1>Perfil<h1>
            <tbody>
                
            <th><td><?php echo $usuario['usuario'] . "<br>";?></td></th>
                <?php echo $usuario['email'] . "<br>";?>
                <?php echo $usuario['senha'] . "<br>"; ?>
        
            </tbody>
            </form>
</body>

</html>