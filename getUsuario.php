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
</head>
<body>
    

    <h1>Lista de Usuário</h1>

    <table border="1">
        <tr>
            <th>id_usuario</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php foreach($dados_usuario as $usuario): ?>

        <tr>
            <td><?php echo $usuario['id_usuario']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['telefone']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td>
                <a href="editar.php?id_usuario=<?php echo $usuario['id_usuario']; ?>">
                    <button>Editar</button>
                </a>
            </td>


            <td>
                <form method="POST" action="">
                    <input type="hidden" name="excluir_id" value="<?php echo $usuario['id_usuario']; ?>">
                    <input type="submit" value="Excluir">
                </form>
            </td>

        </tr>

        <?php endforeach; ?>
    </table>

    <?php

    ?>
</body>
</html>