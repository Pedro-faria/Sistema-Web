<?php
session_start();
if($_SESSION["loggedIn"] != true) {
    echo("Access denied!");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultores</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">


  </head>
  <body>
<?php
    function conexao(){
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
    }
conexao();
?>
<!--< ?php require_once('verifica.php'); ?>-->


<!--  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    header("Location: painel.php");
    exit;
  }else {
    echo "<center>Voce esta logado</center>";
  }

?> -->
<HTML>
  <body>
 <div class='container'>
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="painel.php">Painel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="painel.php">Home</a></li>
        <li><a href="Consultores_painel.php">Consultores</a></li>
        <li><a href="usuarios_painel.php">Usuários</a></li> 
        <li><a href="anuncio_painel.php">Anúncios</a></li>
		<li><a href="forum_painel.php">Fórum</a></li>
		<li><a href="relatorios.php">Relatórios</a></li>	
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Sair</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class='col-xs-12 col-xs-12 col-md-12 col-sm-12 col-lg-12'>
<img src='img/site.jpg' width='100%'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>