<?php
include 'files/config.php';

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$query = "SELECT * FROM alumnos";

if(!$res = $db->query($query)){
  echo $db->error;
  exit();
}
$auto = array();

while($row = $res->fetch_assoc()){
  $auto[] = $row['ci'];
}

echo json_encode($auto);

?>