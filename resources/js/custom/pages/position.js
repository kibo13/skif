$(document).ready(function () {

  const position_form = document.getElementById('position-form')

  if (position_form) {

    /* VALIDATION */
    const validations = document.querySelectorAll('.bk-valid')

    for (let validation of validations) {

      // validation for field 'salary'
      if (validation.id == 'salary') {
        validation.oninput = e => {
          e.target.value = e.target.value.replace(/\D/g, '')
        }
      }

      // validation for other fields 
      else {
        validation.oninput = e => {
          e.target.value = e.target.value.replace(/[^а-яё]/ig, '')
        }
      }
    }
  }
})
