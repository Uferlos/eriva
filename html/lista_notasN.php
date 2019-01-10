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
<button type="button" class="button is-white" id="control">Cerrar</button>
<button type="button" class="button is-info" id="print">Imprimir</button>

<script type="text/javascript">
$('#ci').mask('A-00.000.000', {clearIfNotMatch: true});

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
    url: '../php/info_calificacionesN.php',
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
  //*******************************
  var id1 = $('#idi1').val();
  var apr1 = $('#apr1').val();
  var mes1 = $('#mes1').val();
  var an1 = $('#an1').val();
  var per1 = $('#peri1').val();
  
  var id2 = $('#idi2').val();
  var apr2 = $('#apr2').val();
  var mes2 = $('#mes2').val();
  var an2 = $('#an2').val();
  var per2 = $('#peri2').val();

  var id3 = $('#idi3').val();
  var apr3 = $('#apr3').val();
  var mes3 = $('#mes3').val();
  var an3 = $('#an3').val();
  var per3 = $('#peri3').val();

  var id4 = $('#idi4').val();
  var apr4 = $('#apr4').val();
  var mes4 = $('#mes4').val();
  var an4 = $('#an4').val();
  var per4 = $('#peri4').val();

  var idl1 = $('#idil1').val();
  var aprl1 = $('#aprl1').val();
  var mesl1 = $('#mesl1').val();
  var anl1 = $('#anl1').val();
  var perl1 = $('#peril1').val();

  var idl2 = $('#idil2').val();
  var aprl2 = $('#aprl2').val();
  var mesl2 = $('#mesl2').val();
  var anl2 = $('#anl2').val();
  var perl2 = $('#peril2').val();

  var idl3 = $('#idil3').val();
  var aprl3 = $('#aprl3').val();
  var mesl3 = $('#mesl3').val();
  var anl3 = $('#anl3').val();
  var perl3 = $('#peril3').val();

  var idl4 = $('#idil4').val();
  var aprl4 = $('#aprl4').val();
  var mesl4 = $('#mesl4').val();
  var anl4 = $('#anl4').val();
  var perl4 = $('#peril4').val();

  $.ajax({
    url: '../php/print/notesN.php',
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
      efp5: ep5,
      id1: id1,
      apr1: apr1,
      mes1: mes1,
      an1: an1,
      per1: per1,
      id2: id2,
      apr2: apr2,
      mes2: mes2,
      an2: an2,
      per2: per2,
      id3: id3,
      apr3: apr3,
      mes3: mes3,
      an3: an3,
      per3: per3,
      id4: id4,
      apr4: apr4,
      mes4: mes4,
      an4: an4,
      per4: per4,
      idl1: idl1,
      aprl1: aprl1,
      mesl1: mesl1,
      anl1: anl1,
      perl1: perl1,
      idl2: idl2,
      aprl2: aprl2,
      mesl2: mesl2,
      anl2: anl2,
      perl2: perl2,
      idl3: idl3,
      aprl3: aprl3,
      mesl3: mesl3,
      anl3: anl3,
      perl3: perl3,
      idl4: idl4,
      aprl4: aprl4,
      mesl4: mesl4,
      anl4: anl4,
      perl4: perl4
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