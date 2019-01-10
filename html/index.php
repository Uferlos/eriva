<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Liceo Nocturno Eutemio Rivas</title>

<?php include 'files.html';
error_reporting(E_ERROR);

if(($_COOKIE['usu'] != null) || ($_COOKIE['nom'] != null) || ($_COOKIE['ape'] != null)){ ?>
  <script type="text/javascript">
    Cookies.remove('nom', {path:'/'});
    Cookies.remove('ape', {path:'/'});
    Cookies.remove('usu', {path:'/'});
  </script><?php
}
?>
<body>

<section class="hero is-primary is-fullheight">
  <div class="hero-head">
    <header class="nav">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item is-active a" id="home">
            Liceo Nocturno Eutimio Rivas
          </a>
          <a class="nav-item modal-button a" data-target="#gallery">
            Galeria
          </a>
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu">
          <a id="rs" class="nav-item a">
            Reseña Historica
          </a>
          <a id="msn" class="nav-item a">
            Misión
          </a>
          <a id="vsn" class="nav-item a">
            Visión
          </a>
          <a id="docs" class="nav-item a">
            Manual
          </a>
          <a class="nav-item modal-button a" data-target="#modal-info">
            Información
          </a>
          <span class="nav-item">
            <a class="button is-primary is-inverted modal-button" data-target="#modal-login">
              <span class="icon">
                <i class="material-icons">account_box</i>
              </span>
              <span>Iniciar Sesión</span>
            </a>
          </span>
        </div>
      </div>
    </header>
  </div>
  
  <div class="hero-body">
    <div id="logo" class="container has-text-centered">
      <p class="title">
        Liceo Nocturno Eutimio Rivas
      </p>
      <p class="subtitle">
        "Honor, Grandeza en la Tierra del Cáfe"
      </p>
    </div>
     <div id="mision" class="container has-text-centered" hidden>
      <p class="title">
        Misión
      </p>
      <p class="subtitle">
        Formar un ser con calidad humana y social, creando así las condiciones que permitan el desarrollo integral como continuo humano de las y los estudiantes (jóvenes y adultos), docentes, personal administrativo y de mantenimiento, garantizando la calidad educativa con pertinencia socio-cultural, que permita a través de la participación la proyección de un ciudadano capaz de convivir en una sociedad libre, tolerante y justa.
      </p>
    </div>

    <div id="vision" class="container has-text-centered" hidden>
      <p class="title">
        Visión
      </p>
      <p class="subtitle">
         El Liceo Nocturno “Eutimio Rivas” se proyecta como comunidad educativa comprometida con el fortalecimiento de los valores fundamentales que consoliden la acción pedagógica en nuestra institución, permitiendo el desarrollo de actividades productivas propias de nuestro entorno, a través de la orientación docente dirigida a las y los estudiantes (jóvenes y adultos) , formándolos para el trabajo liberador.
      </p>
    </div>

    <div id="rese" class="container has-text-centered" hidden>
      <p class="title">
        Reseña Historica
      </p>
      <p class="subtitle">
        El Liceo Nocturno Eutimio Rivas fue creado en el año 1980, para el mes de octubre, con el nombre de Ciclo Basico de Cultura "Eutimio Rivas", iniciando sus actividades en la instalacion del Liceo Diurno quien lleva su mismo nombre. Cabe considerar, que el Eponimo de este liceo obedece al recuerdo de un joven Santacrucense que murio en el año 1936, en una jornada de protesta estudiantil en la ciudad de Caracas, en lo que se considero era una continuidad del regimen gomecista, durante la gestion del General Eleazar Lopez Contreras, en la sede de la Universidad Central de Venezuela, ahora Palacio de las Academias. Eutimio Rivas salio de la Aldea Paiva de Santa Cruz de Mora y en la Capital inmolo su vida en aras de la Libertad y la Justicia. Es importante recalcar que en los primeros inicios, la Institucion estuvo dirigida por el Profesor Jacinto Noguera, con un personal distribuido de la siguiente manera: Docentes; Profesor Jesus Miguel Sanchez, Ramona Barrios, Blanca Escalante, Gaudys Suarez de Noguera y Xiomara Rangel. De igual manera contaban con una secretaria, la señora Maria de Jesus Gonzales y un obrero. El plantel para ese entonces solo conservaba una matricula de veinte estudiantes del Primer Semestre, correspondiente al año escolar 1980-1981 del lapso "A", el cual finalizaba en el mes de febrero para dar inicio al segundo semestre en el mes de marzo hasta julio. Actualmente la institucion esta bajo la direccion de la Licenciada Nancy Garcia, con una matricula de: 1° Periodo= 6, 2° Periodo= 9, 3° Periodo= 13, 4° Periodo= 19, 5° Periodo= 7° y 6°= 1, lo que da un total de 55 participantes. Sin embargo, la institucion esta en un periodo de transformacion debido a que fueron reducidos los años de estudio, es decir de cinco años a tres años, distribuidos en sus periodos.
      </p>
    </div>
  </div>
</section>

<script type="text/javascript">
  $('.a').on('click', function(){
    $('.a').removeClass('is-active')
    $(this).addClass('is-active')
  });
  $('#docs').click(function(){
    window.open('../docs/manual.pdf')
  })
</script>
<?php include 'form_login.html'; ?>
<?php include 'gallery.html'; ?>
<?php include 'info.html'; ?>
</body>
</html>