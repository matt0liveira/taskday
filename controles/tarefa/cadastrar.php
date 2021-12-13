<?php
    require_once "../../classes/Tarefa.php";    
    if(isset($_POST["nome"], $_POST["data"])) {
        session_start();
        echo $_SESSION["idusuario"];
        foreach($_POST as $i => $valor) {
            $$i = $valor;
        }
        $task = new Tarefa();
        $task->setUsuario($_SESSION["idusuario"]);
        $task->setNome_Tarefa($nome);
        $task->setDescricao($descricao);
        $task->setData($data);
        $task->cadastrar();
        header("Location:../../home.php");
    } else {
        header("Location:../../home.php");
    }
?>