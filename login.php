<?php 
require_once 'classes/Session.php';
Session::start();

if (Session::hasValue('login')) {
    
    header('Location: home.php');
}

?>
<!DOCTYPE html>
<html>
<head>
 
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
      <link type="text/css" href="css/geral.css" rel="stylesheet">
       <!-- Bootstrap -->
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
<title> .:: My Social Media ::. </title>

  
<script language=javascript>

function valida_campos()
{
var d = document.formch;

	if (d.inputUser.value == "")	
     {    alert("Favor preencher o campo usuario !!!");
          d.usuario.focus();
          return false;
     } 	 


	if (d.inputPassword.value == "")	
     {    alert("Favor preencher o campo senha !!!");
          d.senha.focus();
          return false;
     } 	 
 
}

</script>

  
  </head>
  
 <body class="corpo"> 
 
 <div id="tudo">
 
 
 <div id="cabecalho" align='center'>
     <img src="images/logoSocialB.jpg" width="100%" height="60%">     
  <!-- <h2 align="center" > <strong><font color="white"> Ger. Gest�o e Controle</font> <br /> </strong> </h2> --> 
  </div> 
  

<hr />


<p>&nbsp;</p>


<div align="center" id="estilo" style="padding-top:40px;">



    <form style="width: 15%; height: 280px" name="formch" method="POST" action="enter.php" OnSubmit="return valida_campos()">
    <div class="form-group">
        <label for="inputUser">Usuario</label>
        <input type="text" class="form-control" name= "user" id="inputUser" placeholder="Usuario">
    </div>
    <div class="form-group">
        <label for="inputPassword">Senha</label>
        <input type="password" class="form-control" name="pass" id="inputPassword" placeholder="Senha">
    </div>
    
    <button type="submit" class="btn btn-primary">Login</button>
</form>




</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
    
<hr />

<?php require_once 'foot.php';   ?>


</div>

</body>

</html>
