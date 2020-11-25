<?php

require_once 'head.php';  

$db = new DataBase();

if ( isset($_POST['action']) ) {
       
   //aqui vai todo o codigo pra salvar e redirecionar pra home.php
       
    $textpost = $_POST['txtpost'];
    $user     = Session::getValue('id');
       
     
     $data = [ 'pst_fk_usu' => "'" . $user . "'", //obs: importante envolver variaveis string em aspas simples para correta construção da query
               'pst_text'   => "'" . $textpost . "'",
               'pst_dt_pst' => "now()" ]; 
    
    $db->AbrirConexao();
     
    $db->SetINSERT($data, "tbpost"); 
    $resultUpdate = $db->ExecINSERT();
    
    $db->FecharConexao();
    
      if ($resultUpdate) {
                                              
                 echo " <label style='font-size: 12px;' class='label label-success' align='center'>Texto postado com sucesso!</label>";
                                           

         } else {
                      echo "error! " . $conn->error();
                      echo "<script> alert('Seu texto nao pode ser postado, tente novamente'); 
                                             window.location='home.php;  
                            </script>";
                                            
          }
    
     
}


?>
<div id="tudo">

<div class="box box-primary">
			<div class="box-header with-border">
    
                            <h5 class="box-title"><strong> Novo Post </strong> </h5>
      <div class="form-group"> 
<form name="frmpost" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     
    <input type="hidden" name="action" value="salvar">
    
    
    <table align="center">
    
        <tr>   <td colspan="2"> <textarea rows="10" cols="80" name="txtpost" placeholder="escreva aqui seu post..."> </textarea>  
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

<?php include_once 'foot.php'; ?>