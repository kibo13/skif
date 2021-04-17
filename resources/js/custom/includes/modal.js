$(document).ready(function () {

  $('.bk-btn-del').on('click', function (e) {

    var data_id = $(e.target).data('id');
    var data_tname = $(e.target).data('table-name');

    // console.log(data_id);

    switch (data_tname) {

      case 'position':
        $('#bk-delete-form').attr('action', '/positions/' + data_id);
        break;

      case 'worker':
        $('#bk-delete-form').attr('action', '/workers/' + data_id);
        break;

      case 'user':
        $('#bk-delete-form').attr('action', '/users/' + data_id);
        break;

      case 'category':
        $('#bk-delete-form').attr('action', '/categories/' + data_id);
        break;

      case 'product':
        $('#bk-delete-form').attr('action', '/products/' + data_id);
        break;

      default:
        break;

      // START namespace "pts" 	
      // case 'organization':
      //   $('#bk-delete-form').attr('action', '/organizations/' + data_id);
      //   break;

      // case 'address':
      //   $('#bk-delete-form').attr('action', '/addresses/' + data_id);
      //   break;

      // case 'street':
      //   $('#bk-delete-form').attr('action', '/streets/' + data_id);
      //   break;

      // case 'defect':
      //   $('#bk-delete-form').attr('action', '/defects/' + data_id);
      //   break;
      // END namespace "pts" 

      // START namespace "hh" 	
      // case 'worker':
      //   $('#bk-delete-form').attr('action', '/workers/' + data_id);
      //   break;

      // case 'branch':
      //   $('#bk-delete-form').attr('action', '/branches/' + data_id);
      //   break;


      // END namespace "hh"

      // START namespace "disp" 
      // case 'plot':
      //   $('#bk-delete-form').attr('action', '/plots/' + data_id);
      //   break;

      // case 'statement':
      //   $('#bk-delete-form').attr('action', '/statements/' + data_id);
      //   break;

      // case 'log':
      //   $('#bk-delete-form').attr('action', '/logs/' + data_id);
      //   break;
      // END namespace "disp"

      // START namespace "oas" 
      // case 'job':
      //   $('#bk-delete-form').attr('action', '/jobs/' + data_id);
      //   break;

      // case 'brief':
      //   $('#bk-delete-form').attr('action', '/briefs/' + data_id);
      //   break;
      // END namespace "oas" 

      // START namespace "audit" 				
      // case 'promiser':
      //   $('#bk-delete-form').attr('action', '/promisers/' + data_id);
      //   break;
      // END namespace "audit"

      // START namespace "admin" 
      // case 'user':
      //   $('#bk-delete-form').attr('action', '/admin/users/' + data_id);
      //   break;
      // END namespace "admin" 
    }

  });
});
