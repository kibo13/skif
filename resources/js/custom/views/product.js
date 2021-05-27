$(document).ready(function () {
  const product_form = document.getElementById('product-form')
  const product_indx = document.getElementById('product-index')

  // products.form is active
  if (product_form) {

    /* Validation for fields 'category' and 'material' */
    $('#product-save').on('click', (e) => {
      let isCategory = $('#product-category').val()
      let isMaterial = $('#product-material').val()

      if (isCategory == null) {
        e.preventDefault()
        alert('Необходимо выбрать категорию')
        return
      }

      if (isMaterial == null) {
        e.preventDefault()
        alert('Необходимо выбрать вид материала')
        return
      }
    })

    /* AJAX for get materails */
    $('#product-category').on('change', (e) => {
      let slug = $("#product-category option:selected").data("slug");

      $('#product-material').empty();

      $.ajax({
        url: '/data/materials',
        method: 'GET'
      }).done(materials => {

        $('#product-material').append(`<option disabled selected>Выберите материал</option>`);

        for (let material of materials) {
          // fabrics 
          if (slug == 'soft' && material.tom == 2) {
            $('#product-material').append(`<option value="${material.id}">${material.name}</option>`);
          }
          // plates 
          else if (slug != 'soft' && material.tom == 1) {
            $('#product-material').append(`<option value="${material.id}">${material.name} ${material.L}x${material.B}x${material.H}</option>`);
          }
        }
      })
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
