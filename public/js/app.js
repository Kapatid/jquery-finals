import anime from './anime.es.js'

$('#ciit-logo').on('click mouseover', () => {
  $('#home-btn').animate({ opacity: 1 })
})

$('#home-btn').on('click', () => {
  $('#home-container').css({ display: 'grid' })
  $('#home-container').animate({ top: 0 })
})

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
    $('#btn-school').addClass('active')
    $('#btn-college').removeClass('active')

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
    $('#btn-school').removeClass('active')
    $('#btn-college').addClass('active')

    anime({
      targets: `#container-college`,
      opacity: [0, 1],
      translateX: [100, 0],
      easing: 'cubicBezier(0.075, 0.820, 0.165, 1.000)',
      delay: anime.stagger(150),
    })
  }
})


$('.btn-bd').on('click', function(btn) {
  const id = $(this).attr('id')
  
  $('.bachelors-degree').each(function (index) {
    const elem = $(this)
    const firstClass = elem.attr('class').split(' ')[0]

    if(firstClass === id ) {
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

