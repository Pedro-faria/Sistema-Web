
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

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>autenticando usuario</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="text\css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript">
    
    function loginsuccessfully(){
        setTimeout("window.location='painel.php'", 2000);
      }
      function loginfailed(){
        setTimeout("window.location='Login.php'", 2000);
      }
    </script>
  </head>
  <body>


<?php
  session_start();
  $email=$_POST['email'];
  $senha=$_POST['senha'];

  $sql= mysql_query("select *from usuarios where email='$email' and senha='$senha' ") or die (mysql_error());
  
  $row=mysql_num_rows($sql);
  if($row > 0){
    
    $_SESSION["loggedIn"] = true;
    $_session['email'] = $email;
    //$_session['senha'] = $_POST['senha'];    
    //$_SESSION['user'] = "1";
    echo "<center>Você foi autenticado com sucesso! Aguarde um instante.</center>";
    echo "<script>loginsuccessfully()</script>";
  }else {
      $_SESSION["loggedIn"] = false;
      echo "<center>Nome de usuário ou senha inválidos ! Aguarde um instante.</center>";
      echo "<script>loginfailed()</script>";
  }
?>
</body>
</html>