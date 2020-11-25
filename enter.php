<?php

require_once 'db/DataBase.php';
require_once 'classes/Session.php';

Session::start();

$user = addslashes( $_POST['user'] ); 
$pass = addslashes( $_POST['pass'] ); 

$db = new DataBase();
$db->AbrirConexao();

$db->SetSELECT("*", "tbusuario");
$db->SetWHERE("usu_login = '$user' and usu_senha = '$pass'");
  
  if($db->ExecSELECT()) {
      $NumeroRegistros = $db->TotalRegistros();
          $DataSet = $db->GetDataSet();
                
          if($NumeroRegistros > 0) {
                 $retorno = $DataSet->fetch_assoc();
                     
                      if($retorno) {
                         
                            Session::setValue('id',       $retorno['usu_pk_id']);
                            Session::setValue('login',    $retorno['usu_login']);
                            Session::setValue('nome',     $retorno['usu_nome']);
                            Session::setValue('email',    $retorno['usu_email']);
                            Session::setValue('tel',      $retorno['usu_tel']);
                            Session::setValue('image',    $retorno['usu_img']);
                            Session::setValue('data_cad', $retorno['usu_dt_cad']);
                            Session::setValue('sexo',     $retorno['usu_sexo']);
                            
                            header("Location: home.php");
                            
                      } else {
                          
                        
                          $db->FecharConexao();
                      }
                               
          }
  }
                       



?>


<script type="text/javascript">

    alert("ERRO: login incorreto ou usuario n\u00e3o cadastrado!");
    window.location="login.php";
 
</script>

