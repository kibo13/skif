<div id="repo-sale" class="d-none">
  <form action="{{ route('repo.sales') }}" method="GET">

    <!-- /.duration -->
    <h6 class="bk-form__title">Период</h6>
    <div class="bk-form__duration mb-3">
      <input 
        class="form-control bk-form__input"
        id="sale-from" 
        type="date"
        name="date_from"
        required>
      <input 
        class="form-control bk-form__input"
        id="sale-to" 
        type="date"
        name="date_to"
        required>
    </div>

    <button 
      class="btn btn-sm btn-outline-primary" 
      style="width: 80px;"
      id="sale-out" >
      Отчет
    </button>
  </form>
</div>