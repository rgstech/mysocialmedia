<?php
//Arquivo para testar classe da Sessão / Session Class test
require_once 'Session.php';

Session::start();

$varray = [  "nome"      => "Rodrigo",
             "email"    => "rod@email.com",
             "endereco" => "Rua das arvores numero 120"];

Session::setArray($varray);

echo Session::getValue("nome") . "</br>";
echo $_SESSION["nome"] . "</br>";
