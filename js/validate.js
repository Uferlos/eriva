$(document).on('blur', 'input[type=text]', function(){
  if($(this).val() === ''){
    $(this).removeClass('is-success')
    $(this).addClass('is-danger')
    $(this).next().find('i').html('')
    $(this).next().find('i').html('report')
  }
  else if($(this).val() != ''){
    $(this).removeClass('is-danger')
    $(this).addClass('is-success')
    $(this).next().find('i').html('')
    $(this).next().find('i').html('check_circle')
  }
});