<?php
include 'files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_error){
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
<table class="table is-striped is-bordered">
	<tr>
		<td>Cedula de Identidad</td>
		<td><?php echo $row['ci'] ?></td>
	</tr>
	<tr>
		<td>Apellidos</td>
		<td><?php echo $row['apellidos'] ?></td>
	</tr>
	<tr>
		<td>Nombres</td>
		<td><?php echo $row['nombres'] ?></td>
	</tr>
	<tr>
		<td>Fecha de Nacimiento</td>
		<td><?php echo $row['fnacimiento'] ?></td>
	</tr>
	<tr>
		<td>Lugar de Nacimiento</td>
		<td><?php echo $row['lugar_nacimiento'] ?></td>
	</tr>
	<tr>
		<td>Entidad Federal / Pais</td>
		<td><?php echo $row['ent_federal_pais'] ?></td>
	</tr>
</table>