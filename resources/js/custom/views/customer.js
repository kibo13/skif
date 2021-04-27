$(document).ready(function () {

  const customer_form = document.getElementById('customer-form')

  if (customer_form) {

    /* Toggler */
    const radios = document.querySelectorAll('.bk-radio__toggle')

    // IIN \ BIN 
    const title_field = document.getElementById('subject-title')
    const input_field = document.getElementById('price')

    // individual's field 
    const firstname = document.getElementById('firstname')
    const lastname = document.getElementById('lastname')

    // entity's field 
    const entity = document.getElementById('name')

    // blocks 
    const ind = document.getElementById('individual-block')
    const ent = document.getElementById('entity-block')

    for (let radio of radios) {

      // check for inclusion
      if (radio.checked) {
        // individual has checked 
        if (radio.value == '1') {
          title_field.innerText = 'ИИН'
          input_field.placeholder = 'Введите ИИН'
          ind.classList.remove('d-none')
          firstname.required = true
          lastname.required = true

          ent.classList.add('d-none')
          entity.required = false
        }
        // entity has checked 
        else if (radio.value == '2') {
          title_field.innerText = 'БИН'
          input_field.placeholder = 'Введите БИН'
          ent.classList.remove('d-none')
          entity.required = true

          ind.classList.add('d-none')
          firstname.required = false
          lastname.required = false
        }
      }

      radio.onchange = e => {
        let toggler = e.target.value

        // individual has selected 
        if (toggler == '1') {
          title_field.innerText = 'ИИН'
          input_field.placeholder = 'Введите ИИН'
          ind.classList.remove('d-none')
          firstname.required = true
          lastname.required = true

          ent.classList.add('d-none')
          entity.required = false
        }
        // entity has selected 
        else if (toggler == '2') {
          title_field.innerText = 'БИН'
          input_field.placeholder = 'Введите БИН'
          ent.classList.remove('d-none')
          entity.required = true

          ind.classList.add('d-none')
          firstname.required = false
          lastname.required = false
        }
      }
    }
  }
})
