$(document).ready(function () {

  // sidebar collapse 
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    $(this).toggleClass('active');
  });

  // logout
  $("#logout-link").on("click", function (e) {
    e.preventDefault();
    $("#logout-form").submit();
  });

});