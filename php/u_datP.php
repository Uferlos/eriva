<?php
include 'files/config.php';

$db = new mysqli (host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$query = "SELECT * FROM personal";

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
  <form id="formDirec" autocomplete="off">
    <table class="table is-narrow">
      <tbody>
        <tr>
          <td width="25%"><label for="dir">Nombre del Director(a)</label></td>
          <td width="75%">
            <p class="control has-icon has-icon-right">
              <input id="nom" class="text-only input" name="dir" type="text" required value="<?php echo $row['director'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        <tr>
          <td width="30%"><label for="ci_d">Cedula</label></td>
          <td width="70%">
            <p class="control has-icon has-icon-right">
              <input id="ci" name="ci_d" class="input" type="text" placeholder="Cedula de Identidad" required value="<?php echo $row['ci_d'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
      </tbody>
      <input type="hidden" name="match" value="<?php echo $row['id'] ?>">
      <input type="hidden" name="action" value="updd">
    </table>
  </form>
</div>
<button type="button" class="button is-white" id="closeP">Cerrar</button>
<button type="submit" form="formDirec" class="button is-info">Actualizar Datos</button>

<script type="text/javascript">
  $('#ci').mask('A-00.000.000', {clearIfNotMatch: true});
  
  $('.text-only').keydown(function(v){
    if ((v.keyCode > 47 && v.keyCode < 58)){
      v.preventDefault();
    }
  });
  
  $(function (){
  var ced = /^[VvEe]$/, entero = /^\d$/;
  $('#ci').on({
    keypress: function($E) {
      var $PRM = ($(this).val() == "") ? ced : entero;
      return $.inArray($E.which, [0, 8, 13]) >= 0 ? true : $PRM.test(String.fromCharCode($E.which));
    },
    keyup: function($E) {
      var $VL = $(this).val(), cedula = ["V", "v", "E", "e"];
      switch ($VL.length) {
        case 0:
          $VL = "";
          break;
        case 1:
          $VL = $.inArray($VL, cedula) == -1 ? "" : $VL;
          break;
        case 2:
          $VL = ($VL.charAt(1) != "-") ? $VL.charAt(0) + "-" + $VL.charAt(1) : $VL.charAt(0);
          break;
        default:
          $VL = ($VL.charAt(1) != "-") ? $VL = $VL.charAt(0) + "-" + $VL.substr(2, 11) : $VL;
          break;
      }
      $(this).val($VL.toUpperCase())
    }
  });
});
</script>