/* ###### LOGIN ###### */
$(document).on('submit', '#login', function(e){
  e.preventDefault();
  $.getJSON('../php/login.php', {usu:$('#usu').val(), pass:$('#pass').val()}, function(data){
    if (data[0].info == 1){
      Cookies.set('nom', data[1].nom, {path:'/', expires: 0.5});
      Cookies.set('ape', data[2].ape, {path:'/', expires: 0.5});
      Cookies.set('usu', data[3].usu, {path:'/', expires: 0.5});
      location.href = '../html/menu.php';
    }
    else{
      alert('Usuario y/o Contraseña Invalidos');
      $('#usu').val('').focus();
      $('#pass').val('');
    }
  });
});

$(document).ready(function(){
  $.post('../html/start.html', function(data){
    $('#wrapper').html(data);
  })
})

/* ###### CLOSE ##### */
$(document).on('click', '#closeA', function(){
  $.post('../html/alumnos.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#closeP', function(){
  $.post('../html/plantel.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#closeEM', function(){
  $.post('../html/list_years.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#closeEMN', function(){
  $.post('../html/list_yearsN.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#closeCG', function(){
  $.post('../html/list_yearsG.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#closeLN', function(){
  $.post('../html/control3.html', function(data){
    $('#wrapper').html(data);
  })
})

/* ###### LOGOUT ##### */
$(document).on('click', '#logout', function(){
  Cookies.remove('nom', {path:'/'});
  Cookies.remove('ape', {path:'/'});
  Cookies.remove('usu', {path:'/'});
  window.location.href = "../";
});

/* ###### USERS CONTROL ##### */
$(document).on('click', '#nusu', function(){
  $.post('../html/form_nusu.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#chusr', function(){
  $.post('../html/change.php', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('submit', '#formAddUsr', function(e){
  e.preventDefault();
  var formData = $('#formAddUsr').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/users.php'
  })
  .done(function(data){
    $('#alert').html(data);
    $.post('../html/users.html', function(data){
      $('#wrapper').html(data);
    })
  })
})

$(document).on('submit', '#formUpdPass', function(e){
  e.preventDefault();
  var formData = $('#formUpdPass').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/users.php'
  })
  .done(function(data){
    $('#alert').html(data);
    $.post('../html/users.html', function(data){
      $('#wrapper').html(data);
    })
  })
})

/* ###### INDEX BUTTONS ###### */
$(document).on('click', '#home', function(){
  $('#logo').attr('hidden', false)
  $('#vision').attr('hidden', true)
  $('#mision').attr('hidden', true)
  $('#rese').attr('hidden', true)
});

$(document).on('click', '#vsn', function(){
  $('#vision').attr('hidden', false)
  $('#logo').attr('hidden', true)
  $('#mision').attr('hidden', true)
  $('#rese').attr('hidden', true)
});

$(document).on('click', '#msn', function(){
  $('#mision').attr('hidden', false)
  $('#vision').attr('hidden', true)
  $('#logo').attr('hidden', true)
  $('#rese').attr('hidden', true)
});

$(document).on('click', '#rs', function(){
  $('#rese').attr('hidden', false)
  $('#mision').attr('hidden', true)
  $('#vision').attr('hidden', true)
  $('#logo').attr('hidden', true)
});

/* ###### MAIN BUTTONS ###### */
$(document).on('click', '#main', function(){
  window.location.reload(true);
})

$(document).on('click', '#db', function(){
  $.post('../html/database.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#control', function(){
  $.post('../html/control.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#plantel', function(){
  $.post('../html/plantel.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#alumnos', function(){
  $.post('../html/alumnos.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#db', function(){
  $.post('../html/database.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#usr_c', function(){
  $.post('../html/users.html', function(data){
    $('#wrapper').html(data);
  })
  $('li').removeClass('is-active');
})

/* ###### MENUS ###### */
$(document).on('click', '#dtplantel', function(){
  $.post('../php/u_plantel.php', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#planest', function(){
  $.post('../php/u_plan.php', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#direpl', function(){
  $.post('../php/u_datP.php', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#add_a', function(){
  $.post('../html/form_alumnos.php', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#list_a', function(){
  $.post('../html/list_alumnos.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#add_n', function(){
  $.post('../html/control1.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#f_old', function(){
  $.post('../html/control2.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#list_n', function(){
  $.post('../html/control3.0.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#l_old', function(){
  $.post('../html/control3.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#l_new', function(){
  $.post('../html/lista_notasN.php', function(data){
    $('#wrapper').html(data);
  })
})


/* ###### calificaciones ###### */
$(document).on('click', '#e_adul', function(){
  $.post('../html/list_years.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#e_gen', function(){
  $.post('../html/list_yearsG.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#f_new', function(){
  $.post('../html/list_yearsN.html', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#le_adul', function(){
  $.post('../html/lista_notas.php', function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#le_gen', function(){
  $.post('../html/lista_notasG.php', function(data){
    $('#wrapper').html(data);
  })
})

/* 1 - 6 OLD */
$(document).on('click', '#uno', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Septimo', idSemestre: 1},
    url: '../html/form_calificaciones.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#dos', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Octavo', idSemestre: 2},
    url: '../html/form_calificaciones.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#tres', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Noveno', idSemestre: 3},
    url: '../html/form_calificaciones.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#cuatro', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Decimo', idSemestre: 4},
    url: '../html/form_calificaciones.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#cinco', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Decimo Primero', idSemestre: 5},
    url: '../html/form_calificaciones.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#seis', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Decimo Segundo', idSemestre: 6},
    url: '../html/form_calificaciones.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

/* 1 - 6 NEW*/
$(document).on('click', '#unoN', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'UNO', idSemestre: 1},
    url: '../html/form_calificacionesN.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#dosN', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'DOS', idSemestre: 2},
    url: '../html/form_calificacionesN.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#tresN', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'TRES', idSemestre: 3},
    url: '../html/form_calificacionesN.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#cuatroN', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'CUATRO', idSemestre: 4},
    url: '../html/form_calificacionesN.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#cincoN', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'CINCO', idSemestre: 5},
    url: '../html/form_calificacionesN.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#seisN', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'SEIS', idSemestre: 6},
    url: '../html/form_calificacionesN.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#unoG', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Primero', idSemestre: 1},
    url: '../html/form_calificacionesG.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#dosG', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Segundo', idSemestre: 2},
    url: '../html/form_calificacionesG.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#tresG', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Tercero', idSemestre: 3},
    url: '../html/form_calificacionesG.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('click', '#cuatroG', function(){
  $.ajax({
    dataType: 'html',
    type: 'post',
    data: {nombreSemestre: 'Cuarto', idSemestre: 4},
    url: '../html/form_calificacionesG.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

/* ###### PROCCESS DATA ###### */

/* *** update data */
$(document).on('submit', '#formPlantel', function(e){
  e.preventDefault();
  var formData = $('#formPlantel').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/plantel.php'
  })
  .done(function(data){
    $('#alert').html(data)
    $.post('../html/plantel.html', function(dato){
      $('#wrapper').html(dato);
   })
  })
})

$(document).on('submit', '#formPlanestudio', function(e){
  e.preventDefault();
  var formData = $('#formPlanestudio').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/plantel.php'
  })
  .done(function(data){
    $('#alert').html(data)
    $.post('../html/plantel.html', function(dato){
      $('#wrapper').html(dato);
   })
  })
})

$(document).on('submit', '#formDirec', function(e){
  e.preventDefault();
  var formData = $('#formDirec').serialize();
  $.ajax({
    type: 'post',
    dataType: 'html',
    data: formData,
    url: '../php/class/plantel.php'
  })
  .done(function(datos){
    $('#alert').html(datos)
    $.post('../html/plantel.html', function(dato){
      $('#wrapper').html(dato);
    })
  })
})

/* *** insert data *** */
$(document).on('submit', '#formAlumnos', function(e){
  e.preventDefault();
  var formData = $('#formAlumnos').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/alumnos.php'
  })
  .done(function(data){
    $('#alert').html(data)
    $.post('../html/alumnos.html', function(dato){
      $('#wrapper').html(dato);
    })
  })
})

$(document).on('submit', '#formCalificaciones', function(e){
  e.preventDefault();
  var formData = $('#formCalificaciones').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/calificaciones.php'
  })
  .done(function(data){
    $('#alert').html(data);
    $.post('../html/list_years.html', function(dato){
      $('#wrapper').html(dato);
    })
  })
})

$(document).on('submit', '#formCalificacionesG', function(e){
  e.preventDefault();
  var formData = $('#formCalificacionesG').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/calificacionesG.php'
  })
  .done(function(data){
    $('#alert').html(data);
    $.post('../html/list_yearsG.html', function(dato){
      $('#wrapper').html(dato);
    })
  })
})

$(document).on('submit', '#formCalificacionesN', function(e){
  e.preventDefault();
  var formData = $('#formCalificacionesN').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/calificacionesN.php'
  })
  .done(function(data){
    $('#alert').html(data);
    $.post('../html/list_yearsN.html', function(dato){
      $('#wrapper').html(dato);
    })
  })
})

/* *** delete data ***  */
$(document).on('click', '#del_a', function(){
  var id = $(this).val();
  var conf = confirm('desea eliminar?');
  if(conf){
    $.ajax({
      type: 'post',
      data: {match:id, action:'destroy'},
      dataType: 'html',
      url: '../php/class/alumnos.php'
    })
    .done(function(data){
      $('#alert').html(data);
      $.post('../html/list_alumnos.html', function(data){
        $('#wrapper').html(data);
      })
    })
  }
})

/* *** update data ***  */
$(document).on('click', '#edit_a', function(){
  var id = $(this);
  $.ajax({
    type: 'post',
    data:{ci: $(id).val()},
    dataType: 'html',
    url: '../php/u_alumno.php'
  })
  .done(function(data){
    $('#wrapper').html(data);
  })
})

$(document).on('submit', '#FormUpdAlumno', function(e){
  e.preventDefault();
  var formData = $('#FormUpdAlumno').serialize();
  $.ajax({
    type: 'post',
    data: formData,
    dataType: 'html',
    url: '../php/class/alumnos.php'
  })
  .done(function(data){
    $('#alert').html(data);
    $.post('../html/list_alumnos.html', function(data){
      $('#wrapper').html(data);
    })
  })
})

/* ###### BACKUPS ###### */
$(document).on('click', '#mkbckp', function(){
  $.getJSON('../php/backup.php', function(data){
    if(data[0].info == 1){
      alert('Se Creo El Respaldo Exitosamente');
    }else{
      alert('Error al Crear el Respaldo');
    }
  });
});

$(document).on('click', '#mnbckp', function(){
  $.post('../html/backup_list.html', function(data){
    $('#wrapper').html(data);
  });
})