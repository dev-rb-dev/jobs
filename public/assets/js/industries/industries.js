/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/js/industries/industries.js ***!
  \******************************************************/


$(document).ready(function () {
  // $('#description, #editDescription').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });
  var tableName = '#industriesTbl';
  var tbl = $('#industriesTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: industryUrl
    },
    columnDefs: [{
      'targets': [0],
      'width': '20%'
    }, {
      'targets': [1],
      'width': '50%',
      'orderable': false
    }, {
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '8%'
    }],
    columns: [{
      data: function data(row) {
        return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' + row.name + '</a>';
      },
      name: 'name'
    }, {
      data: function data(row) {
        var element = document.createElement('textarea');
        element.innerHTML = row.description;
        return element.value.length > 190 ? element.value.slice(0, 190) + '...' : element.value;
      },
      name: 'description'
    }, {
      data: function data(row) {
        var data = [{
          'id': row.id
        }];
        return prepareTemplateRender('#industries', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addIndustryModal', function () {
    $('#addModal').appendTo('body').modal('show');
  }); // $('#addModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#addNewForm', '#validationErrorsBox');
  //     $('#description').summernote('code', '');
  // });
  // $('#editModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#editForm', '#editValidationErrorsBox');
  // });
  //

  $(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault(); // if (!checkSummerNoteEmpty('#description',
    //     'Description field is required.', 1)) {
    //     return true;
    // }

    var editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#industry_desc').val(input.replace(/"/g, ""));
    processingBtn('#addNewForm', '#btnSave', 'loading');
    $.ajax({
      url: industrySaveUrl,
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
    var industryId = $(event.currentTarget).data('id');
    renderData(industryId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: industryUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.name;
          $('#industryId').val(result.data.id);
          $('#editName').val(element.value);
          element.innerHTML = result.data.description;
          quill1.root.innerHTML = element.value; // $('#editDescription').
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
    //     'Description field is required.', 1)) {
    //     return true;
    // }

    var editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content1);
    $('#edit_industry_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#industryId').val();
    $.ajax({
      url: industryUrl + id,
      type: 'put',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#editModal').modal('hide');
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
  });
  $(document).on('click', '.show-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var industryId = $(event.currentTarget).data('id');
    $.ajax({
      url: industryUrl + industryId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showName').html('');
          $('#showDescription').html('');
          $('#showName').append(result.data.name);
          var element = document.createElement('textarea');
          element.innerHTML = result.data.description;
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
    var industryId = $(event.currentTarget).attr('data-id');
    deleteItem(industryUrl + industryId, tableName, Lang.get('messages.company.industry'));
  }); //     swal({
  //         title: Lang.get('messages.common.delete') + ' !',
  //         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.company.industry') + '" ?',
  //         type: 'warning',
  //         showCancelButton: true,
  //         closeOnConfirm: false,
  //         showLoaderOnConfirm: true,
  //         confirmButtonColor: '#6777ef',
  //         cancelButtonColor: '#d33',
  //         cancelButtonText: Lang.get('messages.common.no'),
  //         confirmButtonText: Lang.get('messages.common.yes')
  //     }, function () {
  //         $.ajax({
  //             url: industryUrl + industryId,
  //             type: 'DELETE',
  //             success: function success(result) {
  //                 if (result.success) {
  //                     tbl.ajax.reload(null, false);
  //                 }
  //                 swal({
  //                     title: Lang.get('messages.common.deleted') + ' !',
  //                     text: Lang.get('messages.company.industry') + Lang.get('messages.common.has_been_deleted'),
  //                     type: 'success',
  //                     confirmButtonColor: '#6777ef',
  //                     timer: 2000
  //                 });
  //             },
  //             error: function error(data) {
  //                 swal({
  //                     title: '',
  //                     text: data.responseJSON.message,
  //                     type: 'error',
  //                     confirmButtonColor: '#6777ef',
  //                     timer: 2000
  //                 });
  //             }
  //         });
  //     });
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
  var quill = new Quill('#industryDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    placeholder: 'Enter Description',
    theme: 'snow'
  });
  var quill1 = new Quill('#editDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    placeholder: 'Enter Description',
    theme: 'snow'
  });
});
/******/ })()
;