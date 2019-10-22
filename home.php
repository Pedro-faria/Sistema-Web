<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultoria ERP - Inicial</title>

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
<?php require_once('funcoes.php'); ?>

<?php

    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
  
    if ( null==$id ) {
      header("Location: index.php");
    }


      error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
      $usuario ='root';
      $senha   ='';
      $host    ='localhost';
      $banco   ='consultoriaemerp';
      $conn    = mysql_connect($host,$usuario,$senha) or die ("Erro na Conexão : -".mysql_error());
      mysql_select_db("$banco") or die ("Erro na Conexão : -".mysql_error());
      mysql_query("SET NAMES 'UTF8");
      mysql_query("SET CHARACTER_SET_CONNECTION=UTF8");
      mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
      mysql_query("SET CHARACTER_SET_RESULTS=UTF8");


      $sql = "SELECT * FROM consultores where id = $id"; 
      
      // executa a query
      $dados = mysql_query($sql, $conn) or die(mysql_error());
      
      // transforma os dados em um array
      $linha = mysql_fetch_assoc($dados);
      $imagem = mysql_result($dados,0,"imagem");            
      $nome = mysql_result($dados,0,"nome");      
      $email = mysql_result($dados,0,"email");  
      $nascimentorig = mysql_result($dados,0,"nascimento");  
      $nascimento = date("d-m-Y",strtotime($nascimentorig));   
      $site = mysql_result($dados,0,"site");  
      $telefone = mysql_result($dados,0,"telefone");  
      $rua = mysql_result($dados,0,"rua");  
      $cidade = mysql_result($dados,0,"cidade");  
      $area_atuacao = mysql_result($dados,0,"area_atuacao");  
      $experiencia_profissional= mysql_result($dados,0,"experiencia_profissional");
      $bairro = mysql_result($dados,0,"bairro"); 
      $numero = mysql_result($dados,0,"numero"); 
    

?>  
  
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
          
        </div></div
        <!-- /.container -->
    </nav>
	
<div class='container-fluid'>
      <div class='row'><!-- Iniciando a imagem -->
     
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item">
          <img class='img-responsive' src="img/erp_1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Noticias sobre ERP.</h1>
              <p class="lead">Consulte todas as informações sobre o mercado de sistemas erp's</p>
              <a class="btn btn-large btn-primary" href="Noticias.php">Saiba +</a>
            </div>
          </div>
        </div>
        <div class="item active">
          <img class='img-responsive' src="img/erp_carousel.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>O Que é um erp?</h1>
              <p class="lead">Veja aqui a definição do que é um erp e quais são suas funcionalidades</p>
              <a class="btn btn-large btn-primary" href="definicao.php">Saiba +</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img class='img-responsive' src="img/IMAGE_3.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Formulário</h1>
              <p class="lead">Selecione o sistema ERP de acordo com as informações de sua empresa aqui! </p>
              <a class="btn btn-large btn-primary" href="form1.php">Visite</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
    </div>
  </div>
  </div>
</div></div>

<div class='container'>
   <div class='row'>
	  
	  <div class='col-md-6 col-sm-6 col-xs-12 col-lg-6'>
		<h4 align='center'><b>Especialistas em sistemas ERP entrevistados</b></h4>
        <p align='center'>-----------------------------------------------------------------</p>
      </div>
  
	  <div class='col-md-6 col-sm-6 col-xs-12 col-lg-6'>
		<h4 align='center'><b>Últimas Noticias</b></h4>
        <p align='center'>---------------------------------------------------------</p>
      </div>
   </div>
  <div class='row'>
      <div class='col-md-6 col-sm-6 col-xs-12 col-lg-6'>
		       <?php
            echo '<img class="img-img-circle" src="data:image/jpeg;base64,'.
            base64_encode($imagem).
            '" width="260" height="250">' . "</dd>"
         ?>
       </div>
      	  
      <div class='col-md-3 col-sm-3 col-xs-12 col-lg-3'> 
    <p align='center'><div align='center'><a href='http://erpnews.com.br/2014/totvs-oferece-nova-solucao-onde-aproxima-industria-dos-consumidores/'>
	<img class='img-inicio' src="img/totvs.jpg" align='center'/></a></div></p><br><br>
	<p align='center'><div align='center'><a href='http://erpnews.com.br/2014/crescimento-do-mercado-de-lojas-de-conveniencia-traz-necessidade-de-novas-ferramentas-em-tecnologia-para-o-segmento/'>
	<img class='img-inicio' src="img/loja.jpg" align='center'/></a></div></p><br><br>
    <!----></div>
	  <div class='col-md-3 col-sm-3 col-xs-12 col-lg-3'>
    <p><a href='http://erpnews.com.br/2014/totvs-oferece-nova-solucao-onde-aproxima-industria-dos-consumidores/'>TOTVS oferece nova solução onde aproxima a indústria dos consumidores</a></p>
	<p>A empresa contratante do software de gestão pode customizar a tela com seu logo e configurar perfis das pessoas autorizadas a acessarem o sistema.</p>
	<br><br>
	<p><a href='http://erpnews.com.br/2014/crescimento-do-mercado-de-lojas-de-conveniencia-traz-necessidade-de-novas-ferramentas-em-tecnologia-para-o-segmento/'>Crescimento do mercado de lojas traz necessidade de novas ferramentas em tecnologia para o segmento</a></p>
	<p>Essa perspectiva positiva de crescimento faz com que as empresas que administram as lojas de conveniência aprimorem seus processos e implantem soluções que agilizem o atendimento aos clientes.</p>
	</div>
  </div>
  </div>
  <div class='row'>
  <div class='col-xs-6 col-sm-12 col-md-12 col-lg-12'>
  <div align='right'><p><div class="fb-like" data-href="http://consultoriaemerp.com/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></p>
  </div></div>
  </div>
	  
  <div class='rod'>
  <div class='row'><div class='container'>
        <div class='col-md-3 col-sm-3 col-xs-6 col-lg-3'>
        <p><b>Especialistas</b></p><a href='consultores.php'>Especialistas</a><br><br><br><br>
      </div>
        <div class='col-md-3 col-sm-3 col-xs-6 col-lg-3'>
        <p><b>Noticias</b></p><a href='Noticias.php'>Noticias</a><br><br><br><br>
        
      </div>
      <div class='col-md-3 col-sm-3 col-xs-6 col-lg-3'>
        <p><b>O que é um erp</b></p><a href='definicao.php'>O que é um erp</a>
      </div> 
      
      <div class='col-md-3 col-sm-3 col-xs-6 col-lg-3'>
      <p><b>Formulário</b></p>
      <p><a href='form1.php'> Formulário</a></p>
      
      </div></div>
        
      <br>
    </div>
        
    <br></div>
  
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