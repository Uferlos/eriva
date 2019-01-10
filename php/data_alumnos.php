<?php
include 'files/config.php';
$db = new mysqli(host, usr, pssw, db);
$db->set_charset('utf8');

if($db->connect_errno){
  echo $db->connect_error;
  exit();
}

$x = isset($_POST['val']) ? $_POST['val'] : '';

$limit = 5;

if(isset($_POST['id'])){
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
}else{
  $id = 1;
}

$page_position = ($id-1) * $limit;

$query = "SELECT * FROM alumnos WHERE nombres LIKE '%$x%' OR apellidos LIKE '%$x%' OR ci LIKE '%$x%' LIMIT $page_position, $limit";

if(!$res = $db->query($query)){
  echo $db->error;
  exit();
}

?>

<section class="section box">
  <?php if($res->num_rows): ?>
  <table class="table is-narrow is-striped">
    <thead>
      <div class="field has-addons">
        <p class="control" style="width: 215px">
          <input id="search" class="input" type="search" placeholder="Nombre/Apellido/Cedula" value="<?php echo $x ?>">
        </p>
        <p class="control">
          <button type="button" id="send" class="button is-info is-outlined">
            <i class="material-icons">search</i>
          </button>
        </p>
      </div>
    </thead>
    <thead>
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>C.I</th>
      <th>Fecha Nacimiento</th>
      <th>Lugar Nacimiento</th>
      <th>Entidad Federal</th>
      <th>Opciones</th>
    </thead>
    <?php while($row = $res->fetch_assoc()): ?>
    <tbody>
      <tr>
        <td class="cap"><?php echo $row['nombres'] ?></td>
        <td class="cap"><?php echo $row['apellidos'] ?></td>
        <td class="cap"><?php echo $row['ci'] ?></td>
        <td class="cap"><?php echo $row['fnacimiento'] ?></td>
        <td class="cap"><?php echo $row['lugar_nacimiento'] ?></td>
        <td class="cap"><?php echo $row['ent_federal_pais'] ?></td>
        <td>
          <button id="edit_a" title="Editar" class="button is-small" value="<?php echo $row['ci'] ?>">
            <span class="icon is-small">
              <i class="material-icons">create</i>
            </span>
          </button>
          <button id="del_a" title="Eliminar" class="button is-small" value="<?php echo $row['ci'] ?>">
            <span class="icon is-small">
              <i class="material-icons">delete_sweep</i>
            </span>
          </button>
          <a class="button is-small" title="Constancia" target="_blank" href="../php/constancia.php?ci=<?php echo $row['ci'] ?>">
            <span class="icon is-small">
              <i class="material-icons">library_books</i>
            </span>
          </a>
        </td>
      </tr>
    </tbody>
    <?php
    endwhile;
    $squery = "SELECT * FROM alumnos";
    $res2 = $db->query($squery);
    $rows = $res2->num_rows;
    $total = ceil($rows/$limit);
    ?>
    <tfoot>
      <td colspan="7">
        <nav class="pagination is-small"><?php
          if($id > 1) :?>
          <a data-page="<?php echo ($id-1); ?>" class="pagination-previous">Anterior</a>
          <?php else : ?>
          <a class="pagination-previous is-disabled">Anterior</a>
          <?php endif;
          
          if($id != $total) : ?>
          <a class="pagination-next" data-page="<?php echo ($id+1); ?>">Siguiente</a>
          <?php else : ?>
          <a class="pagination-next is-disabled">Siguiente</a>
          <?php endif;
              
          for($i = 1; $i <= $total; $i++) : ?>
            <ul class="pagination-list">
            <?php if($id == $i) : ?>
              <li>
                <a class="pagination-link is-current"><?php echo $i ?></a>
              </li>
              <?php else : ?>
              <li>
                <a class="pagination-link" data-page="<?php echo $i; ?>"><?php echo $i ?></a>
              </li>
            <?php endif; ?>
            </ul>
            <?php endfor; ?>
          </nav>

        </td>
      </tfoot>
    </table><?php else: ?>
  <article class="message is-dark">
    <div class="message-header">
      <p>Tabla Vacia</p>
    </div>
    <div class="message-body has-text-centered">
      <p><strong>No hay resultados</strong></p>
      <center>
      <div class="field has-addons">
        <p class="control">
          <input id="search" class="input" type="text" placeholder="Buscar">
        </p>
        <p class="control">
          <button type="button" id="send" class="button is-info">
            <i class="material-icons">search</i>
          </button>
        </p>
      </div>
      </center>
    </div>
  </article>
  <?php endif; ?>
</section>