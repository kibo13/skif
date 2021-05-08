$(document).ready(function () {

  const fabric_form = document.getElementById('fabric-form')

  if (fabric_form) {

    const fabric_name = document.getElementById('name')
    const fabric_code = document.getElementById('code')
    const fabric_color = document.getElementById('color')

    $('#color').val(fabric_code.value.trim())

    $('#name').on('input', () => {
      fabric_name.classList.remove('is-invalid')
      $('.bk-alert__name').addClass('d-none')
    })

    $('#color').on('input', e => {
      fabric_color.classList.remove('is-invalid')
      $('.bk-alert__color').addClass('d-none')
      fabric_code.value = $('#color').val()
    })

    $('#fabric-save').on('click', e => {

      // fabric name is null 
      if (fabric_name.value == '') {
        e.preventDefault()
        fabric_name.classList.add('is-invalid')
        $('.bk-alert__name').removeClass('d-none')
      }

      // fabric code is null 
      if (fabric_code.value == '') {
        e.preventDefault()
        fabric_color.classList.add('is-invalid')
        $('.bk-alert__color').removeClass('d-none')
      }

    })

  }
})
