<?php
    if(isset($_GET["idtarefa"])){
        require_once "../../classes/Tarefa.php";
        $idtarefa = addslashes((int)$_GET["idtarefa"]);
        $tarefa = new Tarefa();
        $tarefa->excluir($idtarefa);
        header("Location: ../../home.php");
    } else header("Location: ../../home.php");
?>