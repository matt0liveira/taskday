<?php
    session_start();
    if(!isset($_SESSION["idusuario"])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container" id="container">                
        <div id="box" class="box">
            <header>
                <nav>
                    <div class="logo">
                        <a href="home.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i></a>                    
                        <h2>Task Day</h2>
                    </div>
                    <div class="logout">
                        <a href="controles/usuario/logout.php" class="btn-sair"><i class="fa fa-sign-out" aria-hidden="true"></i></a>                            
                    </div>                           
                </nav>
            </header>
            <div class="box-tarefa">
                <div id="back-overlay" class="back-overlay invisible"></div>           
                <h3>Últimas tarefas adicionadas</h3>
                <?php
                    require_once "classes/Conexao.php";                            
                    $conexao = new Conexao();
                    $conexao = $conexao->conectar();
                    $userlogado = $_SESSION["idusuario"];
                    $sql = "SELECT usuario.nome, usuario.email, tarefa.idusuario, tarefa.idtarefa, tarefa.nome_tarefa 'nome_tarefa', tarefa.descricao_tarefa 'descricao_tarefa', tarefa.data_tarefa 'data_tarefa' FROM tarefa INNER JOIN usuario ON usuario.idusuario = tarefa.idusuario WHERE tarefa.idusuario = $userlogado ORDER BY tarefa.idtarefa DESC";
                    $select = $conexao->query($sql);
                    $lista = $select->fetchAll(PDO::FETCH_OBJ);
                    foreach($lista as $linha) {
                ?>                              
                <div class="tarefa">
                    <label class="title-tarefa"><?php echo $linha->nome_tarefa;?></label>
                    <button id="btn-abrirM" class="btn-abrirM">Ver mais</button>
                </div>                            
                <form action="controles/tarefa/alterar.php" id="modal-tarefa" class="modal-tarefa invisible" method="POST">
					<div class="cabecalho">
						<button id="btnFechar" class="btnFechar" onclick="return false;"><i class="fa fa-times" aria-hidden="true"></i></button>                
						<h1>Detalhes da tarefa</h1>
        			</div>

                    <input type="hidden" name="idtarefa" value="<?php echo $linha->idtarefa;?>">

					<div class="form-group">
						<label for="nome">Título</label>
                        <div class="box-input">
                            <input type="text" name="nome" class="input" value="<?php echo $linha->nome_tarefa; ?>" readonly>
                            <button id="btn-block" class="btn-block" onclick="return false;"><i class="icon fa fa-lock" aria-hidden="true"></i></button>
                        </div>						
					</div>

					<div class="input-desc">
						<label for="descricao">Descrição</label>
                        <div class="box-input">
                            <input type="text" name="descricao" class="input" value="<?php echo $linha->descricao_tarefa;?>" readonly>
                            <button id="btn-block" class="btn-block" onclick="return false;"><i class="icon fa fa-lock" aria-hidden="true"></i></button>
                        </div>						
					</div>

					<div class="form-group">
						<label for="data">Data de conclusão</label>
                        <div class="box-input">
                            <input type="text" name="data" class="input" value="<?php echo $linha->data_tarefa;?>" readonly>
                            <button id="btn-block" class="btn-block" onclick="return false;"><i class="icon fa fa-lock" aria-hidden="true"></i></button>
                        </div>						
					</div>

					<div class="input-group">
						<a href="controles/tarefa/deletar.php?idtarefa=<?php echo $linha->idtarefa?>" id="btn-concluir" class="btn-concluir"><i class="fa fa-check" aria-hidden="true"></i></a>
						<button id="btn-editar" class="btn-editar" onclick="return true;"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						<button id="btn-excluir" class="btn-excluir" onclick="return false;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>                        
					</div>
                    <div id="caixa-confirmacao" class="caixa-confirmacao invisible">
                        <div class="header">
                            <h4>Excluir tarefa</h4>       
                        </div>                        
                        <p>Tem certeza que deseja excluir esta tarefa?</p>
                        <hr>
                        <div class="btns-confirm">
                            <a href="controles/tarefa/deletar.php?idtarefa=<?php echo $linha->idtarefa?>" id="btnApagar">Apagar</a>
                            <a href="home.php" id="btnCancel">Cancelar</a>
                        </div>                            
                    </div>
                </form>
                <?php }?>
            </div>        
            <div class="section-cadastro">
                <button id="btn-cadastro" class="btn-cadastro"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>                            
        </div>
    </div>
    <div id="box-modal" class="box-modal invisible"></div>               
    <form action="controles/tarefa/cadastrar.php" method="POST" id="form-modal" class="form-modal invisible">
        <div class="cabecalho">            		
            <button id="btn-fechar" class="btn-fechar" onclick="return false;"><i class="fa fa-times" aria-hidden="true"></i></button> 	    
            <h1>Adicionar tarefa</h1>			            
        </div>
        <hr>
        <div class="form-group">
            <label for="nome">Título*</label>
            <input type="text" name="nome" autocomplete="off" required>
        </div>

        <div class="input-desc">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao">
        </div>

        <div class="form-group">
            <label for="data">Data de conclusão*</label>
            <input type="text" name="data" required>
        </div>		

        <div class="form-button">
            <input type="submit" value="Adicionar">
        </div>
    </form>           
</body>
<script src="https://use.fontawesome.com/5cfb8ad1d5.js"></script>
<script src="js/script.js"></script>
</html>