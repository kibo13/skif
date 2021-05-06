$(document).ready(function () {

  const home = document.getElementById('home-index')

  if (home) {

    $('.bk-home__btn').on('click', e => {
      let colors = $(`[data-color=${e.target.id}]:checked`).length
      let count = $(`[data-count=${e.target.id}]`).val()

      if (colors == 0) {
        e.preventDefault()
        alert('Необходимо выбрать цвет мебельной продукции')
      }

      if (count == '') {
        e.preventDefault()
        alert('Необходимо указать количество мебельной продукции')
      }

    })
  }
})
