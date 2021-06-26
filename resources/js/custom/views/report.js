$(document).ready(function () {
  const repo_index = document.getElementById('report-index')

  // reports.index is active
  if (repo_index) {

    /* Selecting a report */
    $('#repo-menu').on('change', (e) => {
      let report = $('#repo-menu option:selected').val()

      // sales report is selected 
      if (report == 1) {
        $('#repo-sale').removeClass('d-none')
        $('#repo-budget').addClass('d-none')
      }
      // budget report is selected 
      else {
        $('#repo-budget').removeClass('d-none')
        $('#repo-sale').addClass('d-none')
      }
    })

    /* Actions for report 'Sale' */
    const sale_from = document.getElementById('sale-from')
    const sale_to = document.getElementById('sale-to')

    $('#sale-out').on('click', e => {
      compareDates(sale_from, sale_to, e);
    })

    /* Actions for report 'Budget' */
    const budget_from = document.getElementById('budget-from')
    const budget_to = document.getElementById('budget-to')

    $('#budget-out').on('click', e => {
      compareDates(budget_from, budget_to, e);
    })

    /* Compare dates */
    function compareDates(d1, d2, link) {
      let from = new Date(d1.value);
      let to = new Date(d2.value);

      if (from >= to) {
        link.preventDefault()
        alert('Дата окончания не должна предшествовать дате начала')
        return false;
      }
    }

  }
})
