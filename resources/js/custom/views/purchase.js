$(document).ready(function () {
  const purchase_form = document.getElementById('purchase-form')

  // purchases.form is active
  if (purchase_form) {
    /* VAIDATION FOR FIELDS 'COUNT' */
    $('.bk-purchases-form__input').on('input', function () {
      this.value = this.value.replace(/^0|[^\d]/g, '')
    })
  }
})
