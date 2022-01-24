import anime from './anime.es.js'

// Home interactions
$('#home-bg-vid').on('ended', () => {
  $('#home-btn').animate({ opacity: 1 }, 150)
})
$('#ciit-logo').on('click mouseover', () => {
  $('#home-btn').animate({ opacity: 1 }, 150)
})
$('#home-btn').on('click', () => {
  $('#home-container').css({ display: 'grid' })
  $('#home-container').animate({ top: 0 })
})


// Buttons for floating home
$('.btn-close').on('click', () => {
  $('#home-container').animate(
    { top: '100%' }, 500, 
    () => {$('#home-container').css({ display: 'none' })}
  )
})
$('#btn-school').on('click', () => {
  if (!$('#btn-school').hasClass('active')) {
    $('#container-school').show()
    $('#container-college').hide()
    $('#container-corporate-training').hide()
    $('#btn-school').addClass('active')
    $('#btn-college').removeClass('active')
    $('#btn-corporate-training').removeClass('active')

    anime({
      targets: `#container-school`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})
$('#btn-college').on('click', () => {
  if (!$('#btn-college').hasClass('active')) {
    $('#container-school').hide()
    $('#container-college').show()
    $('#container-corporate-training').hide()
    $('#btn-school').removeClass('active')
    $('#btn-college').addClass('active')
    $('#btn-corporate-training').removeClass('active')

    anime({
      targets: `#container-college`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})
$('#btn-corporate-training').on('click', () => {
  if (!$('#btn-corporate-training').hasClass('active')) {
    $('#container-school').hide()
    $('#container-college').hide()
    $('#container-corporate-training').show()
    $('#btn-school').removeClass('active')
    $('#btn-college').removeClass('active')
    $('#btn-corporate-training').addClass('active')

    anime({
      targets: `#container-corporate-training`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})


// Bachelor's Degree Elements
$('.btn-bd').on('click', function(btn) {
  const id = $(this).attr('id')
  
  $('.bachelors-degree').each(function (index) {
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


// Corporate Training form
$('#btn-open-register').on('click', function () {
  $('#container-form-ct').css({ display: 'grid' })
  anime({
    targets: `#form-ct-register`,
    opacity: [0, 1],
    translateY: [100, 0],
    easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
    duration: 200
  })
})
$('#form-btn-close').on('click', function () {
  anime({
    targets: '#form-ct-register',
    opacity: [1, 0],
    translateY: [0, 100],
    easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
    duration: 200,
    complete: function(anim) {
      $('#container-form-ct').css({ display: 'none' })
    }
  })
})
$('#ct-age-input').on('input', function () {
  this.value = this.value.slice(0,this.maxLength)

  !isNaN($(this).val()) && $(this).val($(this).val())
})
$('#btn-submit').on('click', function () {
  if ($('input[name="email"]').val() && $('input[name="email"]').val() && 
      $('input[name="email"]').val() && $('input[name="email"]').val() && 
      $('select[name="program"]').val()) {
    $(this).css({ display: 'none' })
    $('#btn-submit-loading').css({ display: 'grid' })
  }
})
$('#btn-submit-loading').on('click', function () {
  this.preventDefault();
})


// Floating status
$('#status-btn-close').on('click', function () {
  anime({
    targets: '#home-status',
    opacity: [1, 0],
    translateY: [0, 100],
    easing: 'linear',
    duration: 100,
    complete: function(anim) {
      $('#home-status').css({ display: 'none' })
    }
  })
})