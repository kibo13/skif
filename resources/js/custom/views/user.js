$(document).ready(function () {

  const user_form = document.getElementById('user-form')

  if (user_form) {

    /* DISPLAY POSITION NEAR TITLE OF WORKERS */
    const work_sel = document.getElementById('worker-select')

    work_sel.onchange = e => {
      let position = e.target.options[work_sel.selectedIndex].dataset.position;
      let fio = e.target.options[work_sel.selectedIndex].dataset.fio;

      fio = fio.trim().replace(/[ .]/g, '')

      $('#user-position').text(position)
      $('#user-login input').val(fio)
    }

    /* ACCESS TO LOGIN */
    const login_toggler = document.getElementById('access-login')
    const login_field = document.getElementById('user-login')

    login_toggler.onclick = e => {
      if (login_toggler.checked) {
        login_field.classList.remove('bk-access')
      } else {
        login_field.classList.add('bk-access')
      }
    }

    /* SET ROLE FOR USER */
    const role_sel = document.getElementById('role-select')
    const role = document.getElementById("user-slug")

    role_sel.onchange = e => {
      let val = e.target.options[role_sel.selectedIndex].value;
      let attr = e.target.options[role_sel.selectedIndex].dataset.slug;

      role.value = val;
    }
  }
})
