<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Editar Usuário</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    
  </head>
  <body>
<?php require_once('funcoes.php'); ?>

<?php

    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
  
    if ( null==$id ) {
      header("Location: usuarios_painel.php");
    }



		if (isset($_POST['enviar'])) {
			$nome=$_POST['nome'];
      echo $nome;
			$nome_usuario = $_POST['nome_usuario'];
			$email = $_POST ['email'];
			$senha = $_POST['senha'];
			
      $sql_editar = "UPDATE usuarios  set nome = '$nome', nome_usuario = '$nome_usuario', email ='$email', senha ='senha'  WHERE id = $id";      
		  conexao();
		  if (inserir($sql_editar)){
		 	  echo ("Registro alterado com sucesso!");
		 	  unset($_POST['enviar']);
		  }else{
		 	  echo ("Erro na rotina de insercao".mysql_error());
		  }
		} else {

      error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
      $banco   ='consultoriaemerp';
   	  $usuario ='root';
      $senha   ='';
   	  $host    ='localhost';
      $conn    = mysql_connect($host,$usuario,$senha) or die ("Erro na Conexão : -".mysql_error());
      mysql_select_db("$banco") or die ("Erro na Conexão : -".mysql_error());
      mysql_query("SET NAMES 'UTF8");
      mysql_query("SET CHARACTER_SET_CONNECTION=UTF8");
      mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
      mysql_query("SET CHARACTER_SET_RESULTS=UTF8");


      $sql = "SELECT * FROM usuarios where id = $id"; 
      
      // executa a query
      $dados = mysql_query($sql, $conn) or die(mysql_error());
      
      // transforma os dados em um array
      $linha = mysql_fetch_assoc($dados);
            
      $nome = mysql_result($dados,0,"nome"); 
	  $nome_usuario = mysql_result($dados,0,"nome_usuario");
      $email = mysql_result($dados,0,"email");  
      $senha = mysql_result($dados,0,"senha");
      
    }

?>
	
		<div class='container'>
			<div class='row'>
				<h1 align='center'> Editar Usuário </h1>
			</div>
	<form class="form-horizontal" method='post' >
<!-- Text input-->
<p>
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome Completo: </label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="Digite seu nome completo" class="form-control input-md" value="<?php echo !empty($nome)?$nome:'';?>" required="">
    
  </div>
</div></p>

<!-- Text input-->
<div class="form-group"><p>
  <label class="col-md-4 control-label" for="nome_usuario">Nome do usuário:</label>  
  <div class="col-md-4">
  <input id="nome_usuario" name="nome_usuario" type="text" placeholder="Digite o nome do seu usuário" value="<?php echo !empty($nome_usuario)?$nome_usuario:'';?>" class="form-control input-md" required="">
    
  </div>
 
</div></p>

<!-- Text input--><p>
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email: </label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Digite seu email" class="form-control input-md" value="<?php echo !empty($email)?$email:'';?>" required="">
    
  </div>
</div></p>

<!-- Password input--><p>
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Senha:</label>
  <div class="col-md-4">
    <input id="senha" name="senha" type="password" placeholder="Digite sua senha" value="<?php echo !empty($senha)?$senha:'';?>" class="form-control input-md" required="">
    
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
</form>
</form>


</body>
</html>