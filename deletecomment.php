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

$cid = $_GET["cid"];

$db->AbrirConexao();
  
$db->SetDELETE("tbcomment");
$db->SetWHERE("com_pk_id = $cid");
   
$retorno = $db->ExecDELETE();

$db->FecharConexao();
// Apagou?
if ( $retorno == true ) {

	echo "<script> 
		alert('Comentario deletado com sucesso!');
		location.href = 'home.php';
	      </script>";

} else {

	echo "<script> 
		alert('Erro ao deletar o comentario!');
		location.href = 'home.php';
	      </script>";

}
