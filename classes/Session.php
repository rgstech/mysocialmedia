<?php

/**
 * Classe para controle da sessão
 * @author Rodrigo.Guimaraes
 */
class Session
{
    /**
     * inicializa uma sessão
     */
    public static function start()
    {
        if (!session_id())
        {
            session_start();
        }
    }

    /**
     * Armazena uma variável na sessão
     * @param $var     = Nome da variável
     * @param $value = Valor
     */
    public static function setValue($var, $value)
    {
        $_SESSION[$var] = $value;
    }
    
    public static function setArray(Array $arr)
    {
       
           foreach($arr as $key => $value) {
              
               $_SESSION[$key] = $value;
           }
           
          
    }
       
    public static function getArray()
    {
        $sessionArr = array();
             
         foreach($_SESSION as $key => $value) {
               
                $sessionArr[$key] = $value;
               
         }
                    
          return $sessionArr;
             
    }

    /**
     * Retorna uma variável da sessão
     * @param $var = Nome da variável
     */
    public static function getValue($var)
    {
        if (isset($_SESSION[$var]))
        {
            return $_SESSION[$var];
        }
    }

        /**
     * Verifica a existencia de um valor na sessão
     * @param $var = Nome da variável
     */
    public static function hasValue($var)
    {
        if (isset($_SESSION[$var]))
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    
   public static function removeValue($var)
   {
        if (isset($_SESSION[$var]))
        {
            unset($_SESSION[$var]);
            return TRUE;
        }
        
        return FALSE;
    }
    /**
     * Destrói os dados de uma sessão
     */
    public static function free()
    {
        $_SESSION = array();
        session_destroy();
    }
}
