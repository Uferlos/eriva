<?php
include 'files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
	echo $db->connect_error;
	exit();
}

$id_s = isset($_REQUEST['id_s']) ? $_REQUEST['id_s'] : '';

$complete = array();

$sql = "SELECT nombre AS nom FROM asignaturasAll WHERE id_semestre = '$id_s';";

if(!$res = $db->query($sql)){
	echo $db->error;
	exit();
}

while($row = $res->fetch_assoc()){
	//echo "nombres ".$row1['nom']."<br>";
	$complete[] = $row['nom'];
}

echo json_encode($complete);
?>