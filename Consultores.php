<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Especialistas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">

     <script type="text/javascript">
function Nova()
{
location.href=" Login.php"
}
</script>
    
  </head>
  <body>
 
<<div class='row'>
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


		<?php 
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
			
			$query = sprintf("SELECT id, nome, cidade, area_atuacao, experiencia_profissional, imagem FROM consultores");
			// executa a query
			$dados = mysql_query($query, $conn) or die(mysql_error());
			// transforma os dados em um array
			$linha = mysql_fetch_assoc($dados);
			// calcula quantos dados retornaram
			$total = mysql_num_rows($dados);

		?>
			<br><br>

<div class='container'>
	<div class='row'>
	
		<div class='col-md-12 col-xs-12 col-lg-12 col-sm-12'>
		<h1 align='center'>Especialistas Entrevistados</h1>
			</div>
			</div>
			<br><br>   

 <?php
  // se o número de resultados for maior que zero, mostra os dados
  if($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {
      
?>
		<div class="row">
		
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
        
		<?php
            echo '<img class="img-img-circle" src="data:image/jpeg;base64,'.
            base64_encode($linha['imagem']).
            '" width="260" height="250">' . "</dd>"
         ?>
			</div>
		 
		 <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
          <h2><?=$linha['nome']?></h2>
          <p ><b>Cidade: </b><?=$linha['cidade']?></p>
		  <p ><b>Formação</b><br><?=$linha['area_atuacao']?></p>
          <p ><b>Experiência Profissional</b><br><?=$linha['experiencia_profissional']?></p>
		  <?php
            echo'<p><a class="btn" href="detalhes_consultores.php?id='.$linha['id'].'">Ver detalhes »</a></p>';            
          ?>
          
        </div>
		
    <?php
    if($linha = mysql_fetch_assoc($dados));
  // fim do if 
  ?>
</div>

<br><br>
  <div class="row">
		
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
        
		<?php
            echo '<img class="img-img-circle" src="data:image/jpeg;base64,'.
            base64_encode($linha['imagem']).
            '" width="260" height="250">' . "</dd>"
         ?>
			</div>
		 
		 <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
          <h2><?=$linha['nome']?></h2>
          <p ><b>Cidade: </b><?=$linha['cidade']?></p>
		  <p ><b>Formação</b><br><?=$linha['area_atuacao']?></p>
          <p ><b>Experiência Profissional</b><br><?=$linha['experiencia_profissional']?></p>
		  <?php
            echo'<p><a class="btn" href="detalhes_consultores.php?id='.$linha['id'].'">Ver detalhes »</a></p>';            
          ?>
          
        </div>
		
    <?php
    if($linha = mysql_fetch_assoc($dados));
  // fim do if 
  ?>
</div>
  <br><br><br>
<?php
    // finaliza o loop que vai mostrar os dados
    }while($linha = mysql_fetch_assoc($dados));
  // fim do if 
  }
?>

</div></div></div>
	
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