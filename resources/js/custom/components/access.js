$(document).ready(function () {
  // access-form
  const access_form = document.querySelector('.access-form')

  // if active image-form
  if (access_form != null) {
    const access_toggler = document.getElementById('access-toggler')
    const access_field = document.getElementById('access-field')

    access_toggler.onclick = (e) => {
      if (access_toggler.checked) {
        access_field.classList.remove('bk-access')
      } else {
        access_field.classList.add('bk-access')
      }
    }
  }
})
