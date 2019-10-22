<?php
		/*function conexao(){
			error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
			$banco   ='consultoriaemerp';
			$usuario ='root';
			$senha   ='';
			$host    ='localhost';
			$conn    = mysql_connect($host,$usuario,$senha) or die ("Erro na Conexão : -".mysql_error());
			mysql_select_db($banco) or die ("Erro na Conexão : -".mysql_error());
			mysql_query("SET NAMES 'UTF8");
			mysql_query("SET CHARACTER_SET_CONNECTION=UTF8");
			mysql_query("SET CHARACTER_SET_CLIENT=UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
		}
		conexao();*/

		 function inserir($sql){
		 	if(mysql_query($sql)){
		 		return TRUE;
		 	}else{ 
		 	 return FALSE;
		 	}
		 }
		



?>