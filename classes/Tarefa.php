<?php
    require_once "Conexao.php";
    class Tarefa{
        private $idtarefa;
        private $usuario;
        private $nome_tarefa;
        private $descricao_tarefa;
        private $data_tarefa;
        
        function __construct(){
            $this->idtarefa = 0;
            $this->usuario = "";
            $this->nome_tarefa = "";
            $this->descricao = "";
            $this->data = "";
            $this->c = new Conexao();
        }

        

        /**
         * Get the value of idtarefa
         */ 
        public function getIdtarefa()
        {
                return $this->idtarefa;
        }

        /**
         * Set the value of idtarefa
         *
         * @return  self
         */ 
        public function setIdtarefa($idtarefa)
        {
                $this->idtarefa = $idtarefa;

                return $this;
        }

        /**
         * Get the value of idusuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */ 
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of nome_tarefa
         */ 
        public function getNome_tarefa()
        {
                return $this->nome_tarefa;
        }

        /**
         * Set the value of nome_tarefa
         *
         * @return  self
         */ 
        public function setNome_tarefa($nome_tarefa)
        {
                $this->nome_tarefa = $nome_tarefa;

                return $this;
        }

        /**
         * Get the value of descricao
         */ 
        public function getDescricao()
        {
                return $this->descricao;
        }

        /**
         * Set the value of descricao
         *
         * @return  self
         */ 
        public function setDescricao($descricao)
        {
                $this->descricao = $descricao;

                return $this;
        }

        /**
         * Get the value of data
         */ 
        public function getData()
        {
                return $this->data;
        }

        /**
         * Set the value of data
         *
         * @return  self
         */ 
        public function setData($data)
        {
                $this->data = $data;

                return $this;
        }

        public function cadastrar(){
            $conexao = $this->c->conectar();
            $sql = "INSERT INTO tarefa VALUES(0, :user, :n, :descricao, :data_tarefa)";
            $insert = $conexao->prepare($sql);
            $insert->bindParam(":user", $this->usuario);
            $insert->bindParam(":n", $this->nome_tarefa);
            $insert->bindParam(":descricao", $this->descricao);
            $insert->bindParam(":data_tarefa", $this->data);
            return $insert->execute();
        }

        public function excluir($idtarefa){
			$conexao = $this->c->conectar();
			$sql = "DELETE FROM tarefa WHERE idtarefa = :idtarefa";
			$delete = $conexao->prepare($sql);
			$delete->bindParam(':idtarefa',$idtarefa);
			return $delete->execute();
        }

		public function alterar(){
			$conexao = $this->c->conectar(); 
			$sql = "UPDATE tarefa SET nome_tarefa = :nome_tarefa, descricao_tarefa = :descricao_tarefa, data_tarefa = :data_tarefa WHERE idtarefa = :idtarefa";
			$update = $conexao->prepare($sql);
			$update->bindParam(":nome_tarefa",$this->nome_tarefa);
			$update->bindParam(":descricao_tarefa",$this->descricao);
			$update->bindParam(":data_tarefa", $this->data);
			$update->bindParam(":idtarefa", $this->idtarefa);
			return $update->execute();
		}
    }
?>