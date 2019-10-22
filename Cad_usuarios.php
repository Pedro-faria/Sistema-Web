<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastro de usuarios</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    
  </head>
  <body>
<?php require_once('funcoes.php'); ?>

<?php

		if (isset($_POST['enviar'])) {
			$nome=$_POST['nome'];
			$nome_usuario=$_POST['nome_usuario'];
			$email=$_POST['email'];
			$senha=$_POST['senha'];
		 $sql_inserir = "insert into usuarios (nome,nome_usuario,email,senha) VALUES ('$nome','$nome_usuario','$email','$senha')";
		 conexao();
		 if (inserir($sql_inserir)){
		 	echo ("Registro adicionado com sucesso, ID do registro : ".mysql_insert_id());
		 	unset($_POST['cadastrar']);
		 }else{
		 	echo ("Erro na rotina de insercao".mysql_error());

		 }
		}
?>
<div class='container'>
        <br><br>
        <div class='row'>
<div align='center'>
    
        <h3 class="form-signin-heading">Cadastro de Usuários</h2><br><br><br>
       <form class="form-horizontal" method='post' >


<!-- Text input-->
<p>
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome Completo: </label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="Digite seu nome completo" class="form-control input-md" required="">
    
  </div>
</div></p>

<!-- Text input-->
<div class="form-group"><p>
  <label class="col-md-4 control-label" for="nome_usuario">Nome do usuário:</label>  
  <div class="col-md-4">
  <input id="nome_usuario" name="nome_usuario" type="text" placeholder="Digite o nome do seu usuário" class="form-control input-md" required="">
    
  </div>
 
</div></p>

<!-- Text input--><p>
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email: </label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Digite seu email" class="form-control input-md" required="">
    
  </div>
</div></p>

<!-- Password input--><p>
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Senha:</label>
  <div class="col-md-4">
    <input id="senha" name="senha" type="password" placeholder="Digite sua senha" class="form-control input-md" required="">
    
  </div>
</div></p><br>

<!-- Button (Double) --> <div align='center'>
<div class="form-group">
  <label class="col-md-4 control-label" for="enviar" align='center'></label>
  <div class="col-md-4">
    <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>

</div>
</div>
</body>
</html>