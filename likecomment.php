<?php

require_once 'db/DataBase.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$uid = (int)$_GET['uid'];
$cid = (int)$_GET['cid'];

$db = new DataBase();
$db->AbrirConexao();

$db->SetSELECT("count(*) as qtdLike", "tblike", "l");
$db->SetJOIN("tbusuario as u on l.lik_fk_usu = u.usu_pk_id");
$db->SetJOIN("tbcomment as c on l.lik_fk_com = c.com_pk_id");
$db->SetWHERE("c.com_pk_id  = " . $cid );
$db->ExecSELECT();

$totalLike = 0;

$resultQtdTotal  = $db->GetDataSet();
                                       
$retornoQtdTotal = $resultQtdTotal->fetch_assoc();
                      
        if($retornoQtdTotal) 
        { 
            $totalLike = $retornoQtdTotal['qtdLike'];            
        }          
                  
                        
$db->ClearSQL();                       
$db->SetSELECT("count(*) as qtdLike", "tblike", "l");
$db->SetJOIN("tbusuario as u on l.lik_fk_usu = u.usu_pk_id");
$db->SetJOIN("tbcomment as c on l.lik_fk_com = c.com_pk_id");
$db->SetWHERE("u.usu_pk_id = " . $uid . " and  c.com_pk_id = " . $cid);
$db->ExecSELECT();
                        
$result = $db->GetDataSet();
                        
$retorno = $result->fetch_assoc();
                      
   if($retorno) { 
                          
       if ($retorno['qtdLike'] >= 1) {

            echo $retornoQtdTotal['qtdLike'];

       } else {

               $dadosRegistro["lik_fk_usu"] = " ' $uid ' ";
               $dadosRegistro["lik_fk_com"] = " ' $cid ' ";
                                            
               $db->ClearSQL();
               $db->SetINSERT($dadosRegistro, "tblike");
                     
                  
               if($db->ExecINSERT()) { 
       
                      echo $retornoQtdTotal['qtdLike'];

               } else {

                      echo "Error";

                }


        }
                          
    } else {
                          
         echo 0;
      }
 
$db->FecharConexao();