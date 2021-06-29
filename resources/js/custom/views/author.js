$(document).ready(function () {
  const auth = document.querySelector('.auth')

  // auth is active
  if (auth) {
    const mom_form = document.getElementById('author-form')

    $('.auth-btn').on('click', e => {
      mom_form.classList.add('author-hide')
      e.target.classList.add('auth-btn--vanish')
    })

  }
})


