<?php
include '../files/config.php';
include '../files/interface.php';

class Alumnos implements Interfaces{

  private $ci;
  private $f_nac;
  private $ape;
  private $nom;
  private $l_nac;
  private $ent_fed;
  private $cod_dea;
  private $match;
  private $db;

  public function __construct($ci, $f_nac, $ape, $nom, $l_nac, $ent_fed, $cod_dea, $match, $db){
    $this->ci = $ci;
    $this->f_nac = $f_nac;
    $this->ape = $ape;
    $this->nom = $nom;
    $this->l_nac = $l_nac;
    $this->ent_fed = $ent_fed;
    $this->cod_dea = $cod_dea;
    $this->match = $match;
    $this->db = $db;
  }

  public function Add(){
    $query = "INSERT INTO alumnos VALUES("
    ."'$this->ci', '$this->f_nac' , '$this->ape', '$this->nom', '$this->l_nac',"
    ."'$this->ent_fed', '$this->cod_dea')";

    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert('Registro Exitoso');
      </script>
    <?php else : ?>
      <input type="hidden" id="errno" value="<?php echo $this->db->errno ?>">
      <script type="text/javascript">
        if(document.getElementById('errno').value === '1062'){
          alert('Ya registro este alumno');
        }else{
          alert("Error <?php echo $this->db->error ?>");
        }
      </script> <?php
    endif;
  }

  public function Destroy(){
    $query = "DELETE FROM alumnos WHERE ci = '$this->match'";

    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert('Registro Eliminado');
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error <?php echo $this->db->error ?>");
      </script><?php
    endif;
  }

  public function Update(){
    $query = "UPDATE alumnos SET 
    ci = '$this->ci', 
    fnacimiento = '$this->f_nac', 
    apellidos = '$this->ape', 
    nombres = '$this->nom', 
    lugar_nacimiento = '$this->l_nac', 
    ent_federal_pais = '$this->ent_fed'
    WHERE ci = '$this->match'";

    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert('Datos Actualizados')
      </script>
    <?php else : ?>
      <script type="text/javascript">
        alert("Error <?php echo $this->db->error ?>");
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

$ci = isset($_POST['ci']) ? $_POST['ci'] : '';
$f_nac = isset($_POST['f_nac']) ? $_POST['f_nac'] : '';
$ape = isset($_POST['ape']) ? $_POST['ape'] : '';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$l_nac = isset($_POST['l_nac']) ? $_POST['l_nac'] : '';
$ent_fed = isset($_POST['ent_fed']) ? $_POST['ent_fed'] : '';
$cod_dea = isset($_POST['cod_dea']) ? $_POST['cod_dea'] : '';
$match = isset($_POST['match']) ? $_POST['match'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';

$obj = new Alumnos($ci, $f_nac, $ape, $nom, $l_nac, $ent_fed, $cod_dea, $match, $db);

switch ($action) {
  case 'add':
    $obj->Add();
    break;
  case 'upd':
    $obj->Update();
    break;
  case 'destroy':
    $obj->Destroy();
    break;
  default:
    echo "No se encontro la action a ejecutar";
    break;
}
?>