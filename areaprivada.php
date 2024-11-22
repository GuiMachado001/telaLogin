<?php
    require_once 'usuario.php';

    $usuario = new Usuario;


    $usuario->conectar("cadastroturma32", "localhost", "root", "");


    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $dados_usuario = $usuario->getUsuarioId($id_usuario); 
    } else {
        $dados_usuario = $usuario->getUsuario();
    }


    if (isset($_POST['excluir_id'])) {
        $id_usuario_excluir = $_POST['excluir_id']; 
        if ($usuario->excluirUsuario($id_usuario_excluir)) {
            echo "<p>Usuário excluído com sucesso.</p>";
            exit;
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/usuario.css">

</head>
<body>
    
<div class="containerGeral">

    <div class="containerTitle">
        <h1>Lista de Usuário</h1>
    </div>
    
    <table border="0">
        <tr>
            <th class="containerTop">id_usuario</th>
            <th class="containerTop">Nome</th>
            <th class="containerTop">Telefone</th>
            <th class="containerTop">Email</th>
            <th class="containerTop">Ações</th>
        </tr>
        
        <?php foreach($dados_usuario as $usuario): ?>
            
            <tr>
                <td class="containerConteudo"><?php echo $usuario['id_usuario']; ?></td>
                <td class="containerConteudo"><?php echo $usuario['nome']; ?></td>
                <td class="containerConteudo"><?php echo $usuario['telefone']; ?></td>
                <td class="containerConteudo"><?php echo $usuario['email']; ?></td>
                <td class="containerBtn containerConteudo">
                    <a href="editar.php?id_usuario=<?php echo $usuario['id_usuario']; ?>">
                    <button>Editar</button>
                </a>
                <form method="POST" action="" >
                    <input type="hidden" name="excluir_id" value="<?php echo $usuario['id_usuario']; ?>">
                    <input type="submit" value="Excluir">
                </form>
            </td>
            
            
            <td>
                </td>
                
            </tr>
            
            <?php endforeach; ?>
        </table>
        <div class="containerBtn">
            <a href="index.php"><button class="btnVoltar">Voltar</button></a>
            <a href="cadastro.php"><button class="btnCadastrar">Cadastrar Usuario</button></a>
        </div>
    </div>


    <?php

    ?>
</body>
</html>