<?php
    require_once "Conexao.php";

    class Usuario{
        private $idusuario;
        private $nome;
        private $email;
        private $senha;
        
        function __construct(){
            $this->idusuario = 0;
            $this->nome = "";
            $this->email = "";
            $this->senha = "";
            $this->c = new Conexao();            
        }

        /**
         * Get the value of idusuario
         */ 
        public function getIdusuario()
        {
                return $this->idusuario;
        }

        /**
         * Set the value of idusuario
         *
         * @return  self
         */ 
        public function setIdusuario($idusuario)
        {
                $this->idusuario = $idusuario;

                return $this;
        }

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }

        public function cadastrar(){
            $con = $this->c->conectar();
            $sql = "INSERT INTO usuario (idusuario, nome, email, senha) VALUES(0, :n, :e, sha1(:s))";
            $insert = $con->prepare($sql);
            $insert->bindParam(":n", $this->nome);
            $insert->bindParam(":e", $this->email);
            $insert->bindParam(":s", $this->senha);
            return $insert->execute();
        }

        public function logar(){
            $con = $this->c->conectar();
            $sql = "SELECT idusuario, email, nome, COUNT(*) 'qtd' FROM usuario WHERE email = :e AND senha = sha1(:s)";
            $select = $con->prepare($sql);
            $select->bindParam(":e", $this->email);
            $select->bindParam(":s", $this->senha);
            $select->execute();
            $dados = $select->fetch(PDO::FETCH_OBJ);
            if($dados->qtd == 1){
                session_start();
                $_SESSION["idusuario"] = $dados->idusuario;
                return true;
            } else{
                return false;
            }            
        }
    }
?>