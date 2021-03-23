<div
  id="bk-delete-modal"
  class="modal fade bd-example-modal-sm"
  tabindex="-1"
  role="dialog"
  aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Удаление записи</h5>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="bk-delete-form" method="POST">
        @csrf @method('DELETE')

        <div class="modal-body">
          <input type="hidden" id="bk-delete-input" />
          <p class="m-0 p-0">
            Вы действительно хотите удалить выделенную запись?
          </p>
        </div>

        <div class="modal-footer">
          <button type="submit" class="bk-btn-confirm btn btn-danger mr-0">
            Да
          </button>
          <button
            type="button"
            class="bk-btn-confirm btn btn-secondary"
            data-dismiss="modal"
          >
            Нет
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
