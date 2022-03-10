<?php

require_once 'head.php';
require_once 'db/DataBase.php';

$db = new DataBase();

?>
  
<script>
   
function refreshLikesPost(pid, uid, elemento){
        $.ajax({
          url: "like.php?pid=" + pid + "&uid=" + uid ,
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
    <div class="form-group" align="center">
    <a href="newpost.php" class="btn btn-primary glyphicon glyphicon-plus" role="button">&nbsp;Novo</a>  
    </div>
  
    <div class="form-group home-posts-wrapper" style="background-color: #fbfbfb">
         <table class="table-bordered" align="center" width="200">
   <?php 

   
   
    
$db->AbrirConexao();
$db->SetSELECT("p.pst_pk_id as pid, p.pst_text as texto, p.pst_dt_pst as data, "
             . "u.usu_pk_id as uid, u.usu_nome as nome, u.usu_img as image ",
               "tbpost", "p");
$db->SetJOIN("tbusuario as u on p.pst_fk_usu = u.usu_pk_id","left");
$db->SetORDER("p.pst_dt_pst");
$db->ExecSELECT();

$DataSet = $db->GetDataSet();

    while( $linha = $DataSet->fetch_assoc() ) { //incio while PRINCIPAL
         
        $db->ClearSQL();
            
        $db->SetSELECT("count(*) as qtdcomm", "tbcomment", "c");
        $db->SetJOIN("tbpost as p on p.pst_pk_id = c.com_fk_pst
                                   where p.pst_pk_id = " . $linha['pid']. " ");
        $db->ExecSELECT();

              
        $resultCountComment = $db->GetDataSet();
                   
            $qtdcom = 0;
            if( $resultCountComment) {
                              
               $linhaCountComment = $resultCountComment->fetch_assoc();
               $qtdcom =  $linhaCountComment['qtdcomm'];
            }
                  
            $db->ClearSQL();
            $db->SetSELECT("count(*) as qtdLike", "tblike", "l");
            $db->SetJOIN("tbpost AS p ON l.lik_fk_post = p.pst_pk_id WHERE p.pst_pk_id = " . $linha['pid']);
            $db->ExecSELECT();
            
            $resultCountLike = $db->GetDataSet();
            

             $qtdLikes = 0;
             if($resultCountLike) {
                              
                $linhaCountLike = $resultCountLike->fetch_assoc();
                $qtdLikes       =  $linhaCountLike['qtdLike'];
                
             }
               
                                        
   ?>
 
   <tr>

       <td width="30px" rowspan="2"> <img style="width: 108px; height: 108px" class="img-circle" src="<?php echo $linha['image'] ?>"><br> <br> 
           <a href="friendprofile.php?uid=<?php echo $linha['uid']; ?>" class="label label-primary"> <?php echo $linha['nome']; ?></a>
           <label> <?php echo  Util::formatDateTime($linha['data']); ?> </label>
       </td>

   </tr>

  <tr>

      <td> 
          
      <textarea class="form-group" disabled="true" rows="8" cols="60"> <?php echo  htmlspecialchars($linha['texto']); ?> </textarea>
      <div class="form-group">  
          
          <div class="form-group">   <a  class="label label-primary" href="comments.php?pid=<?php echo $linha['pid']; ?>"> comentarios:  &nbsp; <?php echo $qtdcom; ?> </a> &nbsp; </div>
           
          <button class="btn btn-info glyphicon glyphicon-thumbs-up" onclick="refreshLikesPost(<?php echo $linha['pid']; ?> , <?php echo Session::getValue('id'); ?> , this);"> <?php echo $qtdLikes ?></button> 
           
          <a href="newcomment.php?pid=<?php echo $linha['pid']; ?>&uid=<?php echo Session::getValue('id'); ?>"  class="btn btn-success glyphicon glyphicon-comment" role="button">&nbsp;Comentar</a>  
         
          <!-- regra do botao editar -->
          <?php  if ($linha['uid'] == Session::getValue('id')) {  ?>
          
          <a href="editpost.php?pid=<?php echo $linha['pid']; ?>"  class="btn btn-warning glyphicon glyphicon-pencil" role="button">&nbsp;Editar</a> 
          <a href="deletepost.php?pid=<?php echo $linha['pid']; ?>&uid=<?php echo Session::getValue('id'); ?>"  class="btn btn-danger glyphicon glyphicon-remove" role="button">&nbsp;Excluir</a> 
          <?php } ?>
      </div>
       
      </td>

  </tr>
  
  <?php } //fim while PRINCIPAL?>

  <?php $db->FecharConexao(); ?>
</table>
    </div>
      
</div>

<?php require_once 'foot.php'; ?>


