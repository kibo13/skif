$(document).ready(function () {
  // validation-form
  const validation_form = document.querySelector('.valid-form')

  // if active validation-form
  if (validation_form != null) {
    /* general validation */
    const validations = document.querySelectorAll('.bk-valid')

    for (let validation of validations) {
      // validation for fields 'price'
      if (validation.id == 'price' || validation.id == 'index' || validation.id == 'code') {
        validation.oninput = (e) => {
          e.target.value = e.target.value.replace(/\D/g, '')
        }
      }

      // validation for fields 'phone'
      else if (validation.id == 'phone') {
        validation.oninput = (e) => {
          e.target.value = e.target.value.replace(/[^0-9 ()+-]/g, '')
        }
      }

      // validation for other fields
      else {
        validation.oninput = (e) => {
          e.target.value = e.target.value.replace(/[^а-яё ]/gi, '')
        }
      }
    }

    /* special validation */
    $('.bk-home__input').on('input', function () {
      this.value = this.value.replace(/^0|[^\d]/g, '')
    })
  }
})
