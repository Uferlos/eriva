<?php
include 'files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$dirdat = "SELECT * FROM personal";
$res_dird = mysqli_query($db, $dirdat);
$rores = mysqli_fetch_assoc($res_dird);

$dirz = "SELECT * FROM plantel";
$rdirz = mysqli_query($db, $dirz);
$rodz = mysqli_fetch_assoc($rdirz);

$ci_a = isset($_POST['ci']) ? $_POST['ci'] : '';

$query_semestres = "SELECT * FROM semestresN order by id";
$result_semestres = mysqli_query($db, $query_semestres);
    
if(mysqli_num_rows($result_semestres) > 0): ?>
<table class="table is-bordered is-small">
    <thead>
      <th>N°</th>
      <th>Nombre del Plantel</th>
      <th>Localidad</th>
      <th>E.F</th>
    </thead>
    <tr>
      <td>1</td>
      <td><input type="text" class="input is-small" id="nomp1"></td>
      <td><input type="text" class="input is-small" id="locp1"></td>
      <td><input type="text" class="input is-small" id="efp1"></td>
    </tr>
    <tr>
      <td>2</td>
      <td><input type="text" class="input is-small" id="nomp2"></td>
      <td><input type="text" class="input is-small" id="locp2"></td>
      <td><input type="text" class="input is-small" id="efp2"></td>
    </tr>
    <tr>
      <td>3</td>
      <td><input type="text" class="input is-small" id="nomp3"></td>
      <td><input type="text" class="input is-small" id="locp3"></td>
      <td><input type="text" class="input is-small" id="efp3"></td>
    </tr>
    <tr>
      <td>4</td>
      <td><input type="text" class="input is-small" id="nomp4"></td>
      <td><input type="text" class="input is-small" id="locp4"></td>
      <td><input type="text" class="input is-small" id="efp4"></td>
    </tr>
    <tr>
      <td>5</td>
      <td><input type="text" class="input is-small" id="nomp5"></td>
      <td><input type="text" class="input is-small" id="locp5"></td>
      <td><input type="text" class="input is-small" id="efp5"></td>
    </tr>
  </table>
  <?php
  while($row_semestres = mysqli_fetch_assoc($result_semestres)):
    $query_asignaturas = "SELECT * FROM asignaturasN WHERE id_semestre = '{$row_semestres['id']}'";
    $result_asignaturas = mysqli_query($db, $query_asignaturas);
    if(mysqli_num_rows($result_asignaturas) > 0): ?>
  <div style="width: 50%; display: inline-block; text-transform: uppercase;" class="bs-docs-example" title="<?php echo $row_semestres['semestre']?>">
    <table class="table is-small is-bordered">
      <tr>
        <td rowspan="2"><b>AREAS DE FORMACION</b></td>
        <td colspan="2" style="text-align: center;"><b>Calificación</b></td>
        <td rowspan="2" style="text-align: center; align-items: center;"><b>T-E</b></td>
        <td colspan="2" style="text-align: center;"><b>Fecha</b></td>
        <td rowspan="2"><b>Plantel</b></td>
      </tr>
      <tr>
        <td>Num</td>
        <td>Letra</td>
        <td>Mes</td>
        <td>Año</td>
      </tr><?php
      $x = 0;
      while($row_a = mysqli_fetch_assoc($result_asignaturas)): ?>
      <tr id="<?php echo $row_a['id'] ?>">
        <td id="fn-md"><?php echo $row_a['nombre'] ?></td><?php
        $query_c = "SELECT * FROM calificacionesN WHERE ci_alumno = '$ci_a' AND id_asignatura = '{$row_a['id']}'";
        if(!$result_c = $db->query($query_c)){
          echo $db->error;
          exit();
        }
        if(mysqli_num_rows($result_c) == 1):
        $row_c = mysqli_fetch_array($result_c); ?>
        <td id="fn-md"><?php echo $row_c['notan'] ?></td>
        <td id="fn-md"><?php echo $row_c['notal'] ?></td>
        <td id="fn-md"><?php echo $row_c['te'] ?></td>
        <td id="fn-md"><?php echo $row_c['mes'] ?></td>
        <td id="fn-md"><?php echo $row_c['anio'] ?></td>
        <td id="fn-md"><?php echo $row_c['id_plantel'] ?></td>
      </tr>
      <?php
      if(($row_c['id'] == 5) || ($row_c['id'] == 10) || ($row_c['id'] == 15) || ($row_c['id'] == 20) || ($row_c['id'] == 25)): ?>
      <script type="text/javascript">
        $(document).ready(function(){
          var id = <?php echo $row_c['id'] ?>;
          if((id == 5) || (id == 10) || (id == 15) || 
            (id == 20) || (id == 25)){
            $('#'+id).remove();
          }
          console.log(id)
        })
      </script>
      <tr>
        <td id="fn-md"><?php echo $row_a['nombre'] ?></td>
        <td id="fn-md" colspan="2"><?php echo $row_c['apro'] ?></td>
        <td id="fn-md"><?php echo $row_c['te'] ?></td>
        <td id="fn-md"><?php echo $row_c['mes'] ?></td>
        <td id="fn-md"><?php echo $row_c['anio'] ?></td>
        <td id="fn-md"><?php echo $row_c['id_plantel'] ?></td>
      </tr><?php
      endif;
      else : ?>
        <td colspan="6">No Se ha Registrado Calificación</td><?php
      endif;
      $x++;
      endwhile;
      if(($row_semestres['id'] == 5)): ?>
      <table class="is-small is-bordered">
        <tr>
          <th colspan="6" style="text-align: center;">Componente de idioma</th>
        </tr>
        <tr>
          <th rowspan="2" style="text-align: center;">Idiomas</th>
          <th rowspan="2" style="text-align: center;">Aprovado</th>
          <td colspan="2" style="text-align: center;">Fecha</td>
          <td rowspan="2" style="text-align: center;">Periodo</td>
        </tr>
        <tr>
          <td>Mes</td>
          <td>Año</td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idi1">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="apr1">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mes1">
                  <option value="">----</option>
                <?php for($z=1; $z<=12; $z++):
                  echo '<option value="'.$z.'">'.$z.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="an1">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peri1">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idi2">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="apr2">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mes2">
                  <option value="">----</option>
                <?php for($p=1; $p<=12; $p++):
                  echo '<option value="'.$p.'">'.$p.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="an2">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peri2">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idi3">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="apr3">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mes3">
                  <option value="">----</option>
                <?php for($ii=1; $ii<=12; $ii++):
                  echo '<option value="'.$ii.'">'.$ii.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="an3">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peri3">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idi4">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="apr4">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mes4">
                  <option value="">----</option>
                <?php for($n=1; $n<=12; $n++):
                  echo '<option value="'.$n.'">'.$n.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="an4">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peri4">
          </td>
        </tr>
      </table>
      <?php endif; ?>
    </table>
    <?php if($row_semestres['id'] == 6): ?>
      <table class="is-small is-bordered">
        <tr>
          <th colspan="6" style="text-align: center;">Componente de Formación Laboral</th>
        </tr>
        <tr>
          <th rowspan="2" style="text-align: center;">Oficio</th>
          <th rowspan="2" style="text-align: center;">Aprovado</th>
          <td colspan="2" style="text-align: center;">Fecha</td>
          <td rowspan="2" style="text-align: center;">Periodo</td>
        </tr>
        <tr>
          <td>Mes</td>
          <td>Año</td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idil1">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="aprl1">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mesl1">
                  <option value="">----</option>
                <?php for($z=1; $z<=12; $z++):
                  echo '<option value="'.$z.'">'.$z.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="anl1">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peril1">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idil2">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="aprl2">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mesl2">
                  <option value="">----</option>
                <?php for($p=1; $p<=12; $p++):
                  echo '<option value="'.$p.'">'.$p.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="anl2">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peril2">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idil3">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="aprl3">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mesl3">
                  <option value="">----</option>
                <?php for($ii=1; $ii<=12; $ii++):
                  echo '<option value="'.$ii.'">'.$ii.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="anl3">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peril3">
          </td>
        </tr>
        <tr>
          <td>
            <input type="text" class="input is-small" id="idil4">
          </td>
          <td>
            <p class="control" style="text-align: center;">
              <span class="select is-small">
                <select id="aprl4">
                  <option value="">-------</option>
                  <option value="si">Si</option>
                  <option value="no">No</option>
                </select>
              </span>
            </p>
          </td>
          <td>
            <p class="control">
              <span class="select is-small">
                <select id="mesl4">
                  <option value="">----</option>
                <?php for($n=1; $n<=12; $n++):
                  echo '<option value="'.$n.'">'.$n.'</option>';
                endfor; ?>
                </select>
              </span>
            </p>
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="anl4">
          </td>
          <td>
            <input type="text" class="input num-only is-small" id="peril4">
          </td>
        </tr>
      </table>
      <?php endif; ?>
    <?php else: ?>
    <b>No Existen Asignaturas Registradas</b><?php
    endif; ?>
    </div><?php
  endwhile; ?>
  <p class="has-text-centered"><b>Observaciones</b><br>
    <textarea style="width: 1100px; height: 50px; margin-bottom: 5px;" id='obser' name='observaciones'></textarea>
  </p>

  <table align="left" border="1" style="width: 47%">
    <tbody>
      <tr>
        <td width="22%" align="center" colspan="2"><b>Plantel</b></td>
      </tr>
      <tr>
        <td width="22%" class="has-text-centered" colspan="2">Director (a)</td>
      </tr>
      <tr>
        <td width="22%" align="left" colspan="2">Apellidos y Nombres</td>
        <tr>
          <td width="22%" align="center" colspan="2"><?php echo $rores['director'] ?></td>
        </tr>
          <td width="22%" align="left">Número de C.I</td>
          
          <td rowspan="4" width="22%">Sello del Plantel</td>
          <tr>
            <td width="22%" align="center"><?php echo $rores['ci_d'] ?></td>
          </tr>
          <tr>
            <td width="22%">firma<br>&nbsp;</td>
          </tr>
          <tr>
            <td width="22%">
              <p align="center" style="font-size: 10px;">
                Para efectos de su validez a nivel estadal<br>&nbsp;
              </p>
            </td>
          </tr>
        </tr>
      </tbody>
    </table>

    <table style="margin-left: 3px; width: 47%" align="right" border="1">
      <tbody>
        <tr>
          <td width="22%" align="center" colspan="2"><b>Zona Educativa</b></td>
        </tr>
        <tr>
          <td width="22%" class="has-text-centered" colspan="2">Director (a)</td>
        </tr>
        <tr>
          <td width="22%" align="left" colspan="2">Apellidos y Nombres</td>
          <tr>
            <td width="22%" align="center" colspan="2"><?php echo $rodz['dir_zona'] ?></td>
          </tr>
          <td width="22%" align="left">Número de C.I</td>

          <td rowspan="4" width="22%">Sello del Plantel</td>
            <tr>
              <td width="22%" align="center"><?php echo $rodz['ci_dz'] ?></td>
            </tr>
          <tr>
            <td width="22%">firma<br>&nbsp;</td>
          </tr>
          <tr>
            <td width="22%">
              <p align="center" style="font-size: 8px;">
                Para efectos de su validez a nivel nacional e internacional y cuando se trate de estudios libres y equivalentes sin escolaridad
              </p>
            </td>
          </tr>
        </tr>
      </tbody>
    </table>
        
    <script type="text/javascript">
      var fecha = new Date();
      var dia = fecha.getDate();
      var mes = fecha.getMonth() + 1;
      var ano = fecha.getFullYear();

      if (mes === 1) {mes = 'ENERO'}
      else if(mes === 2){mes = 'FEBRERO'}
      else if(mes === 3){mes = 'MARZO'}
      else if(mes === 4){mes = 'ABRIL'}
      else if(mes === 5){mes = 'MAYO'}
      else if(mes === 6){mes = 'JUNIO'}
      else if(mes === 7){mes = 'JULIO'}
      else if(mes === 8){mes = 'AGOSTO'}
      else if(mes === 9){mes = 'SEPTIEMBRE'}
      else if(mes === 10){mes = 'OCTUBRE'}
      else if(mes === 11){mes = 'NOVIEMBRE'}
      else if(mes === 12){mes = 'DICIEMBRE'}

      $('#time').append(dia+' DE '+mes+' DE '+ano);
    </script>

    <table border="0" width="100%">
      <tr>
        <td align="center">
          <p style="padding-top: 5px;" id="time">
            <b>Lugar y Fecha de Expedición: SANTA CRUZ DE MORA el,&nbsp;</b>
          </p>
        </td>
      </tr>
      <tr>
        <td align="center">
          <p style="font-size: 9px;">
            <b>Timbre Fiscal:&nbsp;</b>Este Documento no tiene validez si no se le colocan en la parte posterior timbres fiscales por Bs. 30% de la unidad U.T
          </p>
        </td>
      </tr>
    </table>
<?php else: ?>
  <div class="bs-docs-example" title="Semestres">No Existen Semestres Registrados</div><?php
endif;
?>