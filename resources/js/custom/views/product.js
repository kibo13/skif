$(document).ready(function () {

  const product_form = document.getElementById('product-form')

  if (product_form) {
    /* Validation field 'category' */
    $('#category_id').on('change', e => {
      $('.bk-alert').addClass('d-none')
      $('#category_id').removeClass('is-invalid')
    })

    $('#product-save').on('click', e => {
      const isChecked = $('#category_id').val()

      if (isChecked == null) {
        e.preventDefault()
        $('.bk-alert').removeClass('d-none')
        $('#category_id').addClass('is-invalid')
      }
    })
  }
})
