$(document).ready(function () {

  const product_form = document.getElementById('product-form')
  const product_indx = document.getElementById('product-index')

  // products.form is active 
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

  // products.index is active 
  else if (product_indx) {

    // events on show
    $('.bk-checks__checkbox:checked').each(function () {
      let radio = this.id
      let image = '.' + this.dataset.product

      $(image).each(function (i, elem) {
        if (elem.dataset.id == radio) {
          elem.classList.remove('d-none')
        } else {
          elem.classList.add('d-none')
        }
      })
    })

    // events on click
    $('.bk-checks__checkbox').change(function () {
      if (this.checked) {
        let radio = this.id
        let image = '.' + this.dataset.product

        $(image).each(function (i, elem) {
          if (elem.dataset.id == radio) {
            elem.classList.remove('d-none')
          } else {
            elem.classList.add('d-none')
          }
        })
      }
    })
  }
})
