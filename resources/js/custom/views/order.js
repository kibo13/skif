$(document).ready(function () {

  const order_form = document.getElementById('order-form')

  if (order_form) {

    /* Set up datatable */
    $('.table').dataTable({
      language: {
        searchPlaceholder: "Поиск клиента в БД",
        sProcessing: "Подождите...",
        sZeroRecords: "Записи отсутствуют.",
        sSearch: "Поиск:"
      },
      ordering: false
    });

    /* Print alert */
    const order_save = document.getElementById('order-save')
    const radios = document.querySelectorAll('.order-control__radio')
    const alert = document.querySelector('.order-alert')

    for (let radio of radios) {
      radio.onclick = e => alert.classList.add('d-none')
    }

    order_save.onclick = e => {
      const isChecked = $('.order-control__radio:checked').length

      if (isChecked == 0) {
        e.preventDefault()
        alert.classList.remove('d-none')
      }
    }
  }
})
