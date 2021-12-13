<?php
    session_start();
    if(isset($_SESSION["idusuario"])){
       header("Location:home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="stylesheet" href="css/form-login.css">
</head>
<body>
    <div class="container">
        <div class="box-login">
            <form action="controles/usuario/logar.php" method="POST">                
                <div class="cabecalho">
                    <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <h1>Faça login</h1>
                </div>
                <hr>
                <div class="form-group">                    
                    <input type="email" name="email" required placeholder="E-mail">
                </div>

                <div class="form-group">                
                    <div class="input-group">
                    <input type="password" name="senha" class="inputSenha" required placeholder="Senha">
                    <button onclick="return false;" class="btn-revelaSenha"><i class="iconOlho fa fa-eye" aria-hidden="true"></i></button>
                    </div>
                    
                </div>

                <div class="form-group">
                    <p class="text-error">
                        <?php
                            if(isset($_SESSION['loginError'])) {
                                echo $_SESSION['loginError'];
                                unset($_SESSION['loginError']);
                            }
                        ?>
                    </p>                 
                    <button id="btn-login">Entrar</button>                    
                    <a href="cad-usuario.php" class="btn-cadUsuario">Não tem uma conta? Cadastre-se</a>
                </div>                
            </form>            
        </div>
    </div>
</body>
<script src="https://use.fontawesome.com/5cfb8ad1d5.js"></script>
<script src="js/login.js"></script>
</html>