$(document).ready(function () {
  const rest_index = document.getElementById('rest-index')

  // movements.rests is active
  if (rest_index) {
    /* Set up datatable */
    $('.table').dataTable({
      language: {
        searchPlaceholder: 'Поиск',
        sProcessing: 'Подождите...',
        sZeroRecords: 'Записи отсутствуют.',
        sSearch: 'Поиск:',
      },
      ordering: false,
    })

  }

})
