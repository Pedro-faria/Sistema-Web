<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultoria ERP - Colabore</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap-responsive.css" rel="text\css">
    <link href="css/bootstrap-responsive.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" /> 
	 <script type="text/javascript">
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
                <li><a href="formulario.php" >Formulário</a></li>
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
          
        </div></div
        <!-- /.container -->
    </nav>
<br><br><br>
	
	<?php require_once('funcoes.php'); ?>

<?php

		if (isset($_POST['enviar'])) {
      $anuncio="";
			$nome=$_POST['nome'];
      $consultor=$_POST['anuncio-0'];
      $empresa=$_POST['anuncio-1'];


      if(!empty($consultor) && !empty($empresa)){
        $anuncio = $consultor . "/" . $empresa;
      } else if (!empty($consultor)) {
        $anuncio = $consultor;
      } else if (!empty($empresa)) {
        $anuncio = $empresa;
      }


			$email=$_POST['email'];
			$telefone=$_POST['telefone'];      
			$observacao=$_POST['observacao'];
		 $sql_inserir = "insert into anuncie (nome,email,telefone,anuncio,observacao) VALUES ('$nome','$email','$telefone','$anuncio','$observacao')";
		 conexao();
		 if (inserir($sql_inserir)){
		 	echo ("Registro adicionado com sucesso, ID do registro : ".mysql_insert_id());
		 	unset($_POST['cadastrar']);
		 }else{
		 	echo ("Erro na rotina de insercao".mysql_error());

		 }
		}
?>
	
	
<div class='row'>
  <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12' >
    <h4 align='center'>Ajude-nos a aprimorar nossa base de conhecimento, sua ajuda é fundamental para nós.</h4>
        <h5 align='center'>O Consultoriaemerp.com disponibiliza um ambiente onde especialistas em sistemas ERP possam contribuir com a nossa aplicação.</h5>
		
		
		<form class="form-horizontal" method='post'>
<fieldset>

<!-- Form Name -->
<legend align='center'>Solicite um contato</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Digite seu nome*" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email: </label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Digite seu email*" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
  <div class="col-md-2">
  <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="anuncio">O que deseja anunciar?</label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="anuncio-0">
      <input type="checkbox" name="anuncio[consultor]" id="anuncio-0" value="Consultor">
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
    <textarea class="form-control" id="observacao" name="observacao"></textarea>
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


  <div class='container-fluid'>
    <div class='row'>
        <div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'><img class='img-rodape' src='img/rodape.jpg'/>
        </div>
    <!--<div class='span5'>teste</div>
    <div class='span5'>yrdyr</div>-->        
        </div>
      

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </div><!--Fechando o container-fluid-->
  </body>
</html>