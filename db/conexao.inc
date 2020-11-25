<?php


function conectar($servername, $username, $password, $dbname ){
 
        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verifica conexão 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return null;
        }

        return $conn;

}
 