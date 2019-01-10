<?php 
include '../php/files/config.php';
$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');

$query = "SELECT cod_dea FROM plantel";
$res = $db->query($query);
$row = $res->fetch_assoc();
?>
<div class="container box">  
  <form id="formAlumnos" autocomplete="off">
    <table class="table is-narrow">
      <tbody>
        <thead><th colspan="2" style="text-align: center;">Registro de Alumnos</th></thead>
        
        <tr>
          <td><label for="ci">Cedula</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="ci" class="input" type="text" required id="ci" placeholder="Cedula de Identidad">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="ape">Apellidos</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="ape" class="text-only input" type="text" required id="ape" placeholder="Apellidos">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="nom">Nombres</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="nom" class="input text-only" type="text" required id="nom" placeholder="Nombres">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="f_nac">Fecha de Nacimiento<br></label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="f_nac" class="input" type="text" required id="f_nac" placeholder="Fecha de Nacimiento">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="l_nac">Lugar de Nacimiento</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="l_nac" class="text-only input cap" type="text" required placeholder="Lugar de Nacimiento">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="ent_fed">Entidad Federal</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="ent_fed" class="text-only input cap" type="text" required placeholder="Entidad Federal">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
      </tbody>
    </table>              
    <input type="hidden" name="cod_dea" value="<?php echo $row['cod_dea'] ?>">
    <input type="hidden" name="action" value="add">
  </form>
</div>
<button type="button" class="button is-white" id="closeA">Cerrar</button>
<button type="submit" form="formAlumnos" class="button is-info">Registrar Datos</button>

<script type="text/javascript">

$('#f_nac').flatpickr({
  locale: 'es',
  altInput: true,
  maxDate: 'today'
});

/* *** MASKS *** */
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