<?php

require_once 'db/DataBase.php';
require_once 'classes/Session.php';
require_once 'classes/Security.php';

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


if (!Security::checkPostOwnerShip($pid, Session::getValue('id'))){ //verifica dono do comentario, somente o autor pode apagar o comentario

	header("Location: home.php");
	exit();

}

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