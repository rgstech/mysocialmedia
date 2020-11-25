<?php

require_once 'db/DataBase.php';
require_once 'classes/Session.php';

// inicia a sessão
Session::start();

//inicia/instancia o banco de dados
$db = new DataBase();
// Não está logado?

    if ( !Session::hasValue("id") ) {

	// Redireciona para a página de login
	header("Location: home.php");

}



$pid = $_GET["pid"];


$db->AbrirConexao();
  
$db->SetDELETE("tbpost");
$db->SetWHERE("pst_pk_id = $pid");
   
$retorno = $db->ExecDELETE();

$db->FecharConexao();




// Apagou?
if ( $retorno == true ) {

	echo "<script> 
		alert('Post deletado com sucesso!');
		location.href = 'home.php';
              </script>";

} else {

	echo "<script> 
	          alert('Erro ao deletar Post!');
		  location.href = 'home.php';
	     </script>";

}

?>