<?php 

 require_once 'classes/Session.php';
 require_once "db/DataBase.php";
 require_once "Util.php";
 
 Session::start();

 if (!Session::hasValue('login')) {   
    
      header('Location: login.php');
   
  } 
 
 ?>

<!doctype html>
<html>
<head>

<title> My social Media </title>

  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/geral.css">
  

</head>

<body>
  <header>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img style='width: 30px; height: 30px;' alt='' src='images/logoSocial.png'></a>
    </div>
    <!-- <ul class="nav navbar-nav"> 
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul> -->
    <ul class="nav navbar-nav navbar-right">
      <li><a href="perfil.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nome']; ?> </a></li>
      <li><a href="exit.php"><span class="glyphicon glyphicon-log-in"></span> Sair </a></li>
    </ul>
  </div>
</nav>
  </header>

    <hr>
    
    <div class="container">