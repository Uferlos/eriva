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

$query = "SELECT * FROM asignaturasN WHERE id_semestre = '$id_s'";

if(!$result_a = $db->query($query)){
	echo $db->error;
	exit();
}

if($result_a->num_rows): ?>
	<table border="1" class="table is-bordered">
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
		</tr>
	<?php 
		$x = 0; 

		while($row = $result_a->fetch_assoc()) :
		$query_b = "SELECT * FROM calificacionesN WHERE ci_alumno = '$ci' and id_asignatura = '$row[id]'";
		if(!$result_b = $db->query($query_b)){
			echo $db->error;
			exit();
		}
		$row_b = $result_b->fetch_assoc();

		if(!$result_b->num_rows):	?>
			<tr id="<?php echo $row['id'] ?>">
				<td class="up">
					<input type="hidden" name="id_asignatura[<?php echo $x; ?>]" value="<?php echo $row['id'] ?>">
					<input type="text" name="asig" class="text-only input is-small asig" style="width:60px; margin-bottom:0px;" required>
				</td>
				<td>
					<p class="control">
		      	<span class="select is-small">
		        	<select name="notan[<?php echo $x; ?>]" style="margin-bottom:0px; width:60px;">
		          	<option value="pendiente">Pendiente</option><?php
		            for($i=1; $i<=20; $i++) : ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
		            <?php endfor; ?>
		        	</select>
						<span>
					</p>
				</td>

				<td>
					<p class="control">
		      	<span class="select is-small">
		        	<select name="notal[<?php echo $x; ?>]" style="margin-bottom:0px; width:70px;">
		          	<option value="pendiente">Pendiente</option><?php
		            for($j=0; $j<=19; $j++): ?>
		            <option value="<?php echo $nl[$j] ?>"><?php echo $nl[$j] ?></option><?php
		            endfor; ?>
		          </select>
		        </span>
					</p>
		    </td>

		    <td>
					<p class="control">
		  			<span class="select is-small">
							<select id="te[<?php echo $x; ?>]" class="select is-small" name="te[<?php echo $x; ?>]" style="margin-bottom:0px;width:60px;">
								<option value="F">F</option>
								<option value="R">R</option>
								<option value="X">X</option>
								<option value="P">P</option>
							<select>
						</span>
					</p>
				</td>

				<td>
					<p class="control">
		 				<span class="select is-small">
							<select class="select is-small" name="mes[<?php echo $x; ?>]" style="margin-bottom:0px; width:60px;">
							<?php for($i=1; $i<=12; $i++):
								echo '<option value="'.$i.'">'.$i.'</option>';
							endfor; ?>
							</select>
						</span>
					</p>
				</td>

				<td>
					<input type="text" class="num-only input is-small anio" name="anio[<?php echo $x; ?>]" style="width:60px; margin-bottom:0px;" required>
				</td>

				<td>
					<input type="text" class="num-only input is-small id_plantel" name="id_plantel[<?php echo $x; ?>]" style="width:60px; margin-bottom:0px;" required>
				</td>
			</tr><?php
		else : 
			/* 
				*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*X*
																					UPDATE FIELDS
			*/
		?>
			<tr id="<?php echo $row['id'] ?>">
				<td class="up">
					<input type="hidden" name="id_asignatura[<?php echo $x; ?>]" value="<?php echo $row['id'] ?>">
					<input type="text" name="asig" class="text-only input is-small asig" style="margin-bottom:0px;" required value="<?php echo $row['nombre'] ?>">
				</td>
				<td>
					<p class="control">
		      	<span class="select is-small">
		        	<select name="notan[<?php echo $x; ?>]" style="margin-bottom:0px; width:60px;"><?php
		        		if($row_b['notan'] == 'pendiente'): ?>
		          	<option selected value="pendiente">Pendiente</option><?php
		          	else: ?>
		          	<option value="pendiente">Pendiente</option><?php endif;
		            for($i=1; $i<=20; $i++) : 
		            if($i == $row_b['notan']) : ?>
		          	<option selected value="<?php echo $i ?>"><?php echo $i ?></option><?php
		          	else : ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
		            <?php
		            endif;
		            endfor; ?>
		        	</select>
						<span>
					</p>
				</td>

				<td>
					<p class="control">
		      	<span class="select is-small">
		        	<select name="notal[<?php echo $x; ?>]" style="margin-bottom:0px; width:70px;"><?php
		        		if($row_b['notal'] == 'pendiente'):
                	echo '<option selected value="pendiente">Pendiente</option>';
                else :
                	echo '<option value="pendiente">Pendiente</option>';
                endif;
		            for($j=0; $j<=19; $j++):
                  if($nl[$j] == $row_b['notal']):
                    echo '<option selected value="'.$nl[$j].'">'.$nl[$j].'</option>';
                  else :
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
							<select id="te[<?php echo $x; ?>]" class="select is-small" name="te[<?php echo $x; ?>]" style="margin-bottom:0px;width:60px;">
								<option value="F">F</option>
								<option value="R">R</option>
								<option value="X">X</option>
								<option value="P">P</option>
							</select>
							<script type="text/javascript">
								document.getElementById("te[<?php echo $x; ?>]").value = "<?php echo $row_b['te'] ?>"
							</script>
						</span>
					</p>
				</td>

				<td>
					<p class="control">
		 				<span class="select is-small">
							<select class="select is-small" name="mes[<?php echo $x; ?>]" style="margin-bottom:0px; width:60px;">
							<?php
								for($i=1; $i<=12; $i++):
									if($i == $row_b['mes']):
										echo '<option selected value="'.$i.'">'.$i.'</option>';
									else:
										echo '<option value="'.$i.'">'.$i.'</option>';
									endif;
								endfor; ?>
							</select>
						</span>
					</p>
				</td>

				<td>
					<input type="text" class="num-only input is-small anio" name="anio[<?php echo $x; ?>]" style="width:60px; margin-bottom:0px;" required value="<?php echo $row_b['anio'] ?>">
				</td>

				<td>
					<input type="text" class="num-only input is-small id_plantel" name="id_plantel[<?php echo $x; ?>]" style="width:60px; margin-bottom:0px;" required value="<?php echo $row_b['id_plantel'] ?>">
				</td>
			</tr><?php
		endif;
		$x++;
	endwhile; ?>
	</table>
<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$.getJSON('../php/autoC_asig.php', {id_s: <?php echo $id_s; ?> }, function(data){
		  $('.asig').typeahead({source:data});
		});
	})
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