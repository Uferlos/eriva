<?php
include 'files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$id_s = isset($_POST['id_s']) ? $_POST['id_s'] : '';
$ci = isset($_POST['ci']) ? $_POST['ci'] : '';

$nl = array(
  'uno', 'dos', 'tres', 'cuatro', 'cinco',
  'seis', 'siete', 'ocho', 'nueve', 'diez',
  'once', 'doce', 'trece', 'catorce', 'quince',
  'diesciseis', 'diescisiete', 'diesciocho', 'diescinueve',
  'veinte'
);

$query = "SELECT * FROM asignaturasG WHERE id_semestre = '$id_s'";

if(!$result_a = $db->query($query)){
  echo $db->error;
  exit();
}
      
if($result_a->num_rows): ?>
  <table class="table is-striped is-bordered">
    <tr>
      <td><strong>Asignatura</strong></td>
      <td colspan="2" align="center"><strong>Calificación</strong></td>
      <td><strong>T-E</strong></td>
      <td><strong>Mes</strong></td>
      <td><strong>Año</strong></td>
      <td><strong>Plantel N</strong></td>
  </tr><?php
  $x = 0;
  while($row = $result_a->fetch_assoc()):
    $query_c = "SELECT * FROM calificacionesG WHERE ci_alumno = '$ci' and id_asignatura = '$row[id]'";
    if(!$result_c = $db->query($query_c)){
      echo $db->error;
      exit();
    }
    $row_c = $result_c->fetch_array();

    if($result_c->num_rows == 0): ?>
      <tr>
        <td>
          <input type="hidden" name="id_asignatura[<?php echo $x ?>]" value="<?php echo $row['id']?>">
          <?php echo $row['nombre'] ?>
        </td>
        <td>
          <p class="control">
            <span class="select is-small">
              <select name="notan[<?php echo $x ?>]" style="margin-bottom:0px; width:60px;">
                <option value="Pendiente">Pendiente</option><?php
              for($i=1; $i<=20; $i++) : ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php endfor; ?>
              </select>
            </span>
          </p>
        </td>

        <td>
          <p class="control">
            <span class="select is-small">
              <select name="notal[<?php echo $x ?>]" style="margin-bottom:0px; width:70px;">
                <option value="Pendiente">Pendiente</option><?php
              for($j=0; $j<=19; $j++):
                if($j == $row_c['notal']): ?>
                  <option value="<?php echo $nl[$j] ?>"><?php echo $nl[$j] ?></option>
                <?php else: ?>
                  <option <?php echo $nl[$j] ?>><?php echo $nl[$j] ?></option><?php
                endif;
              endfor; ?>
              </select>
            </span>
          </p>
        </td>
        <td>
          <p class="control">
            <span class="select is-small">
              <select id="te[<?php echo $x ?>]" name="te[<?php echo $x ?>]" style="margin-bottom:0px;width:60px;">
                <option value="F">F</option>
                <option value="R">R</option>
                <option value="X">X</option>
                <option value="P">P</option>
              </select>
            </span>
          </p>
        </td>
          
        <td>
          <p class="control">
            <span class="select is-small">
              <select name="mes[<?php echo $x ?>]" style="margin-bottom:0px; width:60px;"><?php
              for($i=1; $i<=12; $i++):
                echo '<option value="'.$i.'">'.$i.'</option>';
              endfor; ?>
              </select>
            </span>
          </p>
        </td>
            
        <td>
          <input type="text" id="anio" class="num-only input is-small" name="anio[<?php echo $x ?>]" style="width:60px; margin-bottom:0px;" required>
        </td>

        <td>
          <input type="text" id="id_plantel" class="num-only input is-small" name="id_plantel[<?php echo $x ?>]" style="width:60px; margin-bottom:0px;" value="<?php echo $row_c['id_plantel'] ?>" required>
        </td>
      <tr>
    <?php else : ?>
      <tr>
        <td>
          <input type="hidden" name="id_asignatura[<?php echo $x ?>]" value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?>
        </td>
            
        <td>
          <p class="control">
            <span class="select is-small">
              <select name="notan[<?php echo $x ?>]" style="margin-bottom:0px; width:60px;">
                <?php if($row_c['notan'] == 'Pendiente'){ ?>
                  <option selected value="Pendiente">Pendiente</option><?php
                } ?>
                <option value="Pendiente">Pendiente</option><?php
                for($i=1; $i<=20; $i++):
                if($i == $row_c['notan']): ?>
                <option selected value="<?php echo $i ?>"><?php echo $i ?></option><?php
                else: ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option><?php
                endif;
                endfor; ?>
              </select>
            </span>
          </p>
        </td>
            
        <td>
          <p class="control">
              <span class="select is-small">
                <select name="notal[<?php echo $x ?>]" style="margin-bottom:0px; width:70px;">
                <?php if($row_c['notal'] == 'Pendiente'){ ?>
                  <option selected value="Pendiente">Pendiente</option><?php
                } ?>
                <option value="Pendiente">Pendiente</option><?php
                for($j=0; $j<=19; $j++):
                  if($nl[$j] == $row_c['notal']):
                    echo '<option selected value="'.$nl[$j].'">'.$nl[$j].'</option>';
                  else:
                    echo '<option value="'.$nl[$j].'">'.$nl[$j].'</option>';
                  endif;
                endfor; ?>
              </select>
            </span>
          </p>
        </td>
            
        <td>
          <p class="control">
            <span class="select is-small">
              <select id="te[<?php echo $x ?>]" name="te[<?php echo $x ?>]" style="margin-bottom:0px; width:60px;">
                <option value="F">F</option>
                <option value="R">R</option>
                <option value="X">X</option>
                <option value="P">P</option>
              </select> 
              <script type="text/javascript">
                document.getElementById("te[<?php echo $x ?>]").value = "<?php echo $row_c['te'] ?>"
              </script>
            </span>
          </p>
        </td>
            
        <td>
          <p class="control">
              <span class="select is-small">
              <select name="mes[<?php echo $x ?>]" style="margin-bottom:0px; width:60px;"><?php
                for($i=1; $i<=12; $i++):
                  if($i == $row_c['mes']):
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  else:
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  endif;
                endfor; ?>
              </select>
            </span>
          </p>
        </td>
              
        <td>
          <input type="text" id="anio" class="num-only input is-small" name="anio[<?php echo $x ?>]" style="width:60px; margin-bottom:0px;" value="<?php echo $row_c['anio'] ?>" required>
        </td>

        <td>
          <input type="text" id="id_plantel" class="num-only input is-small" name="id_plantel[<?php echo $x ?>]" style="width:60px; margin-bottom:0px;" value="<?php echo $row_c['id_plantel'] ?>" required>
        </td>
      </tr><?php
    endif;
    $x++;
  endwhile;
  echo '</table>';
else: ?>
  <div class="notification is-danger">
    <p class="is-medium"><strong>No Existen Asignaturas Registradas</strong></p>
  </div><?php
endif;

?>
<script type="text/javascript">
  $('.num-only').keydown(function(v){
    if ($.inArray(v.keyCode, [46, 8, 9, 27, 13, 110, 190]) != -1 ||
        (v.keyCode >= 35 && v.keyCode <= 39)) {
      return;
    }
    if ((v.shifKey || (v.keyCode < 48 || v.keyCode > 57)) && (v.keyCode < 96 || v.keyCode > 105)){
      v.preventDefault();
    }
  });
  $('.num-only').attr('maxlength', '4')
</script>