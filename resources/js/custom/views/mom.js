$(document).ready(function () {
  const mom_form = document.getElementById('mom-form')

  // moms.form is active
  if (mom_form) {
    const colors = document.getElementById('mom-color')

    /* SHOW\HIDE FIELD 'COLORS' FOR CREATE */
    $('#mom-material').on('change', e => {
      let tom = $('#mom-material option:selected').data('tom')
      let material_id = $('#mom-material').val()

      if (tom <= 2) {
        colors.classList.remove('d-none')

        $('.js-mc').each(function (i, elem) {
          let color_id = elem.dataset.id

          if (material_id == color_id) {
            elem.classList.remove('d-none')
          } else {
            elem.classList.add('d-none')
          }
        })
      } else {
        colors.classList.add('d-none')
      }
    })

    /* SHOW\HIDE FIELD 'COLORS' FOR EDIT */
    let tom = $('#mom-material option:selected').data('tom')
    let material_id = $('#mom-material').val()

    if (tom <= 2) {
      colors.classList.remove('d-none')

      $('.js-mc').each(function (i, elem) {
        let color_id = elem.dataset.id

        if (material_id == color_id) {
          elem.classList.remove('d-none')
        } else {
          elem.classList.add('d-none')
        }
      })
    } else {
      colors.classList.add('d-none')
    }

    /* VALIDATION FOR FIELD 'MATERIAL' */
    $('#mom-save').on('click', e => {
      let value = $('#mom-material').val()

      if (value == null) {
        e.preventDefault()
        alert('Необходимо выбрать материал')
        return
      }
    })

  }

})
