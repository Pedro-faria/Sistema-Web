<?php
session_start();
if($_SESSION["loggedIn"] != true) {
    echo("Acesso negado!");
    echo("É necessário fazer login");
    exit();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Relatorios</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    
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
<br><br><br>
<div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <a href='Rel_Consultores.php'><img class="img-rounded" src="img/relatorio.jpg"/></a>
          <h2>Relatório Consultores</h2>
          <p>Todos os consutores cadastrados no sistema</p>
          
        </div><!-- /.col-xs-4 col-sm-4 col-md-4 col-lg-4 -->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <a href='Rel_usuarios.php'><img class="img-rounded" src="img/relatorio.jpg"></a>
          <h2>Relatório Usuários</h2>
          <p>Lista de Todos os Usuários Cadastrados no site</p>
          
        </div><!-- /.col-xs-4 col-sm-4 col-md-4 col-lg-4 -->
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <a href='Rel_anuncios.php'><img class="img-rounded" src="img/relatorio.jpg"></a>
          <h2>Relatório Anúncios</h2>
          <p>Todos os anúncios cadastrados</p>
          </div><!-- /.col-xs-4 col-sm-4 col-md-4 col-lg-4 --> 