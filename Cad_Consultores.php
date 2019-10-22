<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cadastro de Especialistas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    
  </head>
  <body>
<?php require_once('funcoes.php'); ?>

<?php

    $imgData = null;
    $valid = null;

    if (isset($_POST['enviar'])) {


      $nome=$_POST['nome'];      
      //$cidade = $_POST['cod_cidades'];
      $cidade = $_POST['cidade_hidden'];
      $email=$_POST['email'];
      $endereco=$_POST['endereco'];
      $telefone=$_POST['telefone'];
      $area_atuacao=$_POST['area_atuacao'];
      $experiencia_profissional=$_POST['experiencia_profissional'];
      $site=$_POST['site'];

      $valid = true; 

      if(empty($nome)) {
        echo '<p>Favor inserir nome!</p>';
        $valid=false;
      }

      if(empty($area_atuacao)) {
        echo '<p>Favor inserir área em que atua!</p>';
        $valid=false;
      }

      if(empty($telefone)) {
        echo '<p>Favor inserir telefone!</p>';
        $valid=false;
      }

      if(!isset($_FILES['arquivo']))
      {
        echo '<p>Favor inserir uma foto!</p>';
        $valid=false;
      } else {
          try {
            $msg= upload($imgData);  //this will upload your image
            echo $msg;  //Message showing success or failure.
          } catch(Exception $e) {
            echo $e->getMessage();
            echo 'Náo foi possível carregar o arquivo';
            $valid=false;
          }
      }

      if($valid) {
        $sql_inserir = "insert into consultores (nome,email,cidade,endereco,telefone,area_atuacao,experiencia_profissional,site, imagem)
        VALUES ('$nome','$email','$cidade','$endereco','$telefone','$area_atuacao','$experiencia_profissional','$site','$imgData')";
        conexao();
        if (inserir($sql_inserir)){
          echo ("Registro adicionado com sucesso, ID do registro : ".mysql_insert_id());
          unset($_POST['enviar']);
        }else{
          echo ("Erro na rotina de insercao".mysql_error());
        }
      }
    }
            

    function upload(&$imgData) {
      conexao();
      $maxsize = 10000000; //set to approx 10 MB

      //check associated error code
      if($_FILES['arquivo']['error']==UPLOAD_ERR_OK) {

        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['arquivo']['tmp_name'])) {    

            //checks size of uploaded image on server side
            if( $_FILES['arquivo']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['arquivo']['tmp_name']),"image")===0) {    

                    // prepare the image for insertion                   
                    $imgData =addslashes (file_get_contents($_FILES['arquivo']['tmp_name']));  
                }
                else
                    $msg="<p>Arquivo carregado não é uma imagem!</p>";
                    $valid=false;
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>O arquivo excede o limite de tamanho máximo!</div>
                <div>Limite máximo é '.$maxsize.' bytes</div>
                <div>Arquivo '.$_FILES['arquivo']['name'].' é '.$_FILES['arquivo']['size'].
                ' bytes</div><hr />';
                $valid=false;
                }
        }
        else
            $msg="Arquivo não foi carregado!";
            $valid=false;
    }
    else {
        $msg= file_upload_error_message($_FILES['arquivo']['error']);
        $valid=false;
    }
   return $msg;
}

// Function to return error message based on error code

function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'O arquivo excede o tamanho máximo de carregamento';
        case UPLOAD_ERR_FORM_SIZE:
            return 'O arquivo excede o tamanho máximo';
        case UPLOAD_ERR_PARTIAL:
            return 'O arquivo não foi carregado totalmente';
        case UPLOAD_ERR_NO_FILE:
            return 'Nenhum arquivo foi carregado';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Diretório do arquivo não encontrada';
        case UPLOAD_ERR_CANT_WRITE:
            return 'falha ao gravar arquivo em disco';
        case UPLOAD_ERR_EXTENSION:
            return 'Falha ao carregar devido a extensão do arquivo';
        default:
            return 'Erro de carregamento desconhecido';
    }
}

    
?>
	
		<div class='container'>
			<div class='row'>
				<h1 align='center'> Cadastro de Consultores </h1>
			</div><br><br>

<form class="form-horizontal" enctype="multipart/form-data" method='post'>

<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="nome">Nome:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Digite seu nome *" class="form-control input-md" required="">  
  </div>
  <label class="col-md-2 control-label" for="email">Email:</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Digite seu Email" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="nascimento">Data Nascimento:</label>  
  <div class="col-md-4">
  <input id="nascimento" name="nascimento" type="text" placeholder="DD/MM/AAAA" class="form-control input-md">
    
  </div>
 
  <label class="col-md-2 control-label" for="telefone">Telefone:</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" type="text" placeholder="Digite seu Telefone *" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="site">Site:</label>  
  <div class="col-md-2">
  <input id="site" name="site" type="text" placeholder="Site Comercial" class="form-control input-md">
  </div> 
    <label class="col-md-2 control-label" for="estado">Estado:</label>
	<div class='col-md-6'>
    <select name="cod_estados" id="cod_estados">
      <option value=""></option>
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
          
          $query = sprintf("SELECT cod_estados, sigla FROM estados ORDER BY sigla");
          // executa a query
          $dados = mysql_query($query, $conn) or die(mysql_error());
          // transforma os dados em um array
          $linha = mysql_fetch_assoc($dados);
          
          while ( $row = mysql_fetch_assoc( $dados ) ) {
            echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
          }
        ?>
      </option>
    </select>
    <input type="hidden" name="cidade_hidden" id="cidade_hidden">
    <label for="cidade">Cidade: </label>
    <span class="carregando">Aguarde, carregando...</span>
   </td>
   <td align="left">
    <select name="cod_cidades" id="cod_cidades">
      <option value="">-- Escolha um estado --</option>
    </select>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="rua">Rua:</label>  
  <div class="col-md-4">
  <input id="rua" name="rua" type="text" placeholder="Rua" class="form-control input-md">
  </div>
  <label class="col-md-2 control-label" for="bairro">Bairro:</label>  
  <div class="col-md-4">  <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="numero">Número:</label>  
  <div class="col-md-2">
  <input id="numero" name="numero" type="text" placeholder="" class="form-control input-md" required="">
  </div>
     <label class="col-md-2 control-label" for="numero">Foto :</label> 
	 <div class="col-md-6">
	 <input name="arquivo" required type="file"/>  <br> 

      <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
     </div></div>
<!-- Textarea -->
<div class='row'>
<div class="form-group">
  <div align='center'><label class="col-md-6 control-label"  for="area_atuacao">Área de atuação:</label></div>
  <div align='center'><label align='center'class="col-md-6 control-label" for="experiencia_profissional">Experiência Profissional:</label></div>
  <div class="col-md-6">                     
  <textarea class="form-control" id="area_atuacao" name="area_atuacao"></textarea>
  </div>    
	<div class="col-md-6">   
    <textarea class="form-control"  id="experiencia_profissional" name="experiencia_profissional"></textarea>
  </div>
</div>

</div>

<!-- Button (Double) -->
<div class="form-group">
  <div class='row'>
  <div class="col-md-12" align='center'>
    <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div></div>
</div>

</fieldset>
</form>
  <script src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('jquery', '1.3');
    </script>   

    <script type="text/javascript">
    $(function(){
      $('#cod_estados').change(function(){
        if( $(this).val() ) {
          $('#cod_cidades').hide();
          $('.carregando').show();
          $.getJSON('cidades.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value=""></option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
            } 
            $('#cod_cidades').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
        }
      });

      $("#cod_cidades").change(function(){
        //$("#cidade_hidden").val(document.getElementById('cod_cidades').options[document.getElementById('cod_cidades').selectedIndex].value);
        //$("#cidade_hidden").val(("#cod_cidades").find(":selected").text());
        $("#cidade_hidden").val($('#cod_cidades').find('option:selected').text());
      });
    });
    </script>


</div>

</body>
</html>