<?php
    require_once 'usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>

    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="containerGeral">

        <div class="containerTitle">
            <h2>CRUD - CREATE READ UPDATE DELETE</h2>
            <h3>Tela Login</h3>
        </div>
        
        <div class="containerForm">
            <form method="POST">
                <div class="containerEmail">
                    <label >Usuário:</label>
                    <input type="email" name="email" placeholder="Digite seu E-mail"><br><br>
                </div>
                
                <div class="containerSenha">
                    <label>Senha:</label>
                    <input type="password" name="senha" placeholder="Digite sua Senha"><br><br>
                </div>
                
                <div class="containerBtn">
                    <a href="cadastro.php">Cadastre-se</a><br><br>
                    <a href="getUsuario.php">Usuarios</a>
                    <input type="submit" value="logar"><br><br>
                </div>
            </form>
        </div>

    </div>

<?php

    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($email) && !empty($senha))
        {
            $usuario->conectar("cadastroturma32", "localhost", "root", "");
            if($usuario->msgErro == "")
            {
                if($usuario->logar($email, $senha))
                {
                    header("location: areaprivada.php");
                }else{
                    ?>
                        <div id="msn-sucesso">
                            Email ou Senha incorreto
                            Clieque <a href="index.php">aqui</a> para logar
                        </div>
                        
                    <?php
                }
    
            }else{

                ?>
                <div id="msn-sucesso">
                    <?php echo "Erro: ".$usuario->$msgErro ?>
                    Clieque <a href="index.php">aqui</a> para logar
                </div>
                
                <?php
            }
        }else{

            ?>
            <div id="msn-sucesso">
                Preencha todos os campos
                Clieque <a href="index.php">aqui</a> para logar
            </div>
            
            <?php
        
        }

    }

?>
</body>
</html>