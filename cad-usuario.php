<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de cadastro</title>
    <link rel="stylesheet" href="css/form-cadastro.css">
</head>
<body>
    <div class="container">
        <div class="box-cadastro">
            <form action="controles/usuario/cadastrar.php" method="post">
                <div class="cabecalho">
                    <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <h1>Faça cadastro</h1>
                </div>
                <hr>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <div class="input-group">
                        <input type="password" name="senha" class="inputSenha" required>
                        <button onclick="return false;" class="btn-revelaSenha"><i class="iconOlho fa fa-eye" aria-hidden="true"></i></button>
                    </div>                    
                </div>

                <div class="form-group">
                    <label for="confirmSenha">Confirme sua senha</label>
                    <div class="input-group">
                        <input type="password" name="confirmSenha" class="inputSenha" required>
                        <button onclick="return false;" class="btn-revelaSenha"><i class="iconOlho fa fa-eye" aria-hidden="true"></i></button>
                    </div>                    
                </div>                

                <div class="form-button">     
                    <p class="text-error">
                        <?php
                            if(isset($_SESSION['cadastroError'])) {
                                echo $_SESSION['cadastroError'];
                                unset($_SESSION['cadastroError']);
                            }
                        ?>
                    </p>                 
                    <button>Cadastrar</button>                     
                    <a href="login.php">Já tem uma conta? Faça login</a>    
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://use.fontawesome.com/5cfb8ad1d5.js"></script>
<script src="js/login.js"></script>
</html>