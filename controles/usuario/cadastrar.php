<?php
    require_once "../../classes/Usuario.php";
    session_start();
    //Verificando se foi passado o valor
    if(isset($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["confirmSenha"])) {
        //Recuperando os valores de forma dinâmica  
        foreach($_POST as $i => $valor) {
            $$i = $valor;
        }

        if($confirmSenha == $senha){
            $u = new Usuario();
            $u->setNome($nome);
            $u->setEmail($email);
            $u->setSenha($senha);
            $u->cadastrar();
            header("Location: ../../login.php");
        } else{
            header("Location: ../../cad-usuario.php");
            $_SESSION['cadastroError'] = "Campos 'Senha' e 'Confirmar senha' devem ser iguais";
        }
    } else{
        header("Location: ../../login.php");
    }
?>