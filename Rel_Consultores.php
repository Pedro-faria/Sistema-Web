<?php
session_start();
if($_SESSION["loggedIn"] != true) {
    echo("Access negado!");
    echo("É necessário fazer login");
    exit();
}
?>

<html>

	<head>
	<title>Consultores Cadastrados</title>
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript">

	function voltar()
	{

	location.href=" painel.php"
}

</script>
	</head>
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
$query = sprintf("SELECT id, nome, cidade, endereco FROM consultores");
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
          <th>ID</th>
          <th>Nome</th>
          <th>Cidade</th>
          <th>Endereco</th>
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
          <td><?=$linha['cidade']?></td>
          <td><?=$linha['endereco']?></td>
                  
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
<div class='row'>
		<div align='center'>
		<input type="button" name="imprimir" value="IMPRIMIR" onclick="window.print();"/> 
		<input type='button' name='voltar' value='VOLTAR' onclick="voltar()">
		</div>
		</div>
		
</body>
		</html>