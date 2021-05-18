<div
  id="bk-complete-modal"
  class="modal fade bd-example-modal-sm"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Выполнение заказа</h5>
        <button
          class="close"
          type="button"
          data-dismiss="modal"
          aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="bk-complete-form" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body">
          <input type="hidden" id="bk-complete-input" />
          <p class="m-0 p-0">
            Подтвердить выполнение заказа?
          </p>
        </div>

        <div class="modal-footer">
          <button
            class="btn btn-success mr-0"
            style="width: 50px;"
            type="submit" >
            Да
          </button>
          <button
            class="btn btn-secondary"
            style="width: 50px;"
            type="button"
            data-dismiss="modal" >
            Нет
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
