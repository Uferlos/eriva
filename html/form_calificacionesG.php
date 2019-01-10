<?php
include '../php/files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_error){
  echo $db->connect_error;
  exit();
}

$queryL = "SELECT cod_dea FROM plantel";
if(!$res = $db->query($queryL)){
  echo $db->error;
  exit();
}
$row = $res->fetch_assoc();
?>
<form id="formCalificacionesG" autocomplete="off">
  <div class="title">Calificaciones de <?php echo $_POST['nombreSemestre'] ?> </div>
  <div class="container box" style="width: 900px">
    <table class="table">
      <tbody>
        <tr>
          <td width="30%"><label for="ci">Cedula</label></td>
          <td width="30%">
            <input class="input" name="ci" type="text" required id="ci" placeholder="Cedula de Identidad">
          </td>
        </tr>
        
        <tr>
          <td colspan="2">
            <div id="datalumno" class="bs-docs-example" title="Datos del alumno"></div>
          </td>
        </tr>
        
        <tr>
          <td colspan="2">
            <div id="datasignaturas" class="bs-docs-example" title="Asignaturas y Calificaciones"></div>
          </td>
        </tr>
        <input type="hidden" name="cod_dea" value="<?php echo $row['cod_dea'] ?>">
        <input type="hidden" name="action" value="add">
      </tbody>
    </table>
  </div>
</form>
<br><br>
<button type="button" class="button is-white" id="closeCG">Cerrar</button>
<button type="submit" form="formCalificacionesG" class="button is-info">Procesar Notas</button>

<script type="text/javascript">
$('#ci').mask('A-00.000.000', {clearIfNotMatch: true});
$('#f_nac').mask('00/00/0000', {clearIfNotMatch: true});

$.getJSON('../php/auto_alumno.php', function(data){
  $('#ci').typeahead({source:data});
});

$(function (){    
  var ced = /^[VvEe]$/, entero = /^\d$/;
  $('#ci').on({
    keypress: function($E){
      var $PRM = ($(this).val() == "") ? ced : entero;
      return $.inArray($E.which, [0, 8, 13]) >= 0 ? true : $PRM.test(String.fromCharCode($E.which));
    },
    keyup: function($E) {
      $('#datalumno').html('');
      $('#datasignaturas').html('');
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

loader_as = function(){
  var ci_a = $('#ci').val();
  var id_s = <?php echo $_POST['idSemestre'] ?>;
  if(ci_a === '' || ci_a === 'V'){
    return false;
  }
  $.ajax({
    url: '../php/info_asignaturasG.php',
    data: {
      ci: ci_a,
      id_s: id_s
    },
    dataType: 'html',
    type: 'post'
  })
  .done(function(datos){
    $('#datasignaturas').html(datos);
  })
}

loader_al = function(){
  var ced = $('#ci').val();
  if(ced === '' || ced === 'V') {
    return false;
  }
  $.ajax({
    url: '../php/info_alumnos.php',
    data: {ci: ced},
    dataType: 'html',
    type: 'post'
  })
  .done(function(datos){
    $('#datalumno').html(datos);
  })
}

$(function(){
  $('#ci').on({
    change: function(){
      loader_al();
      loader_as();
    }
  })
})
</script>
</body>
</html>