<?php
    Class Usuario{
        private $pdo;

        public $msgErro = "";


        public function conectar($nome, $host, $usuario, $senha){
            global $pdo;

            try{
                $pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);
            }catch(PDOException $erro){
                $msgErro = $erro->getMessage();
            }
        }

        public function cadastrar($nome, $telefone, $email, $senha){
            global $pdo;

            $sql = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :m");
            $sql->bindValue(":m", $email);
            $sql->execute();
            if($sql->rowCount()>0){
                return false;
            }else{
                $sql = $pdo->prepare("INSERT INTO usuario(nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
                $sql->bindValue(":n", $nome);
                $sql->bindValue(":t", $telefone);
                $sql->bindValue(":e", $email);
                $sql->bindValue(":s", md5(md5($senha)));
                $sql->execute();
                return true;
            }
        }

        public function logar ($email, $senha)
        {
            global $pdo;

            $verificarEmailSenha = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
            $verificarEmailSenha->bindValue(":e", $email);
            $verificarEmailSenha->bindValue(":s", md5(md5($senha)));
            $verificarEmailSenha->execute();
            if($verificarEmailSenha->rowCount()>0)
            {
                $dados = $verificarEmailSenha->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }else{
                return false;
            }
        }

        public function getUsuario (){
            global $pdo;
            try{
                $sql = $pdo->prepare("SELECT * FROM usuario");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){
                $this->msgErro = "Erro na consulta: " . $e->getMessage();
                return [];
            }
        }

        public function getUsuarioId($id_usuario) {

            $sql = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = :idu");
            $sql->bindParam(':idu', $id_usuario);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC); // Retorna os dados do usuário
        }

        public function editarUsuario($id_usuario, $nome, $telefone, $email) {

            $sql = $pdo->prepare("UPDATE usuario SET nome = :n, telefone = :t, email = :e WHERE id_usuario = :idu");
            $sql->bindParam(':idu', $id_usuario);
            $sql->bindParam(':n', $nome);
            $sql->bindParam(':t', $telefone);
            $sql->bindParam(':e', $email);
            return $sql->execute(); // Executa a atualização
        }
    
    }


?>