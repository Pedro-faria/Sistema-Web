<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultoria ERP - Seleção</title>

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
	<br><br>

<?php
echo "teste";
$porte = $_POST["porte"];
$segmento = $_POST["segmento"];
$modulo = "";
if (!empty($_POST['modulo-0'])) {
    $modulo. $_POST["modulo-0"];
    $modulo. ";";
}
if (!empty($_POST['modulo-1'])) {
    $modulo. $_POST["modulo-1"];
    $modulo. ";";
}
if (!empty($_POST['modulo-2'])) {
    $modulo. $_POST["modulo-2"];
    $modulo. ";";
}
if (!empty($_POST['modulo-3'])) {
    $modulo. $_POST["modulo-3"];
    $modulo. ";";
}
if (!empty($_POST['modulo-4'])) {
    $modulo. $_POST["modulo-4"];
    $modulo. ";";
}
if (!empty($_POST['modulo-5'])) {
    $modulo. $_POST["modulo-5"];
    $modulo. ";";
}
if (!empty($_POST['modulo-6'])) {
    $modulo. $_POST["modulo-6"];
    $modulo. ";";
}
if (!empty($_POST['modulo-7'])) {
    $modulo. = $_POST["modulo-7"];
    $modulo. ";";
}

$customizacao = $_POST["customizacao"];
$migracao = $_POST["migracao"];
$servidor = $_POST["servidor"];
$plataforma = $_POST["plataforma"];
$treinamento = $_POST["treinamento"];
//$empresaid = $_POST["empresaid"];

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
    

        $query=sprintf("select nome_empresa, nome_sistema, telefone_empresa, email_empresa from empresa where id IN
         (select empresaid from questionario where porte like '%{$porte}%' and segmento like '%{$segmento}%' and
            customizacao like '%{$customizacao}%' and migracao like '%{$migracao}%' and servidor like '%{$servidor}%'
            and plataforma like '%{$plataforma}%' and treinamento like '%{$treinamento}%' and
            and modulos like '%{$modulo}%')");

echo $query;


// executa a query
$dados = mysql_query($query, $conn) or die(mysql_error());
// transforma os dados em um array
$linha = mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);


?>	


<div id="main" class="container-fluid" style="margin-top: 50px">
    
  <div id="list" class="row">
  
  <div class="table-responsive col-md-12">
    <table class="table table-striped" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th>nome_empresa</th>
          <th>nome_sistema</th>
          <th>telefone_empresa</th>
          <th>email_empresa</th>
           </tr>
      </thead>
      <tbody>
      
       <?php
  # se o número de resultados for maior que zero, mostra os dados
  if($total > 0) {
    # inicia o loop que vai mostrar todos os dados
    do {
      
?>    
        <tr>
          <td><?=$linha['nome_empresa']?></td>
          <td><?=$linha['nome_sistema']?></td>
          <td><?=$linha['telefone_empresa']?></td>
          <td><?=$linha['email_empresa']?></td>
                  
        </tr>
              </tbody>
              
              <?php
    // finaliza o loop que vai mostrar os dados
    }while($linha = mysql_fetch_assoc($dados));
  // fim do if 
  }
  ?>
        </div>
        </table>
<?php
// tira o resultado da busca da memória
mysql_free_result($dados);
?>
</div></div>
  <br><br>

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