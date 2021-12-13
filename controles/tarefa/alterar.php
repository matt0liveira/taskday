<?php
    require_once "../../classes/Tarefa.php";
    if(isset($_POST)){
        $idtarefa = addslashes((int)$_POST["idtarefa"]);
        $nome = addslashes($_POST["nome"]);
        $descricao = addslashes($_POST["descricao"]);
        $data = addslashes($_POST["data"]);
        date("Y-m-d", $data);
        $tarefa = new Tarefa();
        $tarefa->setNome_tarefa($nome);
        $tarefa->setDescricao($descricao);
        $tarefa->setData($data);        
        $tarefa->setIdtarefa($idtarefa);
        $tarefa->alterar();
        header("Location: ../../home.php");
    } else{
        header("Location: ../../home.php");
    }
?>