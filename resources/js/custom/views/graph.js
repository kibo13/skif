$(document).ready(function () {
  const graph_index = document.getElementById('graph-index')

  // graph.index is active
  if (graph_index) {
    const charts = $('.bk-chart')
    const blocks = $('.bk-charts__block--form')

    /* Select chart */
    $('.bk-charts__radio').on('click', e => {
      let value = e.target.value

      // show\hide charts 
      for (let chart of charts) {
        if (chart.dataset.id == value) {
          chart.classList.remove('d-none')
        } else {
          chart.classList.add('d-none')
        }
      }

      // show\hide blocks 
      for (let block of blocks) {
        if (block.dataset.id == value) {
          block.classList.remove('d-none')
        } else {
          block.classList.add('d-none')
        }
      }

    })

    /* Which chart is active */
    let isChartId = $('.bk-charts__radio:checked').val()

    // show\hide charts 
    for (let chart of charts) {
      if (chart.dataset.id == isChartId) {
        chart.classList.remove('d-none')
      } else {
        chart.classList.add('d-none')
      }
    }

    // show\hide blocks 
    for (let block of blocks) {
      if (block.dataset.id == isChartId) {
        block.classList.remove('d-none')
      } else {
        block.classList.add('d-none')
      }
    }

    /* Forecast run */
    const forecast_from = document.getElementById('forecast-from')
    const forecast_to = document.getElementById('forecast-to')
    $('#forecast-run').on('click', e => {
      checkingNull(forecast_from, forecast_to, e)
      compareDates(forecast_from, forecast_to, e)
      differenceDates(forecast_from, forecast_to, e)
    })

    /* Sales run */
    const sales_from = document.getElementById('sales-from')
    const sales_to = document.getElementById('sales-to')
    $('#sales-run').on('click', e => {
      checkingNull(sales_from, sales_to, e)
      compareDates(sales_from, sales_to, e)
    })

    /* Budget run */
    const budget_from = document.getElementById('budget-from')
    const budget_to = document.getElementById('budget-to')
    $('#budget-run').on('click', e => {
      checkingNull(budget_from, budget_to, e)
      compareDates(budget_from, budget_to, e)
    })

    /* Compare dates */
    function compareDates(d1, d2, link) {
      let from = new Date(d1.value)
      let to = new Date(d2.value)

      if (from >= to) {
        link.preventDefault()
        alert('Дата окончания не должна предшествовать дате начала')
        return false;
      }
    }

    /* Difference dates */
    function differenceDates(d1, d2, link) {
      let from = new Date(d1.value)
      let to = new Date(d2.value)
      let now = new Date()

      if (now >= from || now >= to) {
        link.preventDefault()
        alert(`
          Выбран некорректный диапазон дат.
          Прогноз должен формироваться на будушие периоды 
        `)
        return false;
      }
    }

    /* Checking nullable */
    function checkingNull(d1, d2, link) {
      let from = d1.value
      let to = d2.value

      if (!from || !to) {
        link.preventDefault()
        alert('Необходимо указать период')
        return false;
      }
    }
  }
})


