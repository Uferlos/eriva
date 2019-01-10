<?php
include 'files/config.php';
$data = mysqli_connect(host, usr, pssw, db);
$data->set_charset('utf8');
$ci = $_GET['ci'];

$sql = "SELECT * FROM alumnos WHERE ci = '$ci'";
$res = mysqli_query($data, $sql);
$row = mysqli_fetch_array($res);

$sql1 = "SELECT * FROM personal";
$res1 = mysqli_query($data, $sql1);
$row1 = mysqli_fetch_array($res1);

$sql2 = "SELECT * FROM plan_estudio";
$res2 = mysqli_query($data, $sql2);
$row2 = mysqli_fetch_array($res2);

$x = $row2['iniP'];
$f = explode('-', $x);

if ($f[1] == '01') {$f[1] = 'Enero';}
elseif($f[1] == '02'){$f[1] = 'Febrero';}
elseif($f[1] == '03'){$f[1] = 'Marzo';}
elseif($f[1] == '04'){$f[1] = 'Abril';}
elseif($f[1] == '05'){$f[1] = 'Mayo';}
elseif($f[1] == '06'){$f[1] = 'Junio';}
elseif($f[1] == '07'){$f[1] = 'Julio';}
elseif($f[1] == '08'){$f[1] = 'Agosto';}
elseif($f[1] == '09'){$f[1] = 'Septiembre';}
elseif($f[1] == '10'){$f[1] = 'Octubre';}
elseif($f[1] == '11'){$f[1] = 'Noviembre';}
elseif($f[1] == '12'){$f[1] = 'Diciembre';}

$fixed1 = $f[2]." de ".$f[1]." del ".$f[0];

$x1 = $row2['endP'];
$f1 = explode('-', $x1);

if ($f1[1] == '01') {$f1[1] = 'Enero';}
elseif($f1[1] == '02'){$f1[1] = 'Febrero';}
elseif($f1[1] == '03'){$f1[1] = 'Marzo';}
elseif($f1[1] == '04'){$f1[1] = 'Abril';}
elseif($f1[1] == '05'){$f1[1] = 'Mayo';}
elseif($f1[1] == '06'){$f1[1] = 'Junio';}
elseif($f1[1] == '07'){$f1[1] = 'Julio';}
elseif($f1[1] == '08'){$f1[1] = 'Agosto';}
elseif($f1[1] == '09'){$f1[1] = 'Septiembre';}
elseif($f1[1] == '10'){$f1[1] = 'Octubre';}
elseif($f1[1] == '11'){$f1[1] = 'Noviembre';}
elseif($f1[1] == '12'){$f1[1] = 'Diciembre';}

$fixed2 = $f1[2]." de ".$f1[1]." del ".$f1[0];

function prompt($prompt_msg){
  echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");
  $answer = "<script type='text/javascript'> document.write(answer); </script>";
  return($answer);
}

//program
$prompt_msg = "Periodo que cursa el alumno";
$value = prompt($prompt_msg);

?>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript">
  window.print()
</script>
<meta charset="utf-8">
<body>

<img src="../img/banner_c.png" style="width: 40em; height: 6em; margin-left: 50px;">
<hr size="1">

<div id="top">
  <h3>CONSTANCIA</h3>

  <p id="fn-md">
    Quien suscribe, <strong><?php echo $row1['director'] ?></strong>, titular de la Cédula de Identidad N°
    <strong><?php echo $row1['ci_d'] ?></strong> Director(a) (E) del Liceo Nocturno "EUTIMIO RIVAS", Código Administrativo
    007918560 que funciona en la localidad de Santa Cruz de Mora del Municipio Antonio Pinto Salinas del 
    Estado Mérida, por medio de la presente:
  </p>

  <h3>HACE CONSTAR</h3>

  <p id="fn-md">
    Que el (la) Ciudadano (a): <strong><?php echo $row['nombres']. " ". $row['apellidos'] ?></strong>, titular de la cédula de identidad <strong>
    N° <?php echo $ci; ?></strong>, cursa en esta Institución el <strong><?php echo $value; ?> Periodo</strong>.
    El mismo inicia el <?php echo $fixed1 ?> y culmina el <?php echo $fixed2 ?>.
    <br><br>
    <p id="time">Constancia que se expide en Santa Cruz de Mora a los&nbsp;</p>
  </p>

</div>

<div id="bottom">
  <p>___________________________</p>
  <strong>Director (e)</strong><br>
  <strong><?php echo $row1['director'] ?></strong>
</div>

<div id="bottom-sm">
  <p id="fn-sm-k">
    <strong>
      "Año 2015: Año Bicentenario de la Carta de Jamaica" "2015: 220 del Grito Libertario de José Leonardo Chirino",
      "2015: 100 del Nacimiento de Cesar Rengifo".
    </strong>
  </p>
  <table width="100%" border="0">
  <tr>
  <td align="left">
  
  <p id="fn-sm" align="center">
    Sector Puerto Rico, Vía El Guayabal <br> Santa Cruz de Mora<br>
    Estado Mérida <br> Codigo Postal 5142, Venezuela.
  </p>
  </td>
  
  <td><div id="space"></div></td>

  <td align="right">
  <p id="fn-sm" align="center">
    Telefono: 0275-2671957<br>
    Email. l.n.eutimiorivas@hotmail.com
  </p>
  </td>
  </tr>
  </table>
</div>

<script type="text/javascript">
  var fecha = new Date();

  var dia = fecha.getDate();
  var mes = fecha.getMonth() + 1;
  var ano = fecha.getFullYear();

  if (mes === 1) {mes = 'enero';}
  else if(mes === 2){mes = 'febrero'}
  else if(mes === 3){mes = 'marzo'}
  else if(mes === 4){mes = 'abril'}
  else if(mes === 5){mes = 'mayo'}
  else if(mes === 6){mes = 'junio'}
  else if(mes === 7){mes = 'julio'}
  else if(mes === 8){mes = 'agosto'}
  else if(mes === 9){mes = 'septiembre'}
  else if(mes === 10){mes = 'octubre'}
  else if(mes === 11){mes = 'noviembre'}
  else if(mes === 12){mes = 'diciembre'}
    
  $('#time').append(dia+' días del mes de '+mes+' del año '+ano);
  </script>
</body>