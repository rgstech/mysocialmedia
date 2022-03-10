<?php 

require_once 'head.php';
 
$uid = (int)$_GET['uid'];
  
$db = new DataBase();

$db->AbrirConexao();
 
$db->SetSELECT("usu_nome as nome, 
                usu_email as email,
                usu_tel as tel,
                usu_img as image,
                usu_dt_cad as cadastro,
                usu_sexo as sexo", "tbusuario");
 

 $db->SetWHERE("usu_pk_id = $uid");
   
 $db->ExecSELECT();

 $result = $db->GetDataSet();
 
 $db->FecharConexao();
 
           if($result) {
              
              $linha = $result->fetch_assoc(); 
 
?>

<div id="tudo">
    
    
        <div class="box box-primary">
			<div class="box-header with-border">
    
                            <h5 class="box-title"><strong> Perfil de <?php echo  $linha['nome']; ?> </strong> </h5>
      <div class="form-group">       
    <table align="center" width="495" height="104" class='table-bordered'>
        
        
  <tr>
      <td width="135" rowspan="6"> <img src='<?php echo $linha['image']; ?>'> </td>
   
  </tr>
  <tr>
   
      <td width="344" height="23"><strong>Nome:</strong>&nbsp;  <?php echo htmlspecialchars($linha['nome']); ?></td>
  </tr>
  <tr>
    
    <td height="23"><strong>Email:</strong>&nbsp;  <?php echo htmlspecialchars($linha['email']); ?></td>
  </tr>
  <tr>
    
    <td height="23"><strong>Telefone:</strong>&nbsp;  <?php echo $linha['tel']; ?></td>
  </tr>
  <tr>
    
      <td height="23"><strong>Usuario desde:</strong>&nbsp;  <?php echo Util::formatDate($linha['cadastro']); ?></td>
  </tr>
    <tr>
    
        <td height="23"><strong>Sexo:</strong>&nbsp;  <?php echo  Util::retornoSexo($linha['sexo']); ?></td>
  </tr>
  
  
           <?php }  ?>
</table>
          
      </div>
    
                        </div>
        </div>
         
      <div align="center" class="form-group" >
    <a href="home.php" class="btn btn-info">Voltar</a>  
    
    </div>
    
</div>

<?php include_once 'foot.php'; ?>