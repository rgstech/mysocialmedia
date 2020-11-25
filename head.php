<?php 

 require_once 'classes/Session.php';
 require_once "db/DataBase.php";
 require_once "Util.php";
 
 Session::start();

  if (!Session::hasValue('login')){   
    
      header('Location: login.php');
   
} 
 
 ?>

<!doctype html>
<html>
<head>

<title> My social Media</title>

  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
  


</head>

<body>
<div id="cabecalho">

<div id="logooi" style="" ><table id="tblogo" border='0' cellpadding='0' cellspacing='0'><tbody bgcolor='#7E78B6'>
  <tr>
      <td style='width: 64px;'><img style='width: 64px; height: 64px;' alt='' src='images/logoSocial.png'></td>
      <td style='width:32px;'>&nbsp;&nbsp;&nbsp;</td>
	  <td style='width: 100%; font-family: Trebuchet MS; color: rgb(255, 255, 255);'><big> MY SOCIAL MEDIA </big><br><small> HOME!</small> <br></td>
  </tr></tbody></table> 
	  
</div>
    <h5 align='right' id="welcomeh" class="small">  Seja Bem Vindo(a): <span id="welcome_name"> <a href="perfil.php"> <?php echo $_SESSION['nome']; ?> </a></span> &nbsp; </h5>
    <h5 align='right' id="welcomeh" class="small">   <span id="welcome_name"> <a href="exit.php" class="glyphicon glyphicon-log-out"> Sair </a></span> &nbsp; </h5>
</div>
    <hr>
    
    <div class="container">