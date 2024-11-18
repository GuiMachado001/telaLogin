<?php
    require_once 'usuario.php';

    $usuario = new Usuario;


    $usuario->conectar("cadastroturma32", "localhost", "root", "");

    $usuario = $usuario->getUsuario();
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

        <?php foreach($usuario as $usuario): ?>

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
        </tr>

        <?php endforeach ?>
    </table>

    <!-- <?php
        $idUsuario = $_GET['id_usuario'];
            
            if($usuario->editarUsuario())
            {
                header("location: editar.php");
            }else{
            ?>
            <div id="msn-sucesso">
                Erro
                Clieque <a href="index.php">aqui</a> para logar
            </div>
            
        <?php
    }


    ?> -->
</body>
</html>