<?php
    class Conexao{
        private $server;
        private $db_name;
        private $user;
        private $password;

        function __construct(){
            $this->server = "localhost";
            $this->db_name = "taskday";
            $this->user = "root";
            $this->password = "";
        }

        public function conectar(){
            $con = new PDO(
                "mysql:host=$this->server;dbname=$this->db_name",
                $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            return $con;
        }
    }
?>