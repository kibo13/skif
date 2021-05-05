$(document).ready(function () {

  const product_form = document.getElementById('product-form')

  if (product_form) {

    /* Category select */
    $('#category_id').on('change', e => {
      const slug = $('#category_id option:selected').data("slug")

      // is soft category 
      if (slug == 'soft') {
        $('#fabric-block').removeClass('d-none')
      }
      // isn't soft category
      else {
        $('#fabric-block').addClass('d-none')
      }

      $('.bk-alert').addClass('d-none')
      $('#category_id').removeClass('is-invalid')
    })

    /* Validation field 'category' */
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
