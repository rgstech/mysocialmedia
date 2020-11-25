<?php

 require_once 'classes/Session.php';
 
    if ( !isset( Session::getValue('usuario') ) ){

        header('Location: login.php');
   
} 


