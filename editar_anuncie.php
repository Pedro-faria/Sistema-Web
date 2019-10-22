<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Editar Anúncio</title>

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
      header("Location: Consultores_painel.php");
    }



		if (isset($_POST['enviar'])) {
			$nome=$_POST['nome'];
      echo $nome;
			$email=$_POST['email'];
			$telefone=$_POST['telefone'];
			$anuncio=$_POST['anuncio'];
			$observacao=$_POST['observacao'];
      $sql_editar = "UPDATE anuncie  set nome = '$nome', email = '$email', telefone ='$telefone', anuncio ='$anuncio',observacao ='$observacao'  WHERE id = $id";      
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


      $sql = "SELECT * FROM anuncie where id = $id"; 
      
      // executa a query
      $dados = mysql_query($sql, $conn) or die(mysql_error());
      
      // transforma os dados em um array
      $linha = mysql_fetch_assoc($dados);
            
      $nome = mysql_result($dados,0,"nome");      
      $email = mysql_result($dados,0,"email");  
      $telefone = mysql_result($dados,0,"telefone");  
	  $anuncio = mysql_result($dados,0,"anuncio");
      $observacao = mysql_result($dados,0,"observacao");
    }

?>
	
		<div class='container'>
			<div class='row'>
				<h1 align='center'> Editar Anúncio </h1>
			</div>
	<form class="form-horizontal" method='post'>
<fieldset>

<!-- Form Name -->
<legend align='center'>Anúncie</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Digite seu nome*" value="<?php echo !empty($nome)?$nome:'';?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email: </label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Digite seu email*" value="<?php echo !empty($email)?$email:'';?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
  <div class="col-md-2">
  <input id="telefone" name="telefone" type="text" placeholder="Telefone" value="<?php echo !empty($telefone)?$telefone:'';?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="anuncio">O que deseja anunciar?</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="anuncio-0">
      <input type="checkbox" name="anuncio[consultor]" id="anuncio-0" value="<?php echo !empty($anuncio)?$anuncio:'';?>"value="Consultor">
      Consultor
    </label>
    <label class="checkbox-inline" for="anuncio-1">
      <input type="checkbox" name="anuncio[empresa]" id="anuncio-1" value="Empresa">
      Empresa
    </label>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="anuncio">Receber Newsletter?</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="anuncio-0">
      <input type="checkbox" name="anuncio[consultor]" id="anuncio-0" value="Sim">
      Sim
    </label>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="observacao">Observação :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="observacao" value="<?php echo !empty($observacao)?$observacao:'';?>" name="observacao"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="enviar"></label>
  <div class="col-md-8">
    <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form><br>
		
</body>
</html>