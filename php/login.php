<?php
include 'files/config.php';

$bd = new mysqli(host, usr, pssw, db);
$bd->set_charset('utf8');

if($bd->connect_error){
  echo $bd->connect_error;
  exit();
}

$usu = $_GET['usu'];
$pass = md5($_GET['pass']);

$query = "SELECT * FROM usuarios WHERE usu = '$usu' AND pass = '$pass'";

if(!$res = $bd->query($query)){
  echo $bd->error;
  exit();
}

$row = $res->fetch_assoc();

if($res->num_rows){
  $info = 1;
}else{
  $info = 0;
}

if($info == 1){
  $data[0] = array('info' => $info);
  $data[1] = array('nom' => $row['nom']);
  $data[2] = array('ape' => $row['ape']);
  $data[3] = array('usu' => $row['usu']);

  echo json_encode($data);
}else{
  $data[0] = array('info' => $info);

  echo json_encode($data);
}
?>