<?php
include '../files/config.php';

class Users{

  private $usu;
  private $ape;
  private $pass;
  private $nom;
  private $db;
  private $match;
  private $oldpass;
  private $curr;

  public function __construct($usu, $ape, $pass, $nom, $db, $match, $oldpass, $curr){
    $this->usu = $usu;
    $this->nom = $nom;
    $this->ape = $ape;
    $this->db = $db;
    $this->pass = md5($pass);
    $this->curr = $curr;
    $this->match = $match;
    $this->oldpass = md5($oldpass);
  }

  public function chPass(){
    if($this->curr != $this->oldpass): ?>
      <script type="text/javascript">
        alert('Las clave actual no coincide');
      </script><?php else:
      
      $query = "UPDATE usuarios SET pass = '$this->pass' WHERE usu = '$this->match'";

      if($this->db->query($query)) : ?>
        <script type="text/javascript">
          alert('¡Registro Actualizado!');
        </script>
      <?php else : ?>
        <script type="text/javascript">
          alert("Error al actualizar <?php echo $this->db->error ?>");
        </script>
      <?php endif;
    endif;
  }

  public function addUsu(){
    $query = "INSERT INTO usuarios VALUES("
    ."null, '$this->usu', '$this->pass', '$this->nom', '$this->ape')";
    
    if($this->db->query($query)): ?>
      <script type="text/javascript">
        alert('¡Registro Exitoso!');
      </script>
    <?php else : ?>
      <input type="hidden" id="errno" value="<?php echo $this->db->errno; ?>">
      <script type="text/javascript">
        if(document.getElementById('errno').value === '1062'){
          alert('Ya existe el nombre de usuario');
        }else{
          alert("Error al registrar <?php echo $this->db->error ?>");
        }
      </script>
    <?php endif;
  }
}

$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');
if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$ape = isset($_POST['ape']) ? $_POST['ape'] : '';
$usu = isset($_POST['usu']) ? $_POST['usu'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$curr = isset($_POST['curr']) ? $_POST['curr'] : '';
$oldpass = isset($_POST['oldpass']) ? $_POST['oldpass'] : '';
$match = isset($_POST['match']) ? $_POST['match'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';

$obj = new Users($usu, $ape, $pass, $nom, $db, $match, $oldpass, $curr);

switch ($action) {
  case 'add':
    $obj->addUsu();
    break;
  case 'upd':
    $obj->chPass();
    break;
  default:
    echo "No se encuentro la accion a ejecutar";
    break;
}
?>