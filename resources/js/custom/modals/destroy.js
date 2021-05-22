$(document).ready(function () {
  $(document).on('click', '.bk-btn-actions__link--delete', (e) => {
    let data_id = $(e.target).data('id')
    let data_pr = $(e.target).data('product')
    let data_tname = $(e.target).data('table-name')

    // cheking 
    // console.log(data_id)

    switch (data_tname) {
      case 'position':
        $('#bk-delete-form').attr('action', '/positions/' + data_id)
        break

      case 'worker':
        $('#bk-delete-form').attr('action', '/workers/' + data_id)
        break

      case 'user':
        $('#bk-delete-form').attr('action', '/users/' + data_id)
        break

      case 'category':
        $('#bk-delete-form').attr('action', '/categories/' + data_id)
        break

      case 'customer':
        $('#bk-delete-form').attr('action', '/customers/' + data_id)
        break

      case 'fabric':
        $('#bk-delete-form').attr('action', '/fabrics/' + data_id)
        break

      case 'plate':
        $('#bk-delete-form').attr('action', '/plates/' + data_id)
        break

      case 'product':
        $('#bk-delete-form').attr('action', '/products/' + data_id)
        break

      case 'type':
        $('#bk-delete-form').attr(
          'action',
          `/products/${data_pr}/types/${data_id}`
        )
        break

      case 'order':
        $('#bk-delete-form').attr('action', '/orders/' + data_id)
        break

      default:
        break
    }
  })
})
