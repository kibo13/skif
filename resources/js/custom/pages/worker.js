$(document).ready(function () {

  const worker_form = document.getElementById('worker-form')

  if (worker_form) {

    /* VALIDATION */
    const validations = document.querySelectorAll('.bk-valid')

    for (let validation of validations) {

      // validation for field 'phone'
      if (validation.id == 'phone') {
        validation.oninput = e => {
          e.target.value = e.target.value.replace(/[^0-9+-]/g, '')
        }
      }

      // validation for other fields 
      else {
        validation.oninput = e => {
          e.target.value = e.target.value.replace(/[^а-яё]/ig, '')
        }
      }
    }

    /* FIO */
    const worker_save = document.getElementById('worker-save')
    const fio = document.getElementById('fio')

    worker_save.onclick = e => {
      let F = document.getElementById('lastname').value.trim()
      let I = document.getElementById('firstname').value.trim().substr(0, 1)
      let O = document.getElementById('surname').value.trim().substr(0, 1)

      fio.value = `${F} ${I}.${O}.`
    }
  }
})
