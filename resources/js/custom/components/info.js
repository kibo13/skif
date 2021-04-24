$(document).ready(function () {

  // info-form
  const info_form = document.querySelector('.info-form');


  // if active info-form
  if (info_form != null) {

    $(document).on("click", ".bk-btn-triangle", e => {
      let elem = e.target;
      let info = e.target.parentNode;

      // set arrow up 
      if ($(elem).hasClass("bk-btn-triangle--down")) {
        $(elem)
          .removeClass("bk-btn-triangle--down")
          .addClass("bk-btn-triangle--up");
      }

      // set arrow down 
      else {
        $(elem)
          .removeClass("bk-btn-triangle--up")
          .addClass("bk-btn-triangle--down");
      }

      // more info block hides 
      if (info.classList.contains("bk-btn-info--active")) {
        $(info).removeClass("bk-btn-info--active");
      }

      // more info block opens 
      else {
        $(info).addClass("bk-btn-info--active");
      }
    });

  }
});
