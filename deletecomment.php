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

$cid = $_GET["cid"];

if (!Security::checkCommentOwnerShip($cid, Session::getValue('id'))){ //verifica dono do comentario, somente o autor pode apagar o comentario

	header("Location: home.php");
	exit();

}

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
