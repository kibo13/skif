$(document).ready(function () {

  // sidebar collapse 
  $('#sidebarToggler').on('click', function () {
    $('#sidebar').toggleClass('sidebar-active');
    $(this).toggleClass('active');
  });

  $('#navbarToggler').on('click', function () {
    $(this).toggleClass('active');
  });

  // logout
  $("#logout-link").on("click", function (e) {
    e.preventDefault();
    $("#logout-form").submit();
  });

});