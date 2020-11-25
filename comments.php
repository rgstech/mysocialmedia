

<?php 

    require_once 'head.php';  
 
    
    $db = new DataBase();
     
    $pid = (int)$_GET['pid']; //pega id do post para listar somente comentarios deste post(pid)
    
      
    
?>
  
<script>


function refreshLikesComm(cid, uid, elemento){
        $.ajax({
          url: "likecomment.php?cid=" + cid + "&uid=" + uid,
          cache: false,
          success: function(data){
             //$("#likespanel").html(data);
             //alert( elemento );
              elemento.innerHTML = " " + data;
              
          } 
        }); 
}

</script>

<div id="tudo">
    
        
<table class="table-bordered" align="center" width="200">
   <?php 
   
         //comentarios terao foto user; nome do user ; likes ; edita; data

   $db->AbrirConexao();
    //tem que cruzar comentario - post - usuario 
   $db->SetSELECT("c.com_pk_id as cid,   
                           c.com_text as texto,
                           c.com_dt_com as data,
                           u.usu_pk_id as uid,
                           u.usu_nome as nome,
                           u.usu_img as image ", 
               "tbcomment", "c");
   $db->SetJOIN("tbpost AS p ON p.pst_pk_id = c.com_fk_pst");
   $db->SetJOIN("tbusuario AS u ON c.com_fk_usu = u.usu_pk_id");
   $db->SetWHERE("p.pst_pk_id = $pid");
   
   $db->ExecSELECT();

   $resultComments = $db->GetDataSet();
   	 
	  if ( $db->TotalRegistros() <= 0 ){
		  
		  echo "<div align='center'>";
		  echo " <label style='font-size: 12px;' class='label label-warning' align='center'>Ainda não há comentarios para esse post, seja o primeiro a comentar!</label>";
		  echo "<br>";
		  echo "<br>";
		  echo" <a href='home.php' class='btn btn-info'>Voltar</a>"; 
		  echo "</div>";
              		  
	  }

         if($resultComments) {

            while($linha = $resultComments->fetch_assoc()) { // incio while pincipal
                
                             
                      // conta quantidade de likes para o post na hora do carregamento        
 
                
           $db->ClearSQL();
       
           $db->SetSELECT("count(*) as qtdLike", "tblike", "l");
           $db->SetJOIN("tbcomment as c on l.lik_fk_com = c.com_pk_id");
           $db->SetWHERE(" c.com_pk_id = " . $linha['cid'] . " ");
           $db->ExecSELECT();

             
           $resultInitTotalLikes = $db->GetDataSet();
           $qtdLikes = 0; 
                      
               if( $resultInitTotalLikes ) {
                              
                              $linhaInitLikes = $resultInitTotalLikes->fetch_assoc();
                              $qtdLikes =  $linhaInitLikes['qtdLike'];
               } 
                 
                //****************************** fim conta likes ***************************
                                                                                                 

   ?>

   <tr>

       <td width="30px" rowspan="2"> <img style="width: 108px; height: 108px" src="<?php echo $linha['image'] ?>"><br> <br> 
           <a href="friendprofile.php?uid=<?php echo $linha['uid']; ?>" class="label label-primary"> <?php echo $linha['nome']; ?></a>
           <label> <?php echo  Util::formatDateTime($linha['data']); ?> </label>
       </td>

   </tr>
 
  <tr>

      <td> 
          
      <textarea disabled="true" rows="8" cols="60"> <?php echo $linha['texto'] ?> </textarea>
      <div class="form-group">  
                                                        
         <button class="btn btn-info glyphicon glyphicon-thumbs-up" onclick="refreshLikesComm(<?php echo $linha['cid']; ?> , <?php echo $_SESSION['id']; ?> , this);"> <?php echo $qtdLikes ?> </button> 
               
          <!-- regra do botao editar -->
          <?php  if ($linha['uid'] == Session::getValue("id")) { ?>
          
          <a href="editcomment.php?cid=<?php echo $linha['cid']; ?>"  class="btn btn-warning glyphicon glyphicon-pencil" role="button">&nbsp;Editar</a> 
          <a href="deletecomment.php?cid=<?php echo $linha['cid']; ?>&uid=<?php echo Session::getValue("id"); ?>"  class="btn btn-danger glyphicon glyphicon-remove" role="button">&nbsp;Excluir</a> 
          <?php } ?>
      </div>
       
      </td>

  </tr> 
  
  <?php } //fim while

           }      
               
                     
                    
           //fim if principal
           
           $db->FecharConexao(); ?>


</table>
    
    
   
</div>



<?php include_once 'foot.php'; ?>


