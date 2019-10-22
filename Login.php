<?php require_once('funcoes.php'); 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

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
	
	</div><br><br><br><br><br>
	

    <div class='container'>
   <div class='row'>
		<div class='col-md-12 col-sm-12 col-xs-12 col-lg-12'>
      
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">

        <form method="post" action='userauthentication.php' role="login">
		
          <img src="img/erp_login.jpg" class="img-responsive" alt="" />
		  
          <input type="email" id='name' name="email" placeholder="Email" required class="form-control input-lg"/>
          
          <input type="password" class="form-control input-lg" id="senha" name='senha' placeholder="Senha" required="" />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="enviar" class="btn btn-lg btn-primary btn-block">Entrar</button>
          <div>
             <a href="#">Esqueceu a senha?</a>
          </div>
          
        </form>
    
      </div>
      
  </div>  
</div>
</div>
  </div></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </div><!--Fechando o container-fluid-->
  </body>
</html>