<?php
if(($_COOKIE['usu'] == null) || $_COOKIE['nom'] == null || $_COOKIE['ape'] == null){
  header('location: ../');
}else{
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Liceo Nocturno Eutemio Rivas</title>

<?php include 'files.html'; ?>

<body>

<section class="hero is-primary is-fullheight is-unselectable">
  <div class="hero-head">
    <header class="nav">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item is-active is-tab" id="main">
            Liceo Nocturno Eutimio Rivas
          </a>
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu">
          <span class="nav-item dropdown">
            <a id="usr_c" class="button is-primary is-inverted">
              <span class="icon">
                <i class="material-icons">face</i>
              </span>
              <span><?php echo $_COOKIE['nom']." ".$_COOKIE['ape'] ?></span>
            </a>
          </span>
        </div>
      </div>
    </header>
  </div>

  <div class="hero-body">
    <div class="container has-text-centered" id="wrapper"></div>
    <br>
    <div id="alert"></div>
  </div>

  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <li id="plantel">
            <a>Plantel</a>
          </li>
          <li>
            <a id="alumnos">Alumnos</a>
          </li>
          <li id="control">
            <a>Control de Estudio</a>
          </li>
          <li id="db">
            <a>Base de Datos</a>
          </li>
          <li id="logout">
            <a>Desconectar</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</section>

<script type="text/javascript">
  $('li').on('click', function(){
    $('li').removeClass('is-active')
    $(this).addClass('is-active')
  });
</script>
</body>
</html>
<?php } ?>