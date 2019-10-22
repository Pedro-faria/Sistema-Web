<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Consultoria ERP - Seleção</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap-responsive.css" rel="text\css">
    <link href="css/bootstrap-responsive.min.css" rel="text\css">
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />	

	 <script type="text/javascript">
	
	  var idAtual = 1;
		proximo = function () {   
	  var id = "#p"+idAtual++;
	  
	  $(id).removeClass('visivel');
	  $(id).addClass('oculto');
	  
	  id = "#p"+idAtual;
	  
	  $(id).removeClass('oculto'); 
	  $(id).addClass('visivel');
	  
	} 

	anterior = function () {   
	  var id = "#p"+idAtual--;
	  
	  $(id).removeClass('visivel');
	  $(id).addClass('oculto');
	  
	  id = "#p"+idAtual;
	  
	  $(id).removeClass('oculto'); 
	  $(id).addClass('visivel');
	  
	}
	
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
          
        </div></div>
        <!-- /.container -->
    </nav>
	<br><br>
	<div class="container">
	<div class='row'>
	<div class='col-xs-12 col-md-12 col-lg-12'>
		<h1 align='center'>Seleção do Sistema</h4> <br>
		<h4 align='center'>Preencha as informações de acordo com as caracteristicas de sua empresa, ao final será exibido o sistema ERP que mais se adequa ao seu negócio</h4>
		<br>
    <form class="form-horizontal" id="perguntas" method="POST" action="resultado.php">
<fieldset>

<!-- Form Name -->
<legend>Seleção de Sistemas ERP</legend>

<!-- Multiple Radios -->
<div  id="p1" class="visivel">
  <label class="col-md-4 control-label" for="porte">Selecione o porte de sua Empresa?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="porte-0">
      <input type="radio" name="porte" id="porte-0" value="pequena" checked="checked">
      Pequena
    </label>
  </div>
  <div class="radio">
    <label for="porte-1">
      <input type="radio" name="porte" id="porte-1" value="media">
      Média
    </label>
  </div>
  <div class="radio">
    <label for="porte-2">
      <input type="radio" name="porte" id="porte-2" value="grande">
      Grande
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div  id="p2" class="oculto">
  <label class="col-md-4 control-label" for="segmento">Qual o Segmento de sua Empresa?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="seguimento-0">
      <input type="radio" name="segmento" id="seguimento-0" value="varejo" checked="checked">
      Varejo
    </label>
  </div>
  <div class="radio">
    <label for="seguimento-1">
      <input type="radio" name="segmento" id="seguimento-1" value="agronegocio">
      Agronegócio
    </label>
  </div>
  <div class="radio">
    <label for="seguimento-2">
      <input type="radio" name="segmento" id="seguimento-2" value="industrial">
      Industrial
    </label>
  </div>
  <div class="radio">
    <label for="seguimento-3">
      <input type="radio" name="segmento" id="seguimento-3" value="servico">
      Serviço
    </label>
  </div>
  </div>
</div>

<!-- Multiple Checkboxes -->
<div  id="p3" class="oculto">
  <label class="col-md-4 control-label" for="modulos">Quais os módulos que você deseja adquirir?</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="modulos-0">
      <input type="checkbox" name="modulo-0" id="modulos-0" value="faturamento">
      Faturamento
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-1">
      <input type="checkbox" name="modulo-1" id="modulos-1" value="fiscal_contabil">
      Fiscal / Contábil
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-2">
      <input type="checkbox" name="modulo-2" id="modulos-2" value="pdv">
      Frente de loja (PDV)
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-3">
      <input type="checkbox" name="modulo-3" id="modulos-3" value="e_commerce">
      E-Commerce
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-4">
      <input type="checkbox" name="modulo-4" id="modulos-4" value="controle_estoque">
      Controle de estoque
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-5">
      <input type="checkbox" name="modulo-5" id="modulos-5" value="portal_representante">
      Portal do Representante
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-6">
      <input type="checkbox" name="modulo-6" id="modulos-6" value="controle_orcamento">
      Controle de Orçamento
    </label>
  </div>
  <div class="checkbox">
    <label for="modulos-7">
      <input type="checkbox" name="modulo-7" id="modulos-7" value="indicador_resultados">
      Indicador de Resultados
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div id="p4" class="oculto">
  <label class="col-md-4 control-label" for="customizacao">Você deseja adquirir outro módulo que não estava na lista anterior?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="customizacao-0">
      <input type="radio" name="customizacao" id="customizacao-0" value="sim" checked="checked">
      Sim
    </label>
  </div>
  <div class="radio">
    <label for="customizacao-1">
      <input type="radio" name="customizacao" id="customizacao-1" value="nao">
      Não
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div id="p5" class="oculto">
  <label class="col-md-4 control-label" for="migracao">Necessita de migração de dados?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="migracao-0">
      <input type="radio" name="migracao" id="migracao-0" value="sim" checked="checked">
      Sim
    </label>
  </div>
  <div class="radio">
    <label for="migracao-1">
      <input type="radio" name="migracao" id="migracao-1" value="nao">
      Não
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div id="p6" class="oculto">
  <label class="col-md-4 control-label" for="servidor">Qual a localização desejada  para o servidor do sistema ERP da empresa?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="servidor-0">
      <input type="radio" name="servidor" id="servidor-0" value="local" checked="checked">
      Interno na Empresa (Local)
    </label>
  </div>
  <div class="radio">
    <label for="servidor-1">
      <input type="radio" name="servidor" id="servidor-1" value="nuvens">
      Hospedado nas Nuvens
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div id="p7" class="oculto">
  <label class="col-md-4 control-label" for="plataforma">Em qual plataforma você deseja executar o sistema?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="plataforma-0">
      <input type="radio" name="plataforma" id="plataforma-0" value="web" checked="checked">
      WEB
    </label>
  </div>
  <div class="radio">
    <label for="plataforma-1">
      <input type="radio" name="plataforma" id="plataforma-1" value="desktop">
      Desktop
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div id="p8" class="oculto">>
  <label class="col-md-4 control-label" for="treinamento">Qual o tipo de treinamento desejado na implantação?</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="treinamento-0">
      <input type="radio" name="treinamento" id="treinamento-0" value="treinamento_online" checked="checked">
      Treinamento Online
    </label>
  </div>
  <div class="radio">
    <label for="treinamento-1">
      <input type="radio" name="treinamento" id="treinamento-1" value="treinamento_cliente">
      Treinamento Local no Cliente
    </label>
  </div>
  <div class="radio">
    <label for="treinamento-2">
      <input type="radio" name="treinamento" id="treinamento-2" value="treinamento_fornecedor">
      Treinamento Local no fornecedor do ERP
    </label>
  </div>
  </div>
</div>

<div  id="p9" class="oculto">
  <label class="col-md-4 control-label" for="confirmar"></label>
  <div class="col-md-8">
	<p><h3> Confirma os dados informados no formulário?</h3></p><br>
    <button id="confirmar" name="confirmar" class="btn btn-success">Confirmar</button>
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
<br><br>
</form>
<div align='center'>
<button onclick="proximo()">Proximo</button>
<button onclick="anterior()">Anterior</button>
</div></div></div></div>
  <br><br>

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
</html>