$(document).ready(function () {
  const confirm_form = document.getElementById('confirm-form')

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

    /* Insert button 'New customer' */
    // const block_search = $('.dataTables_filter label')
    // const btn_customer = document.createElement('button')

    // btn_customer.classList.add('btn')
    // btn_customer.classList.add('btn-outline-primary')
    // btn_customer.classList.add('bk-confirm-append')
    // btn_customer.innerText = 'Новый клиент'
    // block_search.append(btn_customer)

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

    /* Category select */
    // $('#category_id').on('change', (e) => {
    //   const category_id = $('#category_id option:selected').data('id')

    //   if (category_id) {
    //     axios({
    //       method: 'get',
    //       url: '/data/products',
    //       params: {category_id},
    //     }).then((response) => {
    //       console.log(response.data)
    //       // if (response.data.rez) {//Проверяем ответ 1 или 0
    //       //   $('#defect').html(response.data.option);//Если пришел 1, то вставляем option в Неисправность
    //       // }
    //     })
    //   }
    // return false;

    // $.ajax({
    //   url: '/data/products',
    //   method: 'GET'
    // }).done(products => {
    //   for (let product of products) {
    //     if (category_id == product.category_id) {

    //       // // set branch_id to field of branch_id
    //       // $("#stat-branch").val(plot.branch_id);

    //       // // set branch_name to field of branch_name
    //       // $('#stat-plot').text(plot.name);
    //     }
    //   }
    // })

    // is soft category
    // if (e.target.value == 'soft') {
    //   $('#fabric-block').removeClass('d-none')
    // }
    // // isn't soft category
    // else {
    //   $('#fabric-block').addClass('d-none')
    // }
    // })
  }
})
