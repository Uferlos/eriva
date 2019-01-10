<?php
include 'files/config.php';

$db = new mysqli (host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$query = "SELECT * FROM plan_estudio";

if(!$res = $db->query($query)){
  echo $db->error;
  exit();
}

$row = $res->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="container box">
  <form id="formPlanestudio" autocomplete="off">
    <table class="table is-narrow">
      <tbody>
        <tr>
          <td><label for="iniP">Inicio de Semestre</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input class="input dat" name="iniP" type="text" required value="<?php echo $row['iniP'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="endP">Fin de Semestre</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input class="input dat" name="endP" type="text" required value="<?php echo $row['endP'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
      </tbody>
      <input type="hidden" name="match" value="<?php echo $row['cod_dea'] ?>">
      <input type="hidden" name="action" value="upde">
    </table>
  </form>
</div>
<button type="button" class="button is-white" id="closeP">Cerrar</button>
<button type="submit" form="formPlanestudio" class="button is-info">Actualizar Datos</button>

<script type="text/javascript">
  $('.text-only').keydown(function(v){
    if ((v.keyCode > 47 && v.keyCode < 58)){
      v.preventDefault();
    }
  });

  $('.dat').flatpickr({
    locale: 'es',
    altInput: true
  })
</script>