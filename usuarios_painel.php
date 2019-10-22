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
	<title>Usuários Cadastrados</title>
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
  
</head>
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

<?php
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
    

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT id, nome, nome_usuario, email, senha FROM usuarios");
// executa a query
$dados = mysql_query($query, $conn) or die(mysql_error());
// transforma os dados em um array
$linha = mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);


?>
<div class='container'>
<div class='row'>
  <div class='span12'><h2 align='center'>Usuários Cadastrados</h2></div>
</div>

<div class='row'>
  <div class='span12'>
  
 <div id="main" class="container-fluid" style="margin-top: 50px">
 
  <div id="top" class="row">
    <div class="col-sm-3">
      <h2>Usuários</h2>
    </div>
    <div class="col-sm-6">
      
      <div class="input-group h2">
        <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      
    </div>
    <div class="col-sm-3">
      <a href="Cad_usuarios.php" class="btn btn-primary pull-right h2">Novo Usuário</a>
    </div>
  </div> <!-- /#top -->
 
  <hr />
  <div id="list" class="row">
  
  <div class="table-responsive col-md-12">
    <table class="table table-striped" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Nome Usuário</th>
          <th>Email</th>
          <th>senha</th>
          <th class="actions">Ações</th>
        </tr>
      </thead>
      <tbody>

 <?php
  // se o número de resultados for maior que zero, mostra os dados
  if($total > 0) {
    // inicia o loop que vai mostrar todos os dados
    do {
      
?>
        <tr>
          <td><?=$linha['id']?></td>
          <td><?=$linha['nome']?></td>
          <td><?=$linha['nome_usuario']?></td>
          <td><?=$linha['email']?></td>
          <td><?=$linha['senha']?></td>
          <!--<?php
            // echo '<td><a class="arquivos" href="deletar.php?id='.$linha['id'].'">[Excluir]</a></td>';
            // echo '<td><a class="arquivos" href="editar_usuarios.php?id='.$linha['id'].'">[editar_usuarios]</a></td>';
          ?> -->
          <td class="actions">
            <?php
            echo'<a class="btn btn-warning btn-xs" href="editar_usuarios.php?id='.$linha['id'].'">Editar</a>';
            echo'<a class="btn btn-danger btn-xs" href="excluir_usuarios.php?id='.$linha['id'].'" >Excluir</a>';
		    ?>
          </td>
        </tr>
              </tbody>

      <?php
    // finaliza o loop que vai mostrar os dados
    }while($linha = mysql_fetch_assoc($dados));
  // fim do if 
  }
?>

    </table>
  </div>
  
  </div> <!-- /#list -->
  
  <div id="bottom" class="row">
    <div class="col-md-12">
      <ul class="pagination">
        <li class="disabled"><a>&lt; Anterior</a></li>
        <li class="disabled"><a>1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
      </ul><!-- /.pagination -->
    </div>
  </div> <!-- /#bottom -->
 </div> <!-- /#main -->
</body>
</html>
