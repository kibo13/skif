$(document).ready(function () {
  const supplier_form = document.getElementById('supplier-form')

  if (supplier_form) {
    /* FIO */
    const supplier_save = document.getElementById('supplier-save')
    const fio = document.getElementById('fio')

    supplier_save.onclick = (e) => {
      let F = document.getElementById('lastname').value.trim()
      let I = document.getElementById('firstname').value.trim().substr(0, 1)
      let O = document.getElementById('surname').value.trim().substr(0, 1)

      fio.value = `${F} ${I}.${O}.`
    }
  }
})
