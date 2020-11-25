
<?php

require_once 'head.php';  

$db = new DataBase();

if (isset($_GET['pid'])) {

   $pid = $_GET['pid'];

}

if ( isset($_POST['action']) ) {
      
   //aqui vai todo o codigo pra salvar e redirecionar pra home.php
       
    $textcomment =  $_POST['txtcomment'];
    $pid         =  $_POST['pid'];
    $user        = Session::getValue('id');
    
    $data = [ 'com_fk_usu' => "'" . $user . "'", //obs: importante envolver variaveis string em aspas simples para correta construção da query
              'com_fk_pst' => "'" . $pid . "'",
              'com_text'   => "'" . $textcomment . "'",
              'com_dt_com' => "now()" ]; 
    
    $db->AbrirConexao();
     
    $db->SetINSERT($data, "tbcomment"); 
    $resultUpdate = $db->ExecINSERT();
    
     if ($resultUpdate) {
                                              
                    echo " <label style='font-size: 12px;' class='label label-success' align='center'>Comentario enviado com sucesso!</label>";
                                           
         } else {
                    echo "error! " . $conn->error();
                    echo "<script> alert('Seu comentario nao pode ser enviado, tente novamente'); window.location='home.php; </script>";
                                            
          }
    
    
  
    $db->FecharConexao();
     
}


?>
<div id="tudo">

<div class="box box-primary">
			<div class="box-header with-border">
    
                            <h5 class="box-title"><strong> Novo Comentário </strong> </h5>
      <div class="form-group"> 
<form name="frmcomment" action="newcomment.php" method="POST">
    
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    <input type="hidden" name="action" value="salvar">
    
    
    <table align="center">
    
        <tr>   <td colspan="2"> <textarea rows="10" cols="80" name="txtcomment" placeholder="escreve aqui seu comentario..."> </textarea>  
                <br>
                 <div class="form-group">
                    <button class="btn btn-success" name="enviar"> Enviar </button>
                       <a href="home.php" class="btn btn-info">Voltar</a>  
                 </div>
             <br>
            </td> </tr>
       
    </table>
    
</form>


</div>


<?php include_once 'foot.php'; ?>