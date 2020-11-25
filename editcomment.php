<?php

require_once 'head.php';  

$db = new DataBase();

$textcomment = "";


if (isset($_GET['cid'])) {

   $cid = $_GET['cid'];

    $db->AbrirConexao();
    
    $db->SetSELECT("com_text as texto", "tbcomment", "c");
    $db->SetWHERE("c.com_pk_id = " . $cid );
    $db->ExecSELECT();


    $resultGetTextComm  = $db->GetDataSet();


            if(  $resultGetTextComm ) {

                    $linhaText = $resultGetTextComm->fetch_assoc();

                    $textcomment = $linhaText['texto'];  

         
						                              
            } 
   
   
      $db->FecharConexao();
}

if ( isset($_POST['action']) ) {
     
    
   //aqui vai todo o codigo pra salvar e redirecionar pra home.php
       

   
    $textcomment =  $_POST['txtcomment'];
    $cid         =  $_POST['cid'];
    $user        =  Session::getValue('id');
    
   
    $data = ['com_text' => "'" . $textcomment . "'"]; // data = dados  obs: o comando update da query builder exige adição de aspas simples nos valores strings
     
     $db->AbrirConexao();
     
    $db->ClearSQL(); //limpar comandos anteriores
    
    $db->SetUPDATE($data, "tbcomment");
    $db->SetWHERE("com_pk_id = $cid and com_fk_usu = $user");
    
    
    $resultUpdate = $db->ExecUPDATE();
    
    $db->FecharConexao();
     
     if ($resultUpdate) {
         echo "<div align='center'>";   
         echo "<label style='font-size: 12px;' class='label label-success' align='center'>Comentario atualizado sucesso!</label>";
         echo "</div>"; 
	 echo "<br>";
 
        } else {
         
           echo "<script> alert('Seu comentario não pode ser atualizado, tente novamente'); 
                          window.location='home.php;  
                 </script>";
                                            
        }
    
        
}


?>
<div id="tudo">

<div class="box box-primary">
			<div class="box-header with-border">
    
                            <h5 class="box-title"><strong> Editar Comentário</strong> </h5>
      <div class="form-group"> 
	  
<form name="frmcomment" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    
    <input type="hidden" name="cid" value="<?php echo $cid; ?>">
    <input type="hidden" name="action" value="salvar">
    
    
    <table align="center">
    
        <tr>   <td colspan="2"> <textarea rows="10" cols="80" name="txtcomment" placeholder="escreve aqui seu comentario..."> <?php echo $textcomment; ?> </textarea>  
                <br>
                 <div class="form-group">
                    <button class="btn btn-success" name="enviar"> Enviar </button>
                       <a href="home.php" class="btn btn-info">Voltar</a>  
                 </div>
             <br>
            </td> </tr>
       
<!--        <tr>   <td> <input type="submit" name="enviar"> </td>
                <td> <input type="submit" name="limpar"> </td>
         </tr> -->
         
    </table>
    
</form>


</div>
</div>
</div>
</div>

<?php 

require_once 'foot.php'; 

?>