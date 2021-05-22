$(document).ready(function () {
  $(document).on('click', '.bk-btn-actions__link--alarm', (e) => {
    let data_tname = $(e.target).data('table-name')
    let data_id = $(e.target).data('id')

    // cheking 
    // console.log(data_id)

    switch (data_tname) {
      case 'order':
        $('#bk-alert-form').attr('action', '/orders/alert/' + data_id)
        break;

      default:
        break;
    }
  })
})
