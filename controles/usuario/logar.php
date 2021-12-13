<?php
    require_once "../../classes/Usuario.php";
    session_start();
    if(isset($_POST["email"], $_POST["senha"])) {
        $email = addslashes($_POST["email"]);
        $senha = addslashes($_POST["senha"]);
        $u = new Usuario();
        $u->setEmail($email);
        $u->setSenha($senha);
        if($u->logar()){
            header("Location: ../../home.php");
        } else{
            header("Location: ../../login.php");
            $_SESSION["loginError"] = "E-mail e/ou senha incorreta";
        }
    } else{
        header("Location:../../login.php");
    }
?>