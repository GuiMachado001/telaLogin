<?php
    require_once 'usuario.php';

    $usuario = new Usuario;
    $usuario->conectar("cadastroturma32", "localhost", "root", "");


    if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $dados_usuario = $usuario->getUsuarioId($id_usuario);
    } else {
        header('Location: index.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
    
        $usuario->editarUsuario($id_usuario, $nome, $telefone, $email);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/editarUser.css">

</head>
<body>
    <div class="containerGeral">

    <div class="containerTitle">
        <h1>Editar Usuário</h1>
    </div>

    
        
        <form method="POST">

            <input type="hidden" name="id_usuario" value="<?php echo $dados_usuario['id_usuario']; ?>">
            
            <div class="containerConteudo">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $dados_usuario['nome']; ?>" required><br><br>
            </div>
            
            <div class="containerConteudo">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $dados_usuario['telefone']; ?>" required><br><br>
            </div>
            
            <div class="containerConteudo">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $dados_usuario['email']; ?>" required><br><br>
            </div>
                
            <div class="containerBtn">
                <button type="submit">Salvar alterações</button>
            </div>
        </form>
    </div>

    <a href="getUsuario.php">Voltar</a>
</body>
</html>
