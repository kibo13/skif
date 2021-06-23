$(document).ready(function () {
  const confirm_form = document.getElementById('confirm-form')
  const order_index = document.getElementById('order-index')
  const order_form = document.getElementById('order-form')

  // orders.confirm is active
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
    $('#confirm-save').on('click', function (e) {
      const isCustomer = $('.bk-confirm-customer__control-radio:checked').length
      const isPayment = $('.bk-confirm-pay__radio:checked').length

      if (isCustomer == 0) {
        e.preventDefault()
        alert('Необходимо выбрать клиента')
        return
      }

      if (isPayment == 0) {
        e.preventDefault()
        alert('Необходимо выбрать способ оплаты')
        return
      }
    })

    /* Cost calculation */
    const total = document.getElementById('total')
    const depo = document.getElementById('depo')
    const debt = document.getElementById('debt')

    $('.bk-confirm-pay__radio').on('click', (e) => {
      let pay = e.target.value

      $('#cost').removeClass('d-none')

      // prepayment
      if (pay == 1) {
        depo.value = 0
        debt.value = 0

        $('#cost-wrapper-debt').removeClass('d-none')
        $('#cost-depo').text(Math.ceil(total.value / 2) + ' ₽')
        $('#cost-debt').text(total.value - Math.ceil(total.value / 2) + ' ₽')
      }
      // payment
      else if (pay == 2) {
        depo.value = 0
        debt.value = 1

        $('#cost-depo').text(total.value + ' ₽')
        $('#cost-wrapper-debt').addClass('d-none')
      }
    })

    $('.bk-confirm-pay__radio:checked').each(function () {
      let pay = this.value

      $('#cost').removeClass('d-none')

      // prepayment
      if (pay == 1) {
        depo.value = 0
        debt.value = 0

        $('#cost-wrapper-debt').removeClass('d-none')
        $('#cost-depo').text(Math.ceil(total.value / 2) + ' ₽')
        $('#cost-debt').text(total.value - Math.ceil(total.value / 2) + ' ₽')
      }
      // payment
      else if (pay == 2) {
        depo.value = 0
        debt.value = 1

        $('#cost-depo').text(total.value + ' ₽')
        $('#cost-wrapper-debt').addClass('d-none')
      }
    })
  }
  // orders.index is active
  else if (order_index) {
    /* Toggler for order control */
    $('.bk-inspect-toggler').on('click', (e) => {
      let elem = e.target

      if ($(elem).hasClass('bk-inspect-toggler--hide')) {
        $(elem)
          .removeClass('bk-inspect-toggler--hide')
          .addClass('bk-inspect-toggler--show')
      } else {
        $(elem)
          .removeClass('bk-inspect-toggler--show')
          .addClass('bk-inspect-toggler--hide')
      }

      $('.bk-inspect-list')
        .stop()
        .slideToggle('normal', function () {
          $('.d-none').toggleClass('d-none')
        })
    })
  }
  // orders.form is active
  else if (order_form) {

    /* Change state */
    $('#order-save').on('click', e => {
      let date_on = new Date($('#date_on').val())
      let date_off = new Date($('#date_off').val())
      let date_diff = new Date(date_off - date_on) / 1000 / 60 / 60 / 24;
      let state = document.getElementById('state')

      if (date_diff < 14) {
        e.preventDefault()
        alert('Срок готовности заказа должен составлять мин 14 дней')
        return false;
      } else {
        state.value = 2
      }
    })

    /* Show/Hide debt */
    const debt_block = document.getElementById('debt-block')

    if ($('#depo').is(':checked')) {
      let payment = $('#depo').attr('data-pay')
      if (payment == 1) {
        debt_block.classList.remove('d-none')
      }
    }

    $('#depo').on('click', function (e) {
      let payment = $('#depo').attr('data-pay')

      if (payment == 1) {
        if ($(this).is(':checked')) {
          debt_block.classList.remove('d-none')
        } else {
          debt_block.classList.add('d-none')
        }
      }

    })
  }
})
