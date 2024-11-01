<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
</head>
<body>
    <h2>CRUD - CREATE READ UPDATE DELETE</h2>
    <h3>Tela Login</h3>

    <form action="areaprivada.php" method="POST">
        <label >Usuário:</label>
        <input type="email" name="email" placeholder="Digite seu E-mail"><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Digite sua Senha"><br><br>

        <input type="submit" value="logar"><br><br>
        <a href="cadastro.php">Cadastre-se</a>
    </form>

</body>
</html>