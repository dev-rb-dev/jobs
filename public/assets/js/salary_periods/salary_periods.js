/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************************!*\
  !*** ./resources/assets/js/salary_periods/salary_periods.js ***!
  \**************************************************************/


$(document).ready(function () {
  var tableName = '#salaryPeriodTbl';
  var tbl = $('#salaryPeriodTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: salaryPeriodUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '5%'
    }, {
      'targets': [1],
      'width': '15%'
    }],
    columns: [{
      data: function data(row) {
        return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' + row.period + '</a>';
      },
      name: 'period'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = salaryPeriodUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#salaryPeriod', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addSalaryPeriodModal', function () {
    $('#addSalaryPeriodModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addSalaryPeriodForm', function (e) {
    e.preventDefault(); // if (!checkSummerNoteEmpty('#salaryPeriodDescription',
    //     'Description field is required.', 1)) {
    //     return true;
    // }

    var editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#salary_period_desc').val(input.replace(/"/g, ""));
    processingBtn('#addSalaryPeriodForm', '#salaryPeriodBtnSave', 'loading');
    $.ajax({
      url: salaryPeriodUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addSalaryPeriodModal').modal('hide');
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addSalaryPeriodForm', '#salaryPeriodBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    var salaryPeriodId = $(event.currentTarget).attr('data-id');
    renderData(salaryPeriodId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: salaryPeriodUrl + '/' + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.period;
          $('#salaryPeriodId').val(result.data.id);
          $('#editSalaryPeriod').val(element.value);
          element.innerHTML = result.data.description;
          quill1.root.innerHTML = element.value; // $('#editDescription').val(result.data.description);
          // $('#editDescription').summernote('code', result.data.description);

          $('#editModal').modal('show'); // ajaxCallCompleted();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  };

  $(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    var editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content1);
    $('#edit_salary_period_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#salaryPeriodId').val();
    $.ajax({
      url: salaryPeriodUrl + '/' + id,
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
    var salaryPeriodId = $(event.currentTarget).attr('data-id');
    $.ajax({
      url: salaryPeriodUrl + '/' + salaryPeriodId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showSalaryPeriod').html('');
          $('#showDescription').html('');
          $('#showSalaryPeriod').append(result.data.period);
          var element = document.createElement('textarea');
          element.innerHTML = !isEmpty(result.data.description) ? result.data.description : 'N/A';
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
    var salaryPeriodId = $(event.currentTarget).attr('data-id');
    deleteItem(salaryPeriodUrl + '/' + salaryPeriodId, tableName, Lang.get('Salary Period'));
  }); //     swal({
  //         title: Lang.get('messages.common.delete') + ' !',
  //         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('Salary Period') + '" ?',
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
  //             url: salaryPeriodUrl + '/' + salaryPeriodId,
  //             type: 'DELETE',
  //             success: function success(result) {
  //                 if (result.success) {
  //                     tbl.ajax.reload(null, false);
  //                 }
  //
  //                 swal({
  //                     title: Lang.get('messages.common.deleted') + ' !',
  //                     text: Lang.get('Salary Period') + Lang.get('messages.common.has_been_deleted'),
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

  $('#addSalaryPeriodModal').on('hidden.bs.modal', function () {
    resetModalForm('#addSalaryPeriodForm', '#salaryPeriodValidationErrorsBox');
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
  var quill = new Quill('#salaryPeriodDescription', {
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