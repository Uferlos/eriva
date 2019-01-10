<?php
include '../files/config.php';

class Plantel {

  private $db;
  private $cod_dea;
  private $nom;
  private $dist;
  private $direc;
  private $tel;
  private $muni;
  private $ent_fed;
  private $zona;
  private $match;
  private $iniP;
  private $endP;
  private $dir;
  private $ci_d;
  private $dir_zona;
  private $ci_dz;

  public function __construct($db, $cod_dea, $nom, $dist, $direc, $tel, $muni, $ent_fed, $zona, $match, $iniP, $endP, $dir, $ci_d, $dir_zona, $ci_dz) {
    $this->db = $db;
    $this->cod_dea = $cod_dea;
    $this->nom = $nom;
    $this->dist = $dist;
    $this->direc = $direc;
    $this->tel = $tel;
    $this->muni = $muni;
    $this->ent_fed = $ent_fed;
    $this->zona = $zona;
    $this->match = $match;
    $this->iniP = $iniP;
    $this->endP = $endP;
    $this->dir = $dir;
    $this->ci_d = $ci_d;
    $this->ci_dz = $ci_dz;
    $this->dir_zona = $dir_zona;
  }

  public function UpdatePlan(){
    
    $query = "UPDATE plan_estudio SET
    iniP = '$this->iniP', 
    endP = '$this->endP'
    WHERE cod_dea = '$this->match'";

    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert("Datos Actualizados");
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error al Actualizar <?php echo $this->db->error ?>");
      </script><?php
    endif;
  }

  public function UpdatePlantel(){
    
    $query = "UPDATE plantel SET
    cod_dea = '$this->cod_dea', 
    nombre = '$this->nom', 
    dtto_esc = '$this->dist', 
    direccion = '$this->direc', 
    telefono = '$this->tel', 
    municipio = '$this->muni', 
    ent_federal = '$this->ent_fed', 
    zona_educativa = '$this->zona',
    dir_zona = '$this->dir_zona',
    ci_dz = '$this->ci_dz'
    WHERE cod_dea = '$this->match'";

    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert("Datos Actualizados");
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error al Actualizar <?php echo $this->db->error ?>");
      </script><?php
    endif;
  }

  public function UpdateDirector(){
    $query = "UPDATE personal SET
    director = '$this->dir', 
    ci_d = '$this->ci_d'
    WHERE id = '$this->match'";

    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert("Datos Actualizados");
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error al Actualizar <?php echo $this->db->error ?>");
      </script><?php
    endif;
  }
}

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$cod_dea = isset($_POST['cod_dea']) ? $_POST['cod_dea'] : '';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$dist = isset($_POST['dist']) ? $_POST['dist'] : '';
$direc = isset($_POST['direc']) ? $_POST['direc'] : '';
$tel = isset($_POST['tel']) ? $_POST['tel'] : '';
$muni = isset($_POST['muni']) ? $_POST['muni'] : '';
$ent_fed = isset($_POST['ent_fed']) ? $_POST['ent_fed'] : '';
$zona = isset($_POST['zona']) ? $_POST['zona'] : '';
$match = isset($_POST['match']) ? $_POST['match'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';
$iniP = isset($_POST['iniP']) ? $_POST['iniP'] : '';
$endP = isset($_POST['endP']) ? $_POST['endP'] : '';
$dir = isset($_POST['dir']) ? $_POST['dir'] : '';
$ci_d = isset($_POST['ci_d']) ? $_POST['ci_d'] : '';
$dir_zona = isset($_POST['dir_zona']) ? $_POST['dir_zona'] : '';
$ci_dz = isset($_POST['ci_dz']) ? $_POST['ci_dz'] : '';

$obj = new Plantel($db, $cod_dea, $nom, $dist, $direc, $tel, $muni, $ent_fed, $zona, $match, $iniP, $endP, $dir, $ci_d, $dir_zona, $ci_dz);

switch ($action){
  case 'updp':
    $obj->UpdatePlantel();
    break;
  case 'upde':
    $obj->UpdatePlan();
    break;
  case 'updd':
    $obj->UpdateDirector();
    break;
  default:
    echo "No se encuentra la action a ejecutar";
    break;
}
?>