<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Detalhes consultor</title>

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
<?php require_once('funcoes.php'); ?>

<?php

    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
  
    if ( null==$id ) {
      header("Location: Consultores.php");
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
		<div class='container'>
			<div class='row'>
				<h1 align='center'> Detalhes Consultor </h1>
         </div>
         <div class='row'>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" align='right'>
         <?php
            echo '<img class="img-img-circle" src="data:image/jpeg;base64,'.
            base64_encode($imagem).
            '" width="260" height="250">' . "</dd>"
         ?></div>
      <div align='center' class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> 
			<legend>Informações Pessoais do Consultor</legend>
		<p><label for="nome">Nome: </label><?php echo !empty($nome)?$nome:'';?></p>
   		<p><label for="email">Email: </label><?php echo !empty($email)?$email:'';?></p>
    <p><label>Nascimento: </label><?php echo !empty($nascimento)?$nascimento:'';?> </p>
   
    <p><label for="site">Site: </label><?php echo !empty($site)?$site:'';?></p>  
   
    <p><label>Telefone:</label> <?php echo !empty($telefone)?$telefone:'';?></p>
	
 <legend>Dados de Endereço</legend>
    <p><label for="endereco">Rua:</label><?php echo !empty($rua)?$rua:'';?></p>  
    <p><label for="numero">Numero:</label><?php echo !empty($numero)?$numero:'';?> </p>
    <p><label for="bairro">Bairro: </label> <?php echo !empty($bairro)?$bairro:'';?></p>
    <p><label for="cidade">Cidade: </label> <?php echo !empty($cidade)?$cidade:'';?></p>  
   
  	<legend>Dados Profissionais</legend>
		<p><label for="area_atuacao">Area de atuação:</label><br> <?php echo !empty($area_atuacao)?$area_atuacao:'';?></p></p>
		<p><label for="area_atuacao">Experiência Profissional:</label><br> <?php echo !empty($experiencia_profissional)?$experiencia_profissional:'';?></p></p>

      </div></div></div>
      <div class='container-fluid'>
   <div class='row'>
        <div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'><img class='img-rodape' src='img/rodape.jpg'/>
        </div>
      </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      </div>
    </div>

  </body>
  </html>
</body>
</html>
