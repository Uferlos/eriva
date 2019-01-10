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

$ci_a = isset($_POST['ci']) ? $_POST['ci'] : '';

$query_semestres = "SELECT * FROM semestres order by id";
$result_semestres = mysqli_query($db, $query_semestres);
    
if(mysqli_num_rows($result_semestres) > 0):?>
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
	while($row_semestres = mysqli_fetch_assoc($result_semestres)): ?>
  <div style="width: 50%; display: inline-block;" class="bs-docs-example" title="<?php echo $row_semestres['semestre']?>">
  <?php
  	$query_asignaturas = "SELECT * FROM asignaturas WHERE id_semestre = '$row_semestres[id]'";
    $result_asignaturas = mysqli_query($db, $query_asignaturas);
    if(mysqli_num_rows($result_asignaturas) > 0): ?>
    <table class="table is-bordered">
    	<tr>
				<th><b>Asignatura</td>
				<th colspan="2"><b>Calificación</td>
				<th><b>T-E</td>
				<th><b>Mes</td>
				<th><b>Año</td>
				<th><b>Plantel N</td>
			</tr><?php
			$x = 0;
			while($row_a = mysqli_fetch_assoc($result_asignaturas)): ?>
      <tr>
      	<td id="fn-md"><?php echo $row_a['nombre'] ?></td><?php
        $query_c = "SELECT * FROM calificaciones WHERE ci_alumno = '$ci_a' AND id_asignatura = '$row_a[id]'";
        if(!$result_c = $db->query($query_c)){
        	echo $db->error;
        	exit();
        }
        if(mysqli_num_rows($result_c) == 1):
				$row_c = mysqli_fetch_assoc($result_c); ?>
				<td id="fn-md"><?php echo $row_c['notan'] ?></td>
				<td id="fn-md"><?php echo $row_c['notal'] ?></td>
				<td id="fn-md"><?php echo $row_c['te'] ?></td>
				<td id="fn-md"><?php echo $row_c['mes'] ?></td>
				<td id="fn-md"><?php echo $row_c['anio'] ?></td>
				<td id="fn-md"><?php echo $row_c['id_plantel'] ?></td><?php
				else: ?>
        <td colspan="6">No Se ha Registrado Calificación</td><?php
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
					<tr>
						<td width="22%" align="center"><?php echo $rores['ci_d'] ?></td>
					</tr>
					<tr>
						<td width="22%">firma<br>&nbsp;</td>
					</tr>
					<tr>
						<td width="22%">
							<p align="center" style="font-size: 10px; border: none;">
								Para efectos de su validez a nivel estadal<br>&nbsp;
							</p>
						</td>
					</tr>
					<td>&nbsp;</td>
					<td width="22%">Sello del Plantel</td>
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
						<td width="22%" align="center" colspan="2"><?php echo $rores['director'] ?></td>
					</tr>
					<td width="22%" align="left">Número de C.I</td>
						<tr>
							<td width="22%" align="center"><?php echo $rores['ci_d'] ?></td>
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
					<td>&nbsp;</td>
					<td width="22%">Sello del Plantel</td>
				</tr>
			</tbody>
		</table>
        
		<script type="text/javascript">
			$(document).ready(function(){
		    $('.flatpickr-calendar').remove();
		  })
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