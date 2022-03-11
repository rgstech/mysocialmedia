<?php


require_once './db/DataBase.php';

class Security {

    

    private static function _getDb(){
      
            return new DataBase();
        

    }
    public static function checkCommentOwnerShip(int $cid, int $uid) // 'checar' dono do comentario / verify comment owner
    { 
            
        $db = self::_getDb();

        $db->AbrirConexao();
        $db->SetSELECT("c.com_pk_id as cid,  
                        c.com_fk_usu as uid", 
                        "tbcomment", "c");
        $db->SetWHERE("c.com_pk_id = $cid");
        
        $db->ExecSELECT();
        
        if ( $db->TotalRegistros() <= 0 ) {
                return false;
        }
   
        $result = $db->GetDataSet();
 
        $db->FecharConexao();

        unset($db);
        
        if($result) {
                     
                     $linha = $result->fetch_assoc(); 
                     
                     return $linha['uid'] == $uid;

        } else {

            return false;
        }
       
                
     
          
           
    }

    public static function checkPostOwnerShip(int $pid, int $uid) // 'checar' dono do post / verify post owner
    {
    

        $db = self::_getDb();

        $db->AbrirConexao();
        $db->SetSELECT("p.pst_pk_id as pid,  
                        p.pst_fk_usu as uid", 
                        "tbpost", "p");
        $db->SetWHERE("p.pst_pk_id = $pid");
        
        $db->ExecSELECT();
        
        if ( $db->TotalRegistros() <= 0 ) {
                return false;
        }
   
        $result = $db->GetDataSet();
 
        $db->FecharConexao();

        unset($db);
        
        if($result) {
                     
                     $linha = $result->fetch_assoc(); 
                     
                     return $linha['uid'] == $uid;

        } else {

            return false;
        }


  }

}


