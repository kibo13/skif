$(document).ready(function () {
  const movement_index = document.getElementById('movement-index')
  const movement_form = document.getElementById('movement-form')

  // movements.index is active
  if (movement_index) {
    /* CHANGE MAIN TITLE */
    let header = document.getElementById('movement-title')

    $('.js-movement-tab').on('click', (e) => {
      let id = e.target.id

      // rest-tab
      if (id == 'rest-tab') {
        header.innerText = 'Остаток материалов'
      }
      // movement-tab
      else if (id == 'movement-tab') {
        header.innerText = 'Движение материалов'
      }
    })
  }
  // movements.form is active
  else if (movement_form) {
    /* VALIDATION FOR FIELD 'Type of transactions' */
    $('#movement-save').on('click', (e) => {
      let value = $('#movement-tot').val()

      if (value == null) {
        e.preventDefault()
        alert('Необходимо выбрать тип транзакции')
        return
      }
    })

    /* DISPLAY INFO OF ORDER */
    const order = document.getElementById('movement-order')

    $('#movement-tot').on('change', (e) => {
      let value = $('#movement-tot').val()

      // transaction = plus
      if (value == 1) {
        order.classList.add('d-none')
      }
      // transaction = minus
      else if (value == 2) {
        order.classList.remove('d-none')
      }
    })

    let value = $('#movement-tot').val()

    // transaction = plus
    if (value == 1) {
      order.classList.add('d-none')
    }
    // transaction = minus
    else if (value == 2) {
      order.classList.remove('d-none')
    }
  }
})
