<?php

require_once 'head.php';  

$db = new DataBase();

$posttext = "";


if (isset($_GET['pid'])) {

    $pid = (int)$_GET['pid'];
    
    $db->AbrirConexao();
    
    $db->SetSELECT("pst_text as texto", "tbpost", "p");
    $db->SetWHERE("p.pst_pk_id = " . $pid );
    $db->ExecSELECT();


    $resultGetTextPost  = $db->GetDataSet();


            if( $resultGetTextPost ) {

                    $linhaText = $resultGetTextPost->fetch_assoc();

                    $posttext = $linhaText['texto'];  

         
						                              
            } 
 $db->FecharConexao();
}

if ( isset($_POST['action']) ) {
     
    
   // aqui vai todo o codigo pra salvar e redirecionar pra home.php
       
    
    $textpost = $_POST['txtpost'];
    $pid      = $_POST['pid'];
    $user     = Session::getValue('id');
      
    $data = ['pst_text' => "'" . $textpost . "'"]; // data = dados  obs: o comando update da query builder exige adição de aspas simples nos valores strings
     
    $db->AbrirConexao();
     
    $db->ClearSQL(); //limpar comandos anteriores
    
    $db->SetUPDATE($data, "tbpost");
    $db->SetWHERE("pst_pk_id = $pid and pst_fk_usu = $user");
    
    
    $resultUpdate = $db->ExecUPDATE();
    
    $db->FecharConexao();
 
    if ($resultUpdate) {
             echo "<div align='center'>";  
             echo " <label style='font-size: 12px;' class='label label-success' align='center'>Post atualizado sucesso!</label>";
             echo "</div>";
             echo "<br>";

        } else {
                                        
              echo "<script> alert('Seu Post não pode ser atualizado, tente novamente'); 
                        window.location='home.php;  
                    </script>";
                                            
          }
    
      
} 



?>
<div id="tudo">


<div class="box box-primary">
			<div class="box-header with-border">
    
                            <h5 class="box-title"><strong> Editar Post </strong> </h5>
<div class="form-group"> 

<form name="frmpost" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
     
    <input type="hidden" name="action" value="salvar">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    
    <table align="center">
        <tr><td colspan="2"> <textarea rows="10" cols="80" name="txtpost" > <?php echo $posttext; ?> </textarea>  
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
</div>
</div>
</div>

<?php include_once 'foot.php'; ?>