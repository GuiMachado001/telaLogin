<?php
require_once 'usuario.php';

$usuario = new Usuario;
$usuario->conectar("cadastroturma32", "localhost", "root", "");


    $dados_usuario = $usuario->getUsuarioId($id_usuario);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $dados_usuario['nome']; ?>" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" value="<?php echo $dados_usuario['telefone']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $dados_usuario['email']; ?>" required><br><br>

        <button type="submit">Salvar alterações</button>
    </form>

    <a href="index.php">Voltar para a lista</a>
</body>
</html>
