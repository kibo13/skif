$(document).ready(function () {
  const user_form = document.getElementById('user-form')

  if (user_form) {
    /* DISPLAY POSITION NEAR TITLE OF WORKERS */
    const work_sel = document.getElementById('worker-select')

    work_sel.onchange = (e) => {
      let position = e.target.options[work_sel.selectedIndex].dataset.position
      let fio = e.target.options[work_sel.selectedIndex].dataset.fio

      fio = fio.trim().replace(/[ .]/g, '')

      $('#user-position').text(position)
      $('#user-login').val(fio)
    }

    /* SET ROLE FOR USER */
    const role_sel = document.getElementById('role-select')
    const role = document.getElementById('user-slug')

    let checkboxs = document.querySelectorAll('.bk-checkbox');

    role_sel.onchange = (e) => {
      let val = e.target.options[role_sel.selectedIndex].value
      let attr = e.target.options[role_sel.selectedIndex].dataset.slug

      // set option:selected to field of role
      role.value = val

      // switch off checkboxs
      $(checkboxs).prop('checked', false);

      // why selected
      switch (attr) {
        case 'admin':
          $(checkboxs).prop('checked', true);
          break;

        case 'director':
          $('.home').prop('checked', true);
          $('.user_read').prop('checked', true);
          $('.user_full').prop('checked', true);
          $('.emp_read').prop('checked', true);
          $('.emp_full').prop('checked', true);
          $('.sup_read').prop('checked', true);
          $('.sup_full').prop('checked', true);
          $('.furn_read').prop('checked', true);
          $('.buy_full').prop('checked', true);
          $('.buy_read').prop('checked', true);
          break;

        case 'vendor':
          $('.home').prop('checked', true);
          $('.cust_read').prop('checked', true);
          $('.cust_full').prop('checked', true);
          $('.cat_read').prop('checked', true);
          $('.cat_full').prop('checked', true);
          $('.furn_read').prop('checked', true);
          $('.furn_full').prop('checked', true);
          $('.mat_read').prop('checked', true);
          $('.mat_full').prop('checked', true);
          $('.order_read').prop('checked', true);
          $('.order_full').prop('checked', true);
          break;

        case 'storeman':
          $('.mat_read').prop('checked', true);
          $('.mat_full').prop('checked', true);
          $('.store_read').prop('checked', true);
          $('.store_full').prop('checked', true);
          $('.statement_read').prop('checked', true);
          $('.statement_full').prop('checked', true);
          break;

        default:
          break;
      }
    }

    // cheking access to home-page
    $("#user-save").on("click", e => {
      let slug = document.getElementById("user-slug").value;
      let home = document.querySelector(".home");

      if (slug != '') {
        if (slug < 4) {
          if (!home.checked) {
            alert(`Для заданной роли необходимо указать доступ к разделу "Главная"`);
            return false;
          }
        }
      }
    });
  }
})
