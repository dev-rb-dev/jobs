/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************************!*\
  !*** ./resources/assets/js/admin_notice_boards/notice_boards.js ***!
  \******************************************************************/


$(document).ready(function () {
  var tableName = '#noticeBoardTbl';
  var tbl = $('#noticeBoardTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: adminNoticeBoardSaveUrl
    },
    columnDefs: [{
      'targets': [1],
      'orderable': false
    }, {
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '9%'
    }],
    columns: [{
      data: function data(row) {
        return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' + row.name + '</a>';
      },
      name: 'name'
    }, {
      data: function data(row) {
        var element = document.createElement('textarea');
        element.innerHTML = row.description; // return element.value;

        var str = element.value;
        return str.length > 200 ? str.substring(0, 200) + '.....' : str;
      },
      name: 'description'
    }, {
      data: function data(row) {
        var url = adminNoticeBoardSaveUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#adminNoticeBoardActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addNoticeBoardModal', function () {
    $('#addModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault(); // if (!checkSummerNoteEmpty('#description',
    //     'Description field is required.')) {
    //     return true;
    // }

    var editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#admin_notice_board_desc').val(input.replace(/"/g, ""));
    processingBtn('#addNewForm', '#btnSave', 'loading');
    $.ajax({
      url: adminNoticeBoardSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addModal').modal('hide');
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addNewForm', '#btnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var noticeBoardId = $(event.currentTarget).data('id');
    renderData(noticeBoardId);
  });
  $(document).on('click', '.edit-btn', function (event) {
    var noticeBoardId = $(event.currentTarget).attr('data-id');
    renderData(noticeBoardId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: adminNoticeBoardUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var notification_type = ['Candidate', 'Employer'];
          var element = document.createElement('textarea');
          element.innerHTML = result.data.name;
          $('#noticeBoardId').val(result.data.id);
          $('#editName').val(element.value);
          element.innerHTML = result.data.description;
          quill1.root.innerHTML = element.value;
          $('#notificationType').html('');

          for (var i = 0; i < 2; i++) {
            if (i == result.data.notification_type) {
              $('#notificationType').append('<option value="0" selected>' + notification_type[i] + '</option>');
            } else {
              $('#notificationType').append('<option value="1">' + notification_type[i] + '</option>');
            }
          } // $('#editDescription').
          //     summernote('code', result.data.description);


          $('#editModal').appendTo('body').modal('show');
          ajaxCallCompleted();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  };

  $(document).on('submit', '#editForm', function (event) {
    event.preventDefault(); // if (!checkSummerNoteEmpty('#editDescription',
    //     'Description field is required.')) {
    //     processingBtn('#editForm', '#btnEditSave');
    //     return true;
    // }

    var editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content1);
    $('#edit_admin_notice_board_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#noticeBoardId').val();
    $.ajax({
      url: adminNoticeBoardUrl + id,
      type: 'put',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#editModal').modal('hide'); // window.livewire.emit('refresh');

          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#editForm', '#btnEditSave');
      }
    });
  }); //

  $(document).on('click', '.show-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var noticeBoardId = $(event.currentTarget).data('id');
    $.ajax({
      url: adminNoticeBoardUrl + noticeBoardId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showName').html('');
          $('#showDescription').html('');
          $('#showName').append(result.data.name);
          var element = document.createElement('textarea');

          if (!isEmpty(result.data.description)) {
            element.innerHTML = result.data.description;
          } else {
            element.innerHTML = 'N/A';
          }

          $('#showDescription').append(element.value);
          $('#showModal').appendTo('body').modal('show');
          ajaxCallCompleted();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('click', '.delete-btn', function (event) {
    var noticeBoardId = $(event.currentTarget).attr('data-id');
    deleteItem(adminNoticeBoardSaveUrl + '/' + noticeBoardId, '#noticeBoardTbl', Lang.get('messages.admin_notice_board.notice_board'));
  }); // $('#addModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#addNewForm', '#validationErrorsBox');
  //     $('#description').summernote('code', '');
  // });
  //
  // $('#editModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#editForm', '#editValidationErrorsBox');
  // });
  //
  // $('#description, #editDescription').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });

  $('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
    quill.setContents([{
      insert: ''
    }]);
    quill1.setContents([{
      insert: ''
    }]);
  });
  $('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
  });
  var quill = new Quill('#description', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    placeholder: 'Enter description',
    theme: 'snow'
  });
  var quill1 = new Quill('#editDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    placeholder: 'Enter description',
    theme: 'snow'
  });
});
/******/ })()
;