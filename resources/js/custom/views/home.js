$(document).ready(function () {
  const home = document.getElementById('home-index')

  if (home) {
    /* check field 'count' == empty */
    $('.bk-home__btn').on('click', (e) => {
      let count = $(`[data-count=${e.target.id}]`).val()

      if (count == '') {
        e.preventDefault()
        alert('Необходимо указать количество мебельной продукции')
        return
      }
    })

    /* display images */
    // events on show
    $('.bk-home__radio:checked').each(function () {
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
    $('.bk-home__radio').change(function () {
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
