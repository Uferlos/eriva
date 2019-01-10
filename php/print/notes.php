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

$query_semestres = "SELECT * FROM semestres order by id";
$result_semestres = mysqli_query($db, $query_semestres);

if(mysqli_num_rows($result_semestres) > 0): ?>
<span id="banner">
  <img style="float: left;" src="../../img/banner.jpg" height="100" width="500">
  <p id="fn-md">
    <b><u>CERTIFICACIÓN DE CALIFICACIONES</u></b>
  </p>
  <p id="fn-xs">
    <b>Código del formato: EA-DEA-02-03</b><br>
    <span id="fn-sm">
      <b>I. Plan de Estudio:</b>&nbsp;<u><?php echo $rowP['planestudio'] ?></u><br>
      <b>Código del Plan de Estudio:</b>&nbsp;<u><?php echo $rowP['codigo'] ?></u><br>
      <b>Mención:</b>&nbsp;<u><?php echo $rowP['mencion'] ?></u>
    </span>
  </p>
</span>
<hr>
<span id="sBanner">
  <p id="fn-sm">
    <b>II. Datos del Plantel o Zona Educativa que emite la Certificación</b>
  </p>
  <p id="fn-sm">
    <b>Cód. Plantel:&nbsp;</b><u><?php echo $rowD['cod_dea'] ?></u>&nbsp;
    <b>Nombre:&nbsp;</b><u><?php echo $rowD['nombre'] ?></u>&nbsp;
    <b>Distrito Escolar:&nbsp;</b><u><?php echo $rowD['dtto_esc'] ?></u>&nbsp;
    <b>Dirección:&nbsp;</b><u><?php echo $rowD['direccion'] ?></u><br>
    <b>Teléfono:&nbsp;</b><?php if($rowD['telefono'] == ''){echo "______________";}else{echo $rowD['telefono'];} ?>&nbsp;
    <b>Municipio:&nbsp;</b><u><?php echo $rowD['municipio'] ?></u>&nbsp;
    <b>Ent. Federal:&nbsp;</b><u><?php echo $rowD['ent_federal'] ?></u>&nbsp;
    <b>Zona Educativa:&nbsp;</b><u><?php echo $rowD['zona_educativa'] ?></u>
  </p>
  <p id="fn-sm">
    <b>III. Datos de Identificación del Alumno</b>
  </p>
  <p id="fn-sm">
    <b>Cedula de Identidad:&nbsp;</b><u><?php echo $ci_a ?></u>&nbsp;
    <b>Fecha de Nacimiento:&nbsp;</b><u><?php echo $rowE['fnacimiento'] ?></u>&nbsp;
    <b>Apellidos:&nbsp;</b><u><?php echo $rowE['apellidos'] ?></u>&nbsp;
    <b>Nombres:&nbsp;</b><u><?php echo $rowE['nombres'] ?></u><br>
    <b>Lugar de Nacimiento:&nbsp;</b><u><?php echo $rowE['lugar_nacimiento'] ?></u>&nbsp;
    <b>Ent. Federal o País:&nbsp;</b><u><?php echo $rowE['ent_federal_pais'] ?></u>
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
      <td><?php if($nomp1 == ''){echo "***********";}else{echo $nomp1;} ?></td>
      <td><?php if($locp1 == ''){echo "***********";}else{echo $locp1;} ?></td>
      <td><?php if($efp1 == ''){echo "***********";}else{echo $efp1;} ?></td>
    </tr>
    <tr>
      <td>2</td>
      <td><?php if($nomp2 == ''){echo "***********";}else{echo $nomp2;} ?></td>
      <td><?php if($locp2 == ''){echo "***********";}else{echo $locp2;} ?></td>
      <td><?php if($efp2 == ''){echo "***********";}else{echo $efp2;} ?></td>
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
      <td><?php if($nomp3 == ''){echo "***********";}else{echo $nomp3;} ?></td>
      <td><?php if($locp3 == ''){echo "***********";}else{echo $locp3;} ?></td>
      <td><?php if($efp3 == ''){echo "***********";}else{echo $efp3;} ?></td>
    </tr>
    <tr>
      <td>4</td>
      <td><?php if($nomp4 == ''){echo "***********";}else{echo $nomp4;} ?></td>
      <td><?php if($locp4 == ''){echo "***********";}else{echo $locp4;} ?></td>
      <td><?php if($efp4 == ''){echo "***********";}else{echo $efp4;} ?></td>
    </tr>
    <tr>
      <td>5</td>
      <td><?php if($nomp5 == ''){echo "***********";}else{echo $nomp5;} ?></td>
      <td><?php if($locp5 == ''){echo "***********";}else{echo $locp5;} ?></td>
      <td><?php if($efp5 == ''){echo "***********";}else{echo $efp5;} ?></td>
    </tr>
  </table>
</span>
<?php
  while($row_semestres = mysqli_fetch_array($result_semestres)): ?>
  <div style="margin-top: 5px; display: inline-block; width: 47%" class="bs-docs-example" title="<?php echo $row_semestres['semestre']?>"><?php
    $query_asignaturas = "SELECT * FROM asignaturas WHERE id_semestre = '$row_semestres[id]'";
    $result_asignaturas = mysqli_query($db, $query_asignaturas);
    if(mysqli_num_rows($result_asignaturas) > 0): ?>
    <table class="tableN" border="1">
      <tr>
        <td style="font-size: 12px"><b>Asignatura</b></td>
        <td style="font-size: 12px" colspan="2"><b>Calificación</b></td>
        <td style="font-size: 12px"><b>T-E</b></td>
        <td style="font-size: 12px"><b>Mes</b></td>
        <td style="font-size: 12px"><b>Año</b></td>
        <td style="font-size: 12px"><b>Plantel N</b></td>
      </tr><?php
      $x = 0;
      while($row_a = mysqli_fetch_array($result_asignaturas)): ?>
      <tr>
        <td style="font-size: 12px;"><?php echo $row_a['nombre'] ?></td><?php
        $query_c = "SELECT * FROM calificaciones WHERE ci_alumno = '$ci_a' AND id_asignatura = '$row_a[id]'";
        if(!$result_c = $db->query($query_c)){
          echo $db->error;
          exit();
        }
        if(mysqli_num_rows($result_c) == 1):
        $row_c = mysqli_fetch_array($result_c); ?>
        <td style="font-size: 12px;"><?php echo $row_c['notan'] ?></td>
        <td style="font-size: 12px;"><?php echo $row_c['notal'] ?></td>
        <td style="font-size: 12px;"><?php echo $row_c['te'] ?></td>
        <td style="font-size: 12px;"><?php echo $row_c['mes'] ?></td>
        <td style="font-size: 12px;"><?php echo $row_c['anio'] ?></td>
        <td style="font-size: 12px;"><?php echo $row_c['id_plantel'] ?></td><?php
        else: ?>
        <td colspan="6" style="font-size: 12px;">No Se ha Registrado Calificación</td><?php
        endif;?>
      </tr><?php
      $x++;
      endwhile;?>
    </table>
    <?php else: ?>
    <b>No Existen Asignaturas Registradas</b><?php
    endif; ?>
    </div><?php
  endwhile; ?>
  <p id="observ"><b>Observaciones</b>&nbsp;<?php echo $observ ?></p>

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