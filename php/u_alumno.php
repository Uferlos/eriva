<?php
include 'files/config.php';

$db = new mysqli (host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$ci = $_POST['ci'];

$query = "SELECT * FROM alumnos WHERE ci = '$ci'";


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
  <form id="FormUpdAlumno" autocomplete="off">
    <table class="table is-bordered">
      <thead><th colspan="2">Actualizar Datos del Alumno</th></thead>
      <tbody>
        <tr>
          <td width="30%"><label for="ci">Cedula</label></td>
          <td width="70%">
            <input id="ci" name="ci" class="input" type="text" placeholder="Cedula de Identidad" required value="<?php echo $row['ci'] ?>">
          </td>
        </tr>
              
        <tr>
          <td><label for="ape">Apellidos</label></td>
          <td>
            <input id="ape" name="ape" class="text-only input" type="text" placeholder="Apellidos" required value="<?php echo $row['apellidos'] ?>">
          </td>
        </tr>
              
        <tr>
          <td><label for="nom">Nombres</label></td>
          <td>
            <input id="nom" name="nom" class="text-only input" type="text" placeholder="Nombres" required value="<?php echo $row['nombres'] ?>">
          </td>
        </tr>
              
        <tr>
          <td><label for="f_nac">Fecha de Nacimiento</label></td>
          <td>
            <input id="f_nac" name="f_nac" class="input" type="text" required value="<?php echo $row['fnacimiento'] ?>">
          </td>
        </tr>
              
        <tr>
          <td><label for="l_nac">Lugar de Nacimiento</label></td>
          <td>
            <input name="l_nac" class="text-only input cap" type="text" placeholder="Lugar de Nacimiento" required value="<?php echo $row['lugar_nacimiento'] ?>">
          </td>
        </tr>
              
        <tr>
          <td><label for="ent_fed">Entidad Federal</label></td>
          <td>
            <input name="ent_fed" class="text-only input cap" type="text" placeholder="Entidad Federal" required value="<?php echo $row['ent_federal_pais'] ?>">
          </td>
        </tr>
      </tbody>
      <input type="hidden" name="match" value="<?php echo $row['ci'] ?>">
      <input type="hidden" name="action" value="upd">
    </table> 
    <tfoot>
      <tr>
        <td>
          <button type="button" class="button is-danger" id="c_upd">Cancelar</button>
          <button type="submit" class="button is-success">Actualizar Datos</button>
        </td>
      </tr>
    </tfoot>
  </form>
</div>

<script type="text/javascript">

$('#c_upd').click(function(){
  $.post('../html/list_alumnos.html', function(data){
    $('#wrapper').html(data);
  })
})

$('#f_nac').flatpickr({
  locale: 'es',
  altInput: true,
  maxDate: 'today'
});

$('#ci').mask('A-00.000.000',{
  'translation':{
    A:{pattern: /[VE,ve]/}
  },
  placeholder:'V/E-__.___.___',
  clearIfNotMatch: true
});

$('.text-only').keydown(function(v){
  if ((v.keyCode > 47 && v.keyCode < 58)){
    v.preventDefault();
  }
});
</script>