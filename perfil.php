<?php

require_once 'head.php';

?>

<div id="tudo">

  <div class="box box-primary">
    <div class="box-header ">
      <h5 class="box-title"> <strong> Perfil de <?php echo Session::getValue('nome'); ?> </strong> </h5>
      <div class="form-group">
        <table align="center" width="495" height="104" class="table-condensed" style="border: none">
          <tr>
            <td width="135" rowspan="6"> <img class="img-circle" alt="my-profile" src='<?php echo Session::getValue('image'); ?>'> </td>
          </tr>
          <tr>
            <td width="344" height="23"><strong> Nome:</strong> &nbsp; <?php echo  htmlspecialchars(Session::getValue('nome')); ?></td>
          </tr>
          <tr>
            <td height="23"><strong> Email:</strong> &nbsp; <?php echo  htmlspecialchars(Session::getValue('email')); ?></td>
          </tr>
          <tr>
            <td height="23"><strong> Telefone:</strong> &nbsp; <?php echo  htmlspecialchars(Session::getValue('tel')); ?></td>
          </tr>
          <tr>
            <td height="23"><strong>Usuario desde:</strong>&nbsp; <?php echo Util::formatDate(Session::getValue('data_cad')); ?></td>
          </tr>
          <tr>
            <td height="23"><strong>Sexo:</strong>&nbsp; <?php echo Util::retornoSexo(Session::getValue('sexo')); ?></td>
          </tr>
        </table>

      </div>
    </div>
  </div>

  <div align="center" class="form-group">
    <a href="home.php" class="btn btn-info">Voltar</a>
  </div>
  
</div>

<?php require_once 'foot.php'; ?>