<?php 

require_once 'db/DataBase.php';

$db = new DataBase();
   
$pid = (int)$_GET['pid'];

$db->AbrirConexao();
  
$db->SetSELECT("select count(*) as qtdcomments", "tbcomment", "c");
$db->SetJOIN("tbpost as p on p.pst_pk_id = c.com_fk_pst");
$db->SetWHERE("p.pst_pk_id = $pid");
   
$db->ExecSELECT();

$result = $db->GetDataSet();

$retorno =  mysqli_fetch_assoc($result);
                      
 if($retorno) { 

     echo $retorno['qtdcomments'];

 } else {
     
    echo 0;
    
  }
                        
                 