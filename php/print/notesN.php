<?php
include '../files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$dirdat = "SELECT * FROM personal";
$res_dird = mysqli_query($db, $dirdat);
$rores = mysqli_fetch_assoc($res_dird);

$queryPlan = "SELECT * FROM plan_estudio";
$resP = $db->query($queryPlan);
$rowP = $resP->fetch_assoc();

$queryDat = "SELECT * FROM plantel";
$resD = $db->query($queryDat);
$rowD = $resD->fetch_assoc();

$queryEst = "SELECT * FROM alumnos";
$resE = $db->query($queryEst);
$rowE = $resE->fetch_assoc();

$ci_a = isset($_POST['ci']) ? $_POST['ci'] : '';
$observ = isset($_POST['obse']) ? $_POST['obse'] : '';

$nomp1 = isset($_POST['nomp1']) ? $_POST['nomp1'] : '';
$locp1 = isset($_POST['locp1']) ? $_POST['locp1'] : '';
$efp1 = isset($_POST['efp1']) ? $_POST['efp1'] : '';

$nomp2 = isset($_POST['nomp2']) ? $_POST['nomp2'] : '';
$locp2 = isset($_POST['locp2']) ? $_POST['locp2'] : '';
$efp2 = isset($_POST['efp2']) ? $_POST['efp2'] : '';

$nomp3 = isset($_POST['nomp3']) ? $_POST['nomp3'] : '';
$locp3 = isset($_POST['locp3']) ? $_POST['locp3'] : '';
$efp3 = isset($_POST['efp3']) ? $_POST['efp3'] : '';

$nomp4 = isset($_POST['nomp4']) ? $_POST['nomp4'] : '';
$locp4 = isset($_POST['locp4']) ? $_POST['locp4'] : '';
$efp4 = isset($_POST['efp4']) ? $_POST['efp4'] : '';

$nomp5 = isset($_POST['nomp5']) ? $_POST['nomp5'] : '';
$locp5 = isset($_POST['locp5']) ? $_POST['locp5'] : '';
$efp5 = isset($_POST['efp5']) ? $_POST['efp5'] : '';

$id1 = isset($_POST['id1']) ? $_POST['id1'] : '';
$apr1 = isset($_POST['apr1']) ? $_POST['apr1'] : '';
$mes1 = isset($_POST['mes1']) ? $_POST['mes1'] : '';
$an1 = isset($_POST['an1']) ? $_POST['an1'] : '';
$per1 = isset($_POST['per1']) ? $_POST['per1'] : '';

$id2 = isset($_POST['id2']) ? $_POST['id2'] : '';
$apr2 = isset($_POST['apr2']) ? $_POST['apr2'] : '';
$mes2 = isset($_POST['mes2']) ? $_POST['mes2'] : '';
$an2 = isset($_POST['an2']) ? $_POST['an2'] : '';
$per2 = isset($_POST['per2']) ? $_POST['per2'] : '';

$id3 = isset($_POST['id3']) ? $_POST['id3'] : '';
$apr3 = isset($_POST['apr3']) ? $_POST['apr3'] : '';
$mes3 = isset($_POST['mes3']) ? $_POST['mes3'] : '';
$an3 = isset($_POST['an3']) ? $_POST['an3'] : '';
$per3 = isset($_POST['per3']) ? $_POST['per3'] : '';

$id4 = isset($_POST['id4']) ? $_POST['id4'] : '';
$apr4 = isset($_POST['apr4']) ? $_POST['apr4'] : '';
$mes4 = isset($_POST['mes4']) ? $_POST['mes4'] : '';
$an4 = isset($_POST['an4']) ? $_POST['an4'] : '';
$per4 = isset($_POST['per4']) ? $_POST['per4'] : '';

$idl1 = isset($_POST['idl1']) ? $_POST['idl1'] : '';
$aprl1 = isset($_POST['aprl1']) ? $_POST['aprl1'] : '';
$mesl1 = isset($_POST['mesl1']) ? $_POST['mesl1'] : '';
$anl1 = isset($_POST['anl1']) ? $_POST['anl1'] : '';
$perl1 = isset($_POST['perl1']) ? $_POST['perl1'] : '';

$idl2 = isset($_POST['idl2']) ? $_POST['idl2'] : '';
$aprl2 = isset($_POST['aprl2']) ? $_POST['aprl2'] : '';
$mesl2 = isset($_POST['mesl2']) ? $_POST['mesl2'] : '';
$anl2 = isset($_POST['anl2']) ? $_POST['anl2'] : '';
$perl2 = isset($_POST['perl2']) ? $_POST['perl2'] : '';

$idl3 = isset($_POST['idl3']) ? $_POST['idl3'] : '';
$aprl3 = isset($_POST['aprl3']) ? $_POST['aprl3'] : '';
$mesl3 = isset($_POST['mesl3']) ? $_POST['mesl3'] : '';
$anl3 = isset($_POST['anl3']) ? $_POST['anl3'] : '';
$perl3 = isset($_POST['perl3']) ? $_POST['perl3'] : '';

$idl4 = isset($_POST['idl4']) ? $_POST['idl4'] : '';
$aprl4 = isset($_POST['aprl4']) ? $_POST['aprl4'] : '';
$mesl4 = isset($_POST['mesl4']) ? $_POST['mesl4'] : '';
$anl4 = isset($_POST['anl4']) ? $_POST['anl4'] : '';
$perl4 = isset($_POST['perl4']) ? $_POST['perl4'] : '';

$query_semestres = "SELECT * FROM semestresN order by id";
$result_semestres = mysqli_query($db, $query_semestres);

if(mysqli_num_rows($result_semestres) > 0): ?>
<span id="banner">
  <img style="float: left;" src="../../img/banner.jpg" height="100" width="500">
  <p id="fn-md">
    <b><u>CERTIFICACIÓN DE CALIFICACIONES</u></b>
  </p>
  <p id="fn-xs">
    <b>Código del Formato: EMGMJAA</b><br>
    <span id="fn-sm">
      <b>I.Código del Plan de Estudio:</b>&nbsp;<u><?php echo $rowP['codigoG'] ?></u><br>
      <b id="time">Lugar y Fecha de Expedición: SANTA CRUZ DE MORA el&nbsp;</b>
    </span>
  </p>
</span>
<hr>
<span id="sBanner">
  <p id="fn-sm">
    <b>II. Datos del Plantel o Zona Educativa que emite la Certificación</b>
  </p>
  <p id="fn-sm">
    <b>Código:&nbsp;</b><u><?php echo $rowD['cod_dea'] ?></u>&nbsp;
    <b>Nombre:&nbsp;</b><u><?php echo $rowD['nombre'] ?></u>&nbsp;<br>
    <b>Dirección:&nbsp;</b><u><?php echo $rowD['direccion'] ?></u>
    <b>Teléfono:&nbsp;</b><?php if($rowD['telefono'] == ''){echo "______________";}else{echo "<u>".$rowD['telefono']."</u>";} ?>&nbsp;<br>
    <b>Municipio:&nbsp;</b><u><?php echo $rowD['municipio'] ?></u>&nbsp;
    <b>Entidad Federal:&nbsp;</b><u><?php echo $rowD['ent_federal'] ?></u>&nbsp;
    <b>Zona Educativa:&nbsp;</b><u><?php echo $rowD['zona_educativa'] ?></u>
  </p>
  <p id="fn-sm">
    <b>III. Datos de Identificación del Estudiante</b>
  </p>
  <p id="fn-sm">
    <b>Cedula de Identidad:&nbsp;</b><u><?php echo $ci_a ?></u>&nbsp;
    <b>Fecha de Nacimiento:&nbsp;</b><u><?php echo $rowE['fnacimiento'] ?></u>&nbsp;<br>
    <b>Apellidos:&nbsp;</b><u><?php echo $rowE['apellidos'] ?></u>&nbsp;
    <b>Nombres:&nbsp;</b><u><?php echo $rowE['nombres'] ?></u><br>
    <b>Lugar de Nacimiento:&nbsp;</b><u><?php echo $rowE['lugar_nacimiento'] ?></u>&nbsp;
    <b>Entidad Federal o País:&nbsp;</b><u><?php echo $rowE['ent_federal_pais'] ?></u>
  </p>
  <table width="50%" align="left" border="1" class="tableC">
    <thead>
      <th colspan="4" style="background-image: none; border: transparent;">
        <p id="fn-sm">
          <b>IV. Planteles donde cursó estudios</b>
        </p>
      </th>
    </thead>
    <thead>
      <th>N°</th>
      <th>Nombre del Plantel</th>
      <th>Localidad</th>
      <th>E.F</th>
    </thead>
    <tr>
      <td>1</td>
      <td><?php if($nomp1 == ''){echo "***********";}else{echo "<u>".$nomp1."</u>";} ?></td>
      <td><?php if($locp1 == ''){echo "***********";}else{echo "<u>".$locp1."</u>";} ?></td>
      <td><?php if($efp1 == ''){echo "***********";}else{echo "<u>".$efp1."</u>";} ?></td>
    </tr>
    <tr>
      <td>2</td>
      <td><?php if($nomp2 == ''){echo "***********";}else{echo "<u>".$nomp2."</u>";} ?></td>
      <td><?php if($locp2 == ''){echo "***********";}else{echo "<u>".$locp2."</u>";} ?></td>
      <td><?php if($efp2 == ''){echo "***********";}else{echo "<u>".$efp2."</u>";} ?></td>
    </tr>
  </table>

  <table width="50%" border="1" cellpadding="0" class="tableC">
    <thead>
      <th>N°</th>
      <th>Nombre del Plantel</th>
      <th>Localidad</th>
      <th>E.F</th>
    </thead>
    <tr>
      <td>3</td>
      <td><?php if($nomp3 == ''){echo "***********";}else{echo "<u>".$nomp3."</u>";} ?></td>
      <td><?php if($locp3 == ''){echo "***********";}else{echo "<u>".$locp3."</u>";} ?></td>
      <td><?php if($efp3 == ''){echo "***********";}else{echo "<u>".$efp3."</u>";} ?></td>
    </tr>
    <tr>
      <td>4</td>
      <td><?php if($nomp4 == ''){echo "***********";}else{echo "<u>".$nomp4."</u>";} ?></td>
      <td><?php if($locp4 == ''){echo "***********";}else{echo "<u>".$locp4."</u>";} ?></td>
      <td><?php if($efp4 == ''){echo "***********";}else{echo "<u>".$efp4."</u>";} ?></td>
    </tr>
    <tr>
      <td>5</td>
      <td><?php if($nomp5 == ''){echo "***********";}else{echo "<u>".$nomp5."</u>";} ?></td>
      <td><?php if($locp5 == ''){echo "***********";}else{echo "<u>".$locp5."</u>";} ?></td>
      <td><?php if($efp5 == ''){echo "***********";}else{echo "<u>".$efp5."</u>";} ?></td>
    </tr>
  </table>
</span><br>
  <p id="fn-sm">
    <b>V. Pensum de Estudio</b>
  </p>
<?php
  while($row_semestres = mysqli_fetch_array($result_semestres)): ?>
  <div style="margin-top: auto; display: inline-block; width: 47%;" class="bs-docs-example" title="<?php echo "Periodo: ". $row_semestres['semestre']?>"><?php
    $query_asignaturas = "SELECT * FROM asignaturasN WHERE id_semestre = '$row_semestres[id]'";
    $result_asignaturas = mysqli_query($db, $query_asignaturas);
    if(mysqli_num_rows($result_asignaturas) > 0): ?>
    <table class="tableN" border="1">
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
      <table border="1" class="is-small is-bordered">
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
          <td class="has-text-centered">
            <?php if($id1 == ''){echo "****";}else{echo "<u>".$id1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($apr1 == ''){echo "****";}else{echo "<u>".$apr1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mes1 == ''){echo "****";}else{echo "<u>".$mes1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($an1 == ''){echo "****";}else{echo "<u>".$an1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($per1 == ''){echo "****";}else{echo "<u>".$per1."</u>";} ?>
          </td>
        </tr>
        <tr>
          <td class="has-text-centered">
            <?php if($id1 == ''){echo "****";}else{echo "<u>".$id2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($apr1 == ''){echo "****";}else{echo "<u>".$apr2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mes1 == ''){echo "****";}else{echo "<u>".$mes2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($an1 == ''){echo "****";}else{echo "<u>".$an2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($per1 == ''){echo "****";}else{echo "<u>".$per2."</u>";} ?>
          </td>
        </tr>
        <tr>
          <td class="has-text-centered">
            <?php if($id1 == ''){echo "****";}else{echo "<u>".$id3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($apr1 == ''){echo "****";}else{echo "<u>".$apr3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mes1 == ''){echo "****";}else{echo "<u>".$mes3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($an1 == ''){echo "****";}else{echo "<u>".$an3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($per1 == ''){echo "****";}else{echo "<u>".$per3."</u>";} ?>
          </td>
        </tr>
        <tr>
          <td class="has-text-centered">
            <?php if($id1 == ''){echo "****";}else{echo "<u>".$id4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($apr1 == ''){echo "****";}else{echo "<u>".$apr4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mes1 == ''){echo "****";}else{echo "<u>".$mes4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($an1 == ''){echo "****";}else{echo "<u>".$an4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($per1 == ''){echo "****";}else{echo "<u>".$per4."</u>";} ?>
          </td>
        </tr>
      </table>
      <?php endif; ?>
    </table>
    <?php if($row_semestres['id'] == 6): ?>
      <table border="1" class="is-small is-bordered">
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
          <td class="has-text-centered">
            <?php if($idl1 == ''){echo "****";}else{echo "<u>".$idl1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($aprl1 == ''){echo "****";}else{echo "<u>".$aprl1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mesl1 == ''){echo "****";}else{echo "<u>".$mesl1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($anl1 == ''){echo "****";}else{echo "<u>".$anl1."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($perl1 == ''){echo "****";}else{echo "<u>".$perl1."</u>";} ?>
          </td>
        </tr>
        <tr>
          <td class="has-text-centered">
            <?php if($idl1 == ''){echo "****";}else{echo "<u>".$idl2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($aprl1 == ''){echo "****";}else{echo "<u>".$aprl2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mesl1 == ''){echo "****";}else{echo "<u>".$mesl2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($anl1 == ''){echo "****";}else{echo "<u>".$anl2."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($perl1 == ''){echo "****";}else{echo "<u>".$perl2."</u>";} ?>
          </td>
        </tr>
        <tr>
          <td class="has-text-centered">
            <?php if($idl1 == ''){echo "****";}else{echo "<u>".$idl3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($aprl1 == ''){echo "****";}else{echo "<u>".$aprl3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mesl1 == ''){echo "****";}else{echo "<u>".$mesl3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($anl1 == ''){echo "****";}else{echo "<u>".$anl3."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($perl1 == ''){echo "****";}else{echo "<u>".$perl3."</u>";} ?>
          </td>
        </tr>
        <tr>
          <td class="has-text-centered">
            <?php if($idl1 == ''){echo "****";}else{echo "<u>".$idl4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($aprl1 == ''){echo "****";}else{echo "<u>".$aprl4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($mesl1 == ''){echo "****";}else{echo "<u>".$mesl4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($anl1 == ''){echo "****";}else{echo "<u>".$anl4."</u>";} ?>
          </td>
          <td class="has-text-centered">
            <?php if($perl1 == ''){echo "****";}else{echo "<u>".$perl4."</u>";} ?>
          </td>
        </tr>
      </table>
      <?php endif; ?>
    </table>
    <?php else: ?>
    <b>No Existen Asignaturas Registradas</b><?php
    endif; ?>
    </div><?php
  endwhile; ?>
  <br>
  <p id="observ"><b>VI. Observaciones</b>&nbsp;<?php echo $observ ?></p>


  <table border="1" align="left" style="width: 65%;">
    <tbody>
      <tr>
        <td><b>VII. Escala de Calificación</b></td>
      </tr>
      <tr>
        <td>Uno (1): logros muy escasos. El estudiante deberá cursar el área correspondiente.</td>
      </tr>
      <tr>
        <td>Dos (2): logros insuficientes. Deben realizarse actividades complementarias para alcanzar el mínimo aprobatorio.</td>
      </tr>
      <tr>
        <td>Tres (3): logros suficientes. Calificación mínima probatoria.</td>
      <tr>
        <td>Cuatro (4): logros mayores que los establecidos en la mayoría de los criterios del programa del área.</td>
      </tr>
        <td>Cinco (5): logros  altos. Muy superiores a los establecidos en todos los criterios del programa del área.</td>
      </tr>
    </tbody>
  </table>

  <table border="1" align="right" style="width: 35%;">
    <tbody>
      <tr>
        <td><b>VIII. Escala de Conversión 1 al 20</b></td>
      <tr>
        <td>Uno (1) equivale a Cuatro (4)</td>
      </tr>
      <tr>
        <td>Dos (2)  equivale a Ocho (8)</td>
      </tr>
      <tr>
        <td>Tres (3)  equivale a Doce (12)</td>
      </tr>
      <tr>
        <td>Cuatro (4)  equivale a Dieciseis (16)</td>
      </tr>
      <tr>
        <td>Cinco (5)  equivale a Veinte (20)</td>
      </tr>
    </tbody>
  </table>


  <table align="left" border="1" style="width: 47%">
    <tbody>
      <tr>
        <td width="22%" align="center" colspan="2"><b>IX. Plantel</b></td>
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
          <td width="22%" align="center" colspan="2"><b>X. Zona Educativa</b></td>
        </tr>
        <tr>
          <td width="22%" class="has-text-centered" colspan="2">Director (a)</td>
        </tr>
        <tr>
          <td width="22%" align="left" colspan="2">Apellidos y Nombres</td>
          <tr>
            <td width="22%" align="center" colspan="2"><?php echo $rowD['dir_zona'] ?></td>
          </tr>
          <td width="22%" align="left">Número de C.I</td>

          <td rowspan="4" width="22%">Sello del Plantel</td>
            <tr>
              <td width="22%" align="center"><?php echo $rowD['ci_dz'] ?></td>
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

    <table border="0" width="100%">
      <tr>
        <td align="center">
          <p style="font-size: 9px;">
            <b>Timbre Fiscal: Este Documento no tiene validez si no se le colocan en la parte posterior timbres fiscales por Bs. 30% de la unidad U.T</b>
          </p>
        </td>
      </tr>
    </table>
<?php else: ?>
  <div class="bs-docs-example" title="Semestres">No Existen Semestres Registrados</div><?php
endif;
?>
<link rel="stylesheet" type="text/css" href="../../css/bulma.css">
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script type="text/javascript" src="../../js/jquery.min.js"></script>
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

<script type="text/javascript">
  window.print()
  window.close()
</script>