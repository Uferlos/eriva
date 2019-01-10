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

<div class="title">Certificación de Calificaciones</div>
  <div class="container box" style="width: 1200px">
    <table class="table">
      <tbody>
        <tr>
          <td width="30%"><label for="ci">Cedula</label></td>
          <td width="30%">
            <input class="input" name="ci" type="text" required id="ci" placeholder="Cedula de Identidad" autocomplete="off">
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
</div>
<br><br>
<button type="button" class="button is-white" id="closeLN">Cerrar</button>
<button type="button" class="button is-info" id="print">Imprimir</button>

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

loader_ca = function(){
  var ci_a = $('#ci').val();
  if(ci_a === '' || ci_a === 'V'){
    return false;
  }
  $.ajax({
    url: '../php/info_calificacionesG.php',
    data: {
      ci: ci_a
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
      loader_ca();
    }
  })
})
$('#print').click(function(){
  var ced = $('#ci').val();
  var obs = $('#obser').val();
  var np1 = $('#nomp1').val();
  var np2 = $('#nomp2').val();
  var np3 = $('#nomp3').val();
  var np4 = $('#nomp4').val();
  var np5 = $('#nomp5').val();
  var lp1 = $('#locp1').val();
  var lp2 = $('#locp2').val();
  var lp3 = $('#locp3').val();
  var lp4 = $('#locp4').val();
  var lp5 = $('#locp5').val();
  var ep1 = $('#efp1').val();
  var ep2 = $('#efp2').val();
  var ep3 = $('#efp3').val();
  var ep4 = $('#efp4').val();
  var ep5 = $('#efp5').val();
  $.ajax({
    url: '../php/print/notesG.php',
    type: 'post',
    data: {
      ci: ced,
      obse: obs,
      nomp1: np1,
      nomp2: np2,
      nomp3: np3,
      nomp4: np4,
      nomp5: np5,
      locp1: lp1,
      locp2: lp2,
      locp3: lp3,
      locp4: lp4,
      locp5: lp5,
      efp1: ep1,
      efp2: ep2,
      efp3: ep3,
      efp4: ep4,
      efp5: ep5
    },
    dataType: 'html'
  })
  .done(function(datos){
    var newWindow = window.open()
    newWindow.document.write(datos)
  })
})
</script>
</body>
</html>