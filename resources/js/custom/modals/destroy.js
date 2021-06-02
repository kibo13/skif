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

      case 'customer':
        $('#bk-delete-form').attr('action', '/customers/' + data_id)
        break

      case 'supplier':
        $('#bk-delete-form').attr('action', '/suppliers/' + data_id)
        break

      case 'category':
        $('#bk-delete-form').attr('action', '/categories/' + data_id)
        break

      case 'material':
        $('#bk-delete-form').attr('action', '/materials/' + data_id)
        break

      case 'color':
        $('#bk-delete-form').attr('action', '/colors/' + data_id)
        break

      case 'product':
        $('#bk-delete-form').attr('action', '/products/' + data_id)
        break

      case 'top':
        $('#bk-delete-form').attr(
          'action',
          `/products/${data_pr}/tops/${data_id}`
        )
        break

      case 'order':
        $('#bk-delete-form').attr('action', '/orders/' + data_id)
        break

      case 'movement':
        $('#bk-delete-form').attr('action', '/movements/' + data_id)
        break

      case 'mom':
        $('#bk-delete-form').attr(
          'action',
          `/movements/${data_pr}/materials/${data_id}`
        )
        break

      case 'purchase':
        $('#bk-delete-form').attr('action', '/purchases/' + data_id)
        break

      case 'pom':
        $('#bk-delete-form').attr(
          'action',
          `/purchases/${data_pr}/materials/${data_id}`
        )
        break
    }
  })
})
