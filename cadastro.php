<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="css/cadastro.css">

</head>
<body>
    <div class="containerGeral">

        <h2 class="title">CADASTRO DE USUÁRIO</h2>
        
        <form action="" method="POST">

            <div class="containerDados containerNome">
                <label for="">Nome:</label>
                <input type="text" name="nome" placeholder="Digite seu nome"><br><br>
            </div>
            
            <div class="containerDados containerTelefone">
                <label for="">Telefone:</label>
                <input type="tel" name="tel" placeholder="Digite seu telefone"><br><br>
            </div>
            
            <div class="containerDados containerEmail">
                <label for="">E-mail:</label>
                <input type="email" name="email" placeholder="Digite seu E-mail"><br><br>
            </div>
            
            <div class="containerDados containerSenha">
                <label for="">Senha:</label>
                <input type="password" name="senha" placeholder="Digite sua senha"><br><br>
            </div>

            <div class="containerDados containerConfSenha">
                <label for="">Confirmar Senha:</label>
                <input type="password" name="confSenha" placeholder="Confirme sua senha"><br><br>
            </div>
            
            <div class="containerBtn">
                <a href="index.php" class="voltar">Voltar</a>
                <input type="submit" value="CADASTRAR" class="cadastrar"><br><br>
            </div>
        </form>
    </div>

<?php
    if(isset($_POST['nome']))
    {
        $nome = $_POST['nome'];
        $telefone = $_POST['tel'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = addslashes( $_POST['confSenha']);

        // Verificar se todos os campos estao preenchidos
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha))
        {
            $usuario->conectar("cadastroturma32", "localhost", "root", "");
            if($usuario->msgErro == "")
            {
                if($senha == $confSenha)
                {
                    if($usuario->cadastrar($nome,$telefone,$email,$senha))
                    {
                        ?>

                            <div id="msn-sucesso">
                                Cadastrado com sucesso
                                Clieque <a href="index.php">aqui</a> para logar
                            </div>
                        <?php
                        
                    }
                    else
                    {
                        ?>
                        <div id="msn-sucesso">
                            E-mail já cadasatrado. 
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div id="msn-sucesso">
                        A senha e Confirmar Senha não correspondem
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div id="msn-sucesso">
                    <?php echo "Erro: ".$usuario->msgErro;?>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div id="msn-sucesso">
                Preencha todos os campos.
            </div>
            <?php
        }
    }

?>
</body>
</html>