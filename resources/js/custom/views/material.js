$(document).ready(function () {
  const material_form = document.getElementById('material-form')

  if (material_form) {
    const sizes = document.getElementById('material-sizes')
    const colors = document.getElementById('material-colors')

    $('#material-save').on('click', e => {
      let value = $('#material-tom').val()

      if (value == null) {
        e.preventDefault()
        alert('Необходимо выбрать тип материала')
        return
      }
    })

    $('#material-tom').on('change', e => {
      let value = $('#material-tom').val();

      // mode = wood 
      if (value == 1) {
        sizes.classList.remove('d-none')
        colors.classList.remove('d-none')
      }
      // mode == cloth 
      else if (value == 2) {
        sizes.classList.add('d-none')
        colors.classList.remove('d-none')
      }
      // mode == other 
      else if (value == 3) {
        sizes.classList.add('d-none')
        colors.classList.add('d-none')
      }
    })

    let value = $('#material-tom').val();

    // mode = wood 
    if (value == 1) {
      sizes.classList.remove('d-none')
      colors.classList.remove('d-none')
    }
    // mode == cloth 
    else if (value == 2) {
      sizes.classList.add('d-none')
      colors.classList.remove('d-none')
    }
    // mode == other 
    else if (value == 3) {
      sizes.classList.add('d-none')
      colors.classList.add('d-none')
    }

  }
})
