<?php
include 'files/config.php';

$db = new mysqli (host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$query = "SELECT * FROM plantel";

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
  <form id="formPlantel" autocomplete="off">
    <table class="table is-narrow">
      <tbody>
        <tr>
          <td><label for="nom">Nombre del Plantel</label></td>
          <td colspan="3">
            <p class="control has-icon has-icon-right">
              <input name="nom" id="nom" type="text" class="text-only input" required placeholder="Nombre del Plantel" value='<?php echo $row['nombre'] ?>'>
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td width="15%"><label for="cod_dea">Codido DEA</label></td>
          <td width="35%">
            <p class="control has-icon has-icon-right">
              <input name="cod_dea" type="text" class="input" required placeholder="Codigo DEA" value="<?php echo $row['cod_dea'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>

          <td width="15%"><label for="dist">Distrito Escolar</label></td>
          <td width="35%">
            <p class="control has-icon has-icon-right">
              <input name="dist" id="dist" type="text" class="input" required placeholder="Distrito Escolar" value="<?php echo $row['dtto_esc'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>            
      
        <tr>
          <td><label for="direc">Dirección</label></td>
          <td colspan="3">
            <p class="control has-icon has-icon-right">
              <input name="direc" type="text" class="text-only input" required placeholder="Dirección" value="<?php echo $row['direccion'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>

        <tr>
          <td><label for="tel">Telefono</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="tel" id="tel" type="text" class="input" required placeholder="Telefono" value="<?php echo $row['telefono'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
          <td><label for="muni">Municipio</label></td>
          <td>
            <p class="control has-icon has-icon-right">
              <input name="muni" type="text" class="text-only input" required placeholder="Municipio" value="<?php echo $row['municipio'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
        
        <tr>
          <td><label for="ent_fed">Entidad Federal</label></td>
          <td><p class="control has-icon has-icon-right">

              <input name="ent_fed" type="text" class="text-only input" required placeholder="Entidad Federal" value="<?php echo $row['ent_federal'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
          <td><label for="zona">Zona Educativa</label></td>
          <td><p class="control has-icon has-icon-right">

              <input name="zona" type="text" class="text-only input" required placeholder="Zona Educativa" value="<?php echo $row['zona_educativa'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>

        <tr>
          <td><label for="dir_zona">Director Zona Educativa</label></td>
          <td><p class="control has-icon has-icon-right">

              <input name="dir_zona" type="text" class="text-only input" required placeholder="Director Zona Educativa" value="<?php echo $row['dir_zona'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
          <td><label for="ci_dz">C.I Director Zona Educativa</label></td>
          <td><p class="control has-icon has-icon-right">

              <input id="ci" name="ci_dz" type="text" class="input" required placeholder="C.I Director Zona Educativa" value="<?php echo $row['ci_dz'] ?>">
              <span class="icon is-small">
                <i class="material-icons"></i>
              </span>
            </p>
          </td>
        </tr>
      </tbody>
      <input type="hidden" name="match" value="<?php echo $row['cod_dea'] ?>">
      <input type="hidden" name="action" value="updp">
    </table>
  </form>
</div>

<button type="button" class="button" id="closeP">Cerrar</button>
<button type="submit" form="formPlantel" class="button is-info">Actualizar Datos</button>
<script type="text/javascript">
  /* *** MASKS *** */
$('#tel').mask('(0000)-000-0000', {clearIfNotMatch: true});
$('#dist').mask('000');
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
</body>
</html>