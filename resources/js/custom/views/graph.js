$(document).ready(function () {
  const graph_index = document.getElementById('graph-index')

  // graph.index is active
  if (graph_index) {
    /* Compare dates */
    $('#graph-filter').on('click', e => {
      let from = document.getElementById('graph-from')
      let to = document.getElementById('graph-to')

      if (from.value > to.value) {
        e.preventDefault()
        alert('Дата окончания не должна предшествовать дате начала')
        return false;
      }
    })
  }
})


