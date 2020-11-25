<?php

//script para adicionar like de um usuario em um post 
require_once 'db/DataBase.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$uid = (int)$_GET['uid'];
$pid = (int)$_GET['pid'];

$db = new DataBase();
 
$db->AbrirConexao();

$db->SetSELECT("count(*) as qtdLike", "tblike", "l");
$db->SetJOIN("tbusuario as u on l.lik_fk_usu = u.usu_pk_id");
$db->SetJOIN("tbpost as p on l.lik_fk_post = p.pst_pk_id ");
$db->SetWHERE("p.pst_pk_id = $pid");
$db->ExecSELECT();

$totalLike = 0;

$resultQtdTotal   = $db->GetDataSet();
                        
$retornoQtdTotal  = $resultQtdTotal->fetch_assoc();
                      
                        if($retornoQtdTotal) 
                        { 
                            $totalLike = $retornoQtdTotal['qtdLike'];            
                        } 


$db->ClearSQL();
$db->SetSELECT("count(*) as qtdLike", "tblike", "l");
$db->SetJOIN("tbusuario as u on l.lik_fk_usu = u.usu_pk_id");
$db->SetJOIN("tbpost as p on l.lik_fk_post = p.pst_pk_id ");
$db->SetWHERE(" u.usu_pk_id = " . $uid . " and  p.pst_pk_id = " . $pid . " ");
$db->ExecSELECT();

$result = $db->GetDataSet();
                        
 $retorno = $result->fetch_assoc(); 
                      
  if($retorno) { 
                          
     if ($retorno['qtdLike'] >= 1) {

        echo $retornoQtdTotal['qtdLike'];
          
      } else {
             
               $dadosRegistro["lik_fk_post"] = " ' $pid ' ";
               $dadosRegistro["lik_fk_usu"]  = " ' $uid ' ";
                                            
               $db->ClearSQL();
               $db->SetINSERT($dadosRegistro, "tblike");
                     
                    
                   if($db->ExecINSERT()) { 

                         echo $retornoQtdTotal['qtdLike'];


                        } else {

                            echo "Error!";

                        }


                  }
                          
 } else {
                        
          echo 0;
                
        }

$db->FecharConexao();

