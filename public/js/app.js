import anime from './anime.es.js'

//#region Home interactions
$('#home_bg_vid').on('ended', () => {
  $('#home_btn').animate({ opacity: 1 }, 150)
})
$('#ciit_logo').on('click mouseover', () => {
  $('#home_btn').animate({ opacity: 1 }, 150)
})
$('#home_btn').on('click', () => {
  $('#home_container').css({ display: 'grid' })
  $('#home_container').animate({ top: 0 })
})
//#endregion


//#region Buttons for floating home
$('.btn-close').on('click', () => {
  $('#home_container').animate(
    { top: '100%' }, 500, 
    () => {$('#home_container').css({ display: 'none' })}
  )
})
$('#btn_school').on('click', () => {
  if (!$('#btn_school').hasClass('active')) {
    $('#container_school').show()
    $('#container_college').hide()
    $('#container_corporate_training').hide()
    $('#btn_school').addClass('active')
    $('#btn_college').removeClass('active')
    $('#btn_corporate_training').removeClass('active')

    anime({
      targets: `#container_school`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})
$('#btn_college').on('click', () => {
  if (!$('#btn_college').hasClass('active')) {
    $('#container_school').hide()
    $('#container_college').show()
    $('#container_corporate_training').hide()
    $('#btn_school').removeClass('active')
    $('#btn_college').addClass('active')
    $('#btn_corporate_training').removeClass('active')

    anime({
      targets: `#container_college`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})
$('#btn_corporate_training').on('click', () => {
  if (!$('#btn_corporate_training').hasClass('active')) {
    $('#container_school').hide()
    $('#container_college').hide()
    $('#container_corporate_training').show()
    $('#btn_school').removeClass('active')
    $('#btn_college').removeClass('active')
    $('#btn_corporate_training').addClass('active')

    anime({
      targets: `#container_corporate_training`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})
//#endregion


//#region Bachelor's Degree Elements
$('.btn-bd').on('click', function(btn) {
  const id = $(this).attr('id')
  
  $('.bachelors-degree').each(function(index) {
    const elem = $(this)
    const firstClass = elem.attr('class').split(' ')[0]

    if(firstClass === id) {
      $(elem).css({ display: 'grid' })

      anime({
        targets: `.${firstClass}.bachelors-degree .el`,
        opacity: [0, 1],
        translateY: [-100, 0],
        easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
        delay: anime.stagger(150),
      })
    }
  })
})
$('.btn-degree-exit').on('click', function() {
  const btn = $(this)
  btn.parent().css({ display: 'none' })
})
//#endregion


//#region Corporate Training form 
$('#btn_open_register').on('click', function() {
  $('#container_form_ct').css({ display: 'grid' })
  anime({
    targets: `#form_ct_register`,
    opacity: [0, 1],
    translateY: [100, 0],
    easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
    duration: 200
  })
})
$('#form_btn_close').on('click', function() {
  anime({
    targets: '#form_ct_register',
    opacity: [1, 0],
    translateY: [0, 100],
    easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
    duration: 200,
    complete: function(anim) {
      $('#container_form_ct').css({ display: 'none' })
    }
  })
})
$('#ct_age_input').on('input', function() {
  this.value = this.value.slice(0,this.maxLength)

  !isNaN($(this).val()) && $(this).val($(this).val())
})
$('#btn_submit').on('click', function() {
  if ($('input[name="email"]').val() && $('input[name="email"]').val() && 
      $('input[name="email"]').val() && $('input[name="email"]').val() && 
      $('select[name="program"]').val()) {
    $(this).css({ display: 'none' })
    $('#btn_submit_loading').css({ display: 'grid' })
  }
})
$('#btn_submit_loading').on('click', function() {
  this.preventDefault();
})
//#endregion


// Floating status
$('#status_btn_close').on('click', function() {
  anime({
    targets: '#home_status',
    opacity: [1, 0],
    translateY: [0, 100],
    easing: 'linear',
    duration: 100,
    complete: function(anim) {
      $('#home_status').css({ display: 'none' })
    }
  })
})