<?php include  "conexao.php";?>
<?php
     error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); 
			$banco   ='consultoriasemerp';
			$usuario ='pedrohenrique';
			$senha   ='Sistemas2016$';
			$host    ='mysql11.redehost.com.br';
      $conn    = mysql_connect($host,$usuario,$senha) or die ("Erro na Conexão : -".mysql_error());
      mysql_select_db("$banco") or die ("Erro na Conexão : -".mysql_error());
      mysql_query("SET NAMES 'UTF8");
      mysql_query("SET CHARACTER_SET_CONNECTION=UTF8");
      mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
      mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
    ?>
	 <!--$id = $GET['id']// Ou POST, dependendo de onde vem o ID do campo para apagar  ?>-->

<?php
  /*
	Este exemplo mostra como excluir dados em uma tabela
	MySQL usando um código PHP.
  */
  //$id = '29';
  //$query = "delete from consultores where id=".$id; 
  if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
  }
  
  if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];
  }
 //$id = $_POST['id'];
  
 $query= "delete from usuarios where id='$id'";
 
  $res  = mysql_query($query, $conn)or die(mysql_error());
  if($res){
    echo "Dado removido com sucesso.";
  }else{
    echo "Falha ao tentar remover dado.";
}
 
?>

<a href="Consultores_painel.php">Voltar </a>