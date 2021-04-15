$(document).ready(function () {

  const worker_form = document.getElementById('worker-form')

  if (worker_form) {

    // selectors 
    const role_sel = document.getElementById('role-select')
    const position_sel = document.getElementById('position-select')

    // fields 
    const first_name = document.getElementById('firstname')
    const last_name = document.getElementById('lastname')
    const surname = document.getElementById('surname')
    const phone = document.getElementById('phone')
    const role = document.getElementById("user-slug")

    first_name.oninput = e => {
      e.target.value = e.target.value.replace(/[^а-яё]/ig, '')
    }

    last_name.oninput = e => {
      e.target.value = e.target.value.replace(/[^а-яё]/ig, '')
    }

    surname.oninput = e => {
      e.target.value = e.target.value.replace(/[^а-яё]/ig, '')
    }

    phone.oninput = e => {
      e.target.value = e.target.value.replace(/[^0-9+-]/g, '')
    }

    role_sel.onchange = e => {
      let val = e.target.options[role_sel.selectedIndex].value;
      let attr = e.target.options[role_sel.selectedIndex].dataset.slug;

      role.value = val;
    }

    position_sel.onchange = e => {
      let salary = e.target.options[position_sel.selectedIndex].dataset.salary;

      // $('#position-salary').text(`Оклад = ${salary}`);
    }


  }

});
