<?php
	include('files/config.php');

	$db = new mysqli(host, usr, pssw, db);
	if ($db->connect_errno){
		echo $db->connect_error;
		exit();
	}

	$db->set_charset('utf8');
	
	$arch = $_GET['arch'];

		$C_RUTA_ARCHIVO = $_SERVER['DOCUMENT_ROOT']."/eriva/backup/".$arch;
			
		$sistema = "show variables where variable_name = 'basedir'";
		$rs_sistema = $db->query($sistema);
		mysqli_field_seek($rs_sistema, 0);
		$DirBase = $rs_sistema->fetch_row();
		$primero = substr($DirBase[1], 0, 1);
		
		if ($primero == "/"){
			$DirBase[1] = "mysql";
		}else{
			$DirBase[1] = $DirBase[1]."\bin\mysql";
		}
		
		$command = "$DirBase[1] --user=".usr." ".db." --password=".pssw." < ".$C_RUTA_ARCHIVO;
		system($command,$valor);
			
		if ($valor == 0){
			$info = 1;
		}else{
			$info = 0;
		}
	
	$response = null;
	$response[0] = array('info' => $info);
	
	echo json_encode($response);
?>