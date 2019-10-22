<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Editar Especialista</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    
  </head>
  <body>
<?php require_once('funcoes.php'); ?>

<?php

    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
  
    if ( null==$id ) {
      header("Location: Consultores_painel.php");
    }



		if (isset($_POST['enviar'])) {
			$nome=$_POST['nome'];
      echo $nome;
			$cidade=$_POST['cidade'];
			$email=$_POST['email'];
			$endereco=$_POST['endereco'];
			$telefone=$_POST['telefone'];
			$area_atuacao=$_POST['area_atuacao'];
			$experiencia_profissional=$_POST['experiencia_profissional'];
			$site=$_POST['site'];
      $sql_editar = "UPDATE consultores  set nome = '$nome', email = '$email', cidade ='$cidade', endereco ='$endereco', telefone='$telefone', area_atuacao='$area_atuacao', experiencia_profissional='$experiencia_profissional', site='$site'  WHERE id = $id";      
		  conexao();
		  if (inserir($sql_editar)){
		 	  echo ("Registro alterado com sucesso!");
		 	  unset($_POST['enviar']);
		  }else{
		 	  echo ("Erro na rotina de insercao".mysql_error());
		  }
		} else {

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


      $sql = "SELECT * FROM consultores where id = $id"; 
      
      // executa a query
      $dados = mysql_query($sql, $conn) or die(mysql_error());
      
      // transforma os dados em um array
      $linha = mysql_fetch_assoc($dados);
            
      $nome = mysql_result($dados,0,"nome");      
      $email = mysql_result($dados,0,"email");  
      $nascimentorig = mysql_result($dados,0,"nascimento");  
      $nascimento = date("d-m-Y",strtotime($nascimentorig));   
      $site = mysql_result($dados,0,"site");  
      $telefone = mysql_result($dados,0,"telefone");  
      $endereco = mysql_result($dados,0,"endereco");  
      $cidade = mysql_result($dados,0,"cidade");  
      $area_atuacao = mysql_result($dados,0,"area_atuacao");  
      $experiencia_profissional= mysql_result($dados,0,"experiencia_profissional");
      
    }

?>
	
		<div class='container'>
			<div class='row'>
				<h1 align='center'> Editar Especialista </h1>
			</div>
		<form align='center' method='POST'>
		<fieldset>
			<legend>Informações Pessoais do Especialista</legend>
		<table cellspacing='10'>
		<tr>
   			<td>
    		<label for="nome">Nome: </label>
   			</td>
   		<td align="left">
    		<input type="text" name="nome" value="<?php echo !empty($nome)?$nome:'';?>">
   		</td>
   		<td>
    		<label for="email">Email: </label>
   		</td>
   		<td align="left">
    		<input type="text" name="email" value="<?php echo !empty($email)?$email:'';?>">
   		</td>
  		</tr>	
  		<tr>
   <td>
    <label>Nascimento: </label>
   </td>
   <td align="left">
    <input type="text" name="nascimento" size="10" maxlength="10" placeholder="dd/mm/aaaa" value="<?php echo !empty($nascimento)?$nascimento:'';?>"> 
   </td>
  </tr>
  <tr>
   <td>
    <label for="site">Site: </label>
   </td>
   <td>
    <input type="text" name="site" size="13" maxlength="50" value="<?php echo !empty($site)?$site:'';?>">  
   </td>
  </tr>
  <tr>
   <td>
    <label>Telefone:</label>
   </td>
   <td>
    <input type="text" name="telefone" size="9" maxlength="9" value="<?php echo !empty($telefone)?$telefone:'';?>">  
   </td>
  </tr>
 </table>
</fieldset>

<br />
<!-- ENDEREÇO -->
<fieldset>
 <legend>Dados de Endereço</legend>
 <table cellspacing="10">

  <tr>
   <td>
    <label for="endereco">Rua:</label>
   </td>
   <td >
    <input type="text" name="endereco" value="<?php echo !empty($endereco)?$endereco:'';?>">  
   </td>
   <td>
    <label for="numero">Numero:</label>
   </td>
   <td align="left">
    <input type="text" name="numero" size="4">
   </td>
  </tr>
  <tr>
   <td>
    <label for="bairro">Bairro: </label>
   </td>
   <td align="left">
    <input type="text" name="bairro">
   </td>
  </tr>
  <tr>
   <td>
    <label for="estado">Estado:</label>
   </td>
   <td align="left">
    <select name="estado"> 
    <option value="ac">Acre</option> 
    <option value="al">Alagoas</option> 
    <option value="am">Amazonas</option> 
    <option value="ap">Amapá</option> 
    <option value="ba">Bahia</option> 
    <option value="ce">Ceará</option> 
    <option value="df">Distrito Federal</option> 
    <option value="es">Espírito Santo</option> 
    <option value="go">Goiás</option> 
    <option value="ma">Maranhão</option> 
    <option value="mt">Mato Grosso</option> 
    <option value="ms">Mato Grosso do Sul</option> 
    <option value="mg">Minas Gerais</option> 
    <option value="pa">Pará</option> 
    <option value="pb">Paraíba</option> 
    <option value="pr">Paraná</option> 
    <option value="pe">Pernambuco</option> 
    <option value="pi">Piauí</option> 
    <option value="rj">Rio de Janeiro</option> 
    <option value="rn">Rio Grande do Norte</option> 
    <option value="ro">Rondônia</option> 
    <option value="rs">Rio Grande do Sul</option> 
    <option value="rr">Roraima</option> 
    <option value="sc">Santa Catarina</option> 
    <option value="se">Sergipe</option> 
    <option value="sp">São Paulo</option> 
    <option value="to">Tocantins</option> 
   </select>
   </td>
  </tr>
  <tr>
   <td>
    <label for="cidade">Cidade: </label>
   </td>
   <td align="left">
    <input type="text" name="cidade" value="<?php echo !empty($cidade)?$cidade:'';?>">  
   </td>
  </tr>
  <tr>
   <td>
    <label for="cep">CEP: </label>
   </td>
   <td align="left">
    <input type="text" name="cep" size="5" maxlength="5"> - <input type="text" name="cep2" size="3" maxlength="3">
   </td>
  </tr>
</table>
</fieldset>
  <fieldset>
  	<legend>Dados Profissionais</legend>
  	<table cellspacing="10">
  	<tr>
  		<td>
  			Area de atuacao
  		</td>
  		<td>Experiencia profissional</td>
  		<tr>
  			<td><textarea name='area_atuacao'><?php echo $area_atuacao;?></textarea></td>
  			<td><textarea aling='right' name='experiencia_profissional'><?php echo $experiencia_profissional;?></textarea>
  	</tr>
  </table>
</fieldset>
<input type='submit' name='enviar' value='Cadastrar'> <input type='reset' value='Cancelar'>
</form>

</body>
</html>