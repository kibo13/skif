$(document).ready(function () {
  const deal_index = document.getElementById('deal-index')
  const deal_form = document.getElementById('deal-form')

  // deals.form is active
  if (deal_form) {

    /* Validation for field 'Supplier' */
    $('#deal-save').on('click', e => {
      let isSupplier = $('#supplier_id').val()
      let isPay = $('#pay').val()
      let date = $('#date_off').val()
      let state = document.getElementById('state')

      state.value = (date == '') ? 1 : 2

      if (isSupplier == null) {
        e.preventDefault()
        alert('Необходимо выбрать поставщика')
        return
      }

      if (isPay == null) {
        e.preventDefault()
        alert('Необходимо выбрать способ оплаты')
        return
      }
    })

    /* Drop total */
    $('#count').on('input', e => {
      $('#pay option:disabled').prop('selected', true);
      $('#depo-block').addClass('d-none')
      $('#debt-block').addClass('d-none')
    })

    /* Calculating depo and debt */
    const total = document.getElementById('count')

    $('#pay').on('change', (e) => {
      let option = $('#pay option:selected').val()
      let isSum = total.value.trim()

      if (isSum.length < 4) {
        $('#pay option:disabled').prop('selected', true);
        alert(`
          Необходимо указать итоговую сумму. 
          Число должно состоять мин. из 4 цифр.
        `)
        return
      }

      else {
        // prepay 
        if (option == 1) {
          $('#depo-block').removeClass('d-none')
          $('#debt-block').removeClass('d-none')
          $('#deal-depo').text(Math.ceil(total.value / 2) + ' ₽')
          $('#deal-debt').text(total.value - Math.ceil(total.value / 2) + ' ₽')
        }
        // pay 
        else {
          $('#depo-block').removeClass('d-none')
          $('#debt-block').addClass('d-none')
          $('#deal-depo').text(total.value + ' ₽')
          $('#deal-debt').text('0 ₽')
        }
      }
    })

    /* deal-form is active */
    let pay = $('#pay option:selected').val()

    if (pay == 1) {
      $('#depo-block').removeClass('d-none')
      $('#debt-block').removeClass('d-none')
      $('#deal-depo').text(Math.ceil(total.value / 2) + ' ₽')
      $('#deal-debt').text(total.value - Math.ceil(total.value / 2) + ' ₽')
    }
    // pay 
    else if (pay == 2) {
      $('#depo-block').removeClass('d-none')
      $('#debt-block').addClass('d-none')
      $('#deal-depo').text(total.value + ' ₽')
      $('#deal-debt').text('0 ₽')
    }

  }
  // deals.index is active
  else if (deal_index) {
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
})
