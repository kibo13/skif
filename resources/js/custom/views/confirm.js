$(document).ready(function () {
  const confirm_form = document.getElementById('confirm-form')

  // confirm.form is active
  if (confirm_form) {
    /* Set up datatable */
    $('.table').dataTable({
      language: {
        searchPlaceholder: 'Поиск клиента в БД',
        sProcessing: 'Подождите...',
        sZeroRecords: 'Записи отсутствуют.',
        sSearch: 'Поиск:',
      },
      ordering: false,
    })

    /* Show\Hide alert */
    // const order_save = document.getElementById('order-save')
    // const alert = document.querySelector('.order-alert')
    // const radios = document.querySelectorAll('.order-control__radio')

    // order_save.onclick = (e) => {
    //   // check on required radiobuttons
    //   const isChecked = $('.order-control__radio:checked').length

    //   if (isChecked == 0) {
    //     e.preventDefault()
    //     alert.classList.remove('d-none')
    //   }
    // }

    // for (let radio of radios) {
    //   radio.onclick = () => alert.classList.add('d-none')
    // }
  }
})
