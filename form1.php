<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultoria ERP - Autentificação</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap-responsive.css" rel="text\css">
    <link href="css/bootstrap-responsive.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />	

 
	 <script type="text/javascript">
	 
    function loginsuccessfully(){
        setTimeout("window.location='formulario.php'", 3000);
      }
      function loginfailed(){
        setTimeout("window.location='form1.php'", 3000);
      }
	function Nova()
	{
	location.href=" Login.php"
	}
	</script>
     
  </head>
 
 <body>

 <div class='row'>
	<div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand" href="index.php">Consultoria ERP</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li><a href="form1.php" >Formulário</a></li>
               <li> <a href="definicao.php" >Definição ERP</a> </li>
               <li><a href="Consultores.php">Especialistas</a></li>
              <li><a href="noticias.php">Noticias</a></li>
              <li><a  href="anuncie.php">Anuncie</a></li>
            </ul>
            <form class="navbar-form pull-right">
                                  
              <input type="button" value='Área Restrita' onClick="Nova()" class='btn'> 
            </form>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
          
        </div></div>
        <!-- /.container -->
    </nav><br><br><br>
	</div></div>
	
	<?php require_once('funcoes.php'); ?>

<?php

		if (isset($_POST['confirmar'])) {
			$nome=$_POST['nome'];
			$cpf=$_POST['cpf'];
			$email=$_POST['email'];
			$empresa=$_POST['empresa'];
		 $sql_inserir = "insert into empresa (nome,cpf,email,empresa) VALUES ('$nome','$cpf','$email','$empresa')";
		 conexao();
		 if (inserir($sql_inserir)){
		 	echo "<center>Você registrado  com sucesso! Aguarde um instante.</center>";
			echo "<script>loginsuccessfully()</script>"; 
		 	unset($_POST['cadastrar']);
		 }else{
		 	echo "<center>Tente novamente</center>";
			echo "<script>loginfailed()</script>";

		 }
		}
?>
	
	<div class='container'>
	<div class='row'>
	
	<form class="form-horizontal" method='POST'>
<fieldset >

<!-- Form Name -->
<legend align ='center'>Preencha os dados do Formulário</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome:</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="Digite seu nome *" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf">CPF:</label>  
  <div class="col-md-4">
  <input id="cpf" name="cpf" type="text" placeholder="Digite seu CPF *" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email:</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Digite seu email" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="empresa">Nome da Empresa:</label>  
  <div class="col-md-4">
  <input id="empresa" name="empresa" type="text" placeholder="" class="form-control input-md">
  <span class="help-block">opcional</span>  
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="confirmar"></label>
  <div class="col-md-8">
    <button id="confirmar" name="confirmar" class="btn btn-success">Confirmar</button>
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>
</div></div>
<div class='row'>
        <div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'><img class='img-rodape' src='img/rodape.jpg'/>
        </div>
        </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </div><!--Fechando o container-fluid-->
  </body>
</html>