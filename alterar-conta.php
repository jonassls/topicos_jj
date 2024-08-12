<?php
session_start();
$Nome_arquivo = $_GET['foto'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Arquivo</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Alterar a foto de perfil:<br>
        <input type="hidden" name="Nome_arquivo" value="<?= $Nome_arquivo ?>">
       <input type="file" name="arquivo"><br><br><br>
       Alterar nome de usuário: <br>
       <input type="text" name="usuario"> <br> <br><br>
        Alterar email: <br>
        <input type="text" name="email"> <br><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>