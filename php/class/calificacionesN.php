<?php
error_reporting(E_WARNING);
include '../files/config.php';
include '../files/interface.php';

class Calificaciones implements Interfaces{

  private $ci_a;
  private $id_a;
  private $notan;
  private $notal;
  private $apro;
  private $te;
  private $mes;
  private $anio;
  private $id_p;
  private $db;

  public function __construct($ci_a, $id_a, $notan, $notal, $apro, $te, $mes, $anio, $id_p, $db){
    $this->ci_a = $ci_a;
    $this->id_a = $id_a;
    $this->notan = $notan;
    $this->notal = $notal;
    $this->apro = $apro;
    $this->te = $te;
    $this->mes = $mes;
    $this->anio = $anio;
    $this->db = $db;
    $this->id_p = $id_p;
  }

  public function Add(){
    $aux = 0;
    for($i = 0; $i < count($this->id_a); $i++):
      $select = "SELECT * FROM calificacionesN WHERE ci_alumno = '$this->ci_a' AND id_asignatura = '{$this->id_a[$i]}'";
      if(!$res_sel = $this->db->query($select)){
        echo $this->db->error;
        exit();
      }
      if(!$res_sel->num_rows):
        $query = "INSERT INTO calificacionesN VALUES(null,
        '$this->ci_a', '{$this->id_a[$i]}' , '{$this->notan[$i]}',
        '{$this->notal[$i]}', '{$this->te[$i]}', '{$this->mes[$i]}',
        '{$this->anio[$i]}', '{$this->id_p[$i]}', '{$this->apro[$i]}')";
        $res = $this->db->query($query);
        if(!$res):
          $aux++;
        endif;
      else:
        $query = "UPDATE calificacionesN SET
        notan = '{$this->notan[$i]}', 
        notal = '{$this->notal[$i]}', 
        te = '{$this->te[$i]}', 
        mes = '{$this->mes[$i]}',
        anio = '{$this->anio[$i]}',
        id_plantel = '{$this->id_p[$i]}',
        apro = '{$this->apro[$i]}'
        WHERE ci_alumno = '$this->ci_a' AND id_asignatura = '{$this->id_a[$i]}'";
        $res = $this->db->query($query);
        if(!$res):
          $aux++;
        endif;
      endif;
    endfor;

    if($aux == 0): ?>
      <script type="text/javascript">
        alert('Registro Exitoso');
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error <?php echo $this->db->error ?>");
      </script> <?php
    endif;
  }

  public function Destroy(){
  }

  public function Update(){
  }
}

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$ci_a = isset($_POST['ci']) ? $_POST['ci'] : '';
$id_a = isset($_POST['id_asignatura']) ? $_POST['id_asignatura'] : '';
$notan = isset($_POST['notan']) ? $_POST['notan'] : '';
$notal = isset($_POST['notal']) ? $_POST['notal'] : '';
$apro = isset($_POST['apro']) ? $_POST['apro'] : '';
$te = isset($_POST['te']) ? $_POST['te'] : '';
$mes = isset($_POST['mes']) ? $_POST['mes'] : '';
$anio = isset($_POST['anio']) ? $_POST['anio'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';
$id_p = isset($_POST['id_plantel']) ? $_POST['id_plantel'] : '';

$obj = new Calificaciones($ci_a, $id_a, $notan, $notal, $apro, $te, $mes, $anio, $id_p, $db);

switch ($action) {
  case 'add':
    $obj->Add();
    break;
  case 'upd':
    $obj->Update();
    break;
  default:
    echo "No se encontro la action a ejecutar";
    break;
}
?>