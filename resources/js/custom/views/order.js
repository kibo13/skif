$(document).ready(function () {
  const confirm_form = document.getElementById('confirm-form')
  const order_index = document.getElementById('order-index')

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
        depo.value = Math.ceil(total.value / 2)
        debt.value = total.value - depo.value

        $('#cost-wrapper-debt').removeClass('d-none')
        $('#cost-depo').text(depo.value + ' ₽')
        $('#cost-debt').text(debt.value + ' ₽')
      }
      // payment
      else if (pay == 2) {
        depo.value = total.value
        debt.value = 0

        $('#cost-depo').text(depo.value + ' ₽')
        $('#cost-wrapper-debt').addClass('d-none')
      }
    })

    $('.bk-confirm-pay__radio:checked').each(function () {
      let pay = this.value

      $('#cost').removeClass('d-none')

      // prepayment
      if (pay == 1) {
        depo.value = Math.ceil(total.value / 2)
        debt.value = total.value - depo.value

        $('#cost-wrapper-debt').removeClass('d-none')
        $('#cost-depo').text(depo.value + ' ₽')
        $('#cost-debt').text(debt.value + ' ₽')
      }
      // payment
      else if (pay == 2) {
        depo.value = total.value
        debt.value = 0

        $('#cost-depo').text(depo.value + ' ₽')
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

  //   if (order_form) {
  //     /* Set up datatable */
  //     $('.table').dataTable({
  //       language: {
  //         searchPlaceholder: "Поиск клиента в БД",
  //         sProcessing: "Подождите...",
  //         sZeroRecords: "Записи отсутствуют.",
  //         sSearch: "Поиск:"
  //       },
  //       ordering: false
  //     });
  //     /* Show\Hide alert */
  //     const order_save = document.getElementById('order-save')
  //     const alert = document.querySelector('.order-alert')
  //     const radios = document.querySelectorAll('.order-control__radio')
  //     order_save.onclick = e => {
  //       // check on required radiobuttons
  //       const isChecked = $('.order-control__radio:checked').length
  //       if (isChecked == 0) {
  //         e.preventDefault()
  //         alert.classList.remove('d-none')
  //       }
  //     }
  //     for (let radio of radios) {
  //       radio.onclick = () => alert.classList.add('d-none')
  //     }
  //     /* Category select */
  //     $('#category_id').on('change', e => {
  //       const category_id = $('#category_id option:selected').data('id');
  //       if (category_id) {
  //         axios({
  //           method: 'get',
  //           url: '/data/products',
  //           params: { category_id }
  //         }).then(response => {
  //           console.log(response.data)
  //           // if (response.data.rez) {//Проверяем ответ 1 или 0
  //           //   $('#defect').html(response.data.option);//Если пришел 1, то вставляем option в Неисправность
  //           // }
  //         });
  //       }
  //       // return false;
  //       // $.ajax({
  //       //   url: '/data/products',
  //       //   method: 'GET'
  //       // }).done(products => {
  //       //   for (let product of products) {
  //       //     if (category_id == product.category_id) {
  //       //       // // set branch_id to field of branch_id
  //       //       // $("#stat-branch").val(plot.branch_id);
  //       //       // // set branch_name to field of branch_name
  //       //       // $('#stat-plot').text(plot.name);
  //       //     }
  //       //   }
  //       // })
  //       // is soft category
  //       if (e.target.value == 'soft') {
  //         $('#fabric-block').removeClass('d-none')
  //       }
  //       // isn't soft category
  //       else {
  //         $('#fabric-block').addClass('d-none')
  //       }
  //     })
  //   }
})
