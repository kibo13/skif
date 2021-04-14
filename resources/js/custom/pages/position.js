$(document).ready(function () {

  const position_form = document.getElementById('position-form')

  if (position_form) {
    const salary_field = document.getElementById('salary')

    salary_field.oninput = e => {
      let value = e.target.value
      e.target.value = value.replace(/\D/g, '')
    }
  }

});
