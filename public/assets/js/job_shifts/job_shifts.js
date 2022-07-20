/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/js/job_shifts/job_shifts.js ***!
  \******************************************************/


$(document).ready(function () {
  var tableName = '#jobShiftTbl';
  var tbl = $('#jobShiftTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[1, 'desc']],
    ajax: {
      url: jobShiftUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '9%'
    }, {
      'targets': [1],
      'width': '15%'
    }],
    columns: [{
      data: function data(row) {
        return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' + row.shift + '</a>';
      },
      name: 'shift'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = jobShiftUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#jobShiftsActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addJobShiftModal', function () {
    $('#addJobShiftModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addJobShiftForm', function (e) {
    e.preventDefault();
    var editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#job_shift_desc').val(input.replace(/"/g, ''));
    processingBtn('#addJobShiftForm', '#jobShiftBtnSave', 'loading');
    $.ajax({
      url: jobShiftSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobShiftModal').modal('hide');
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobShiftForm', '#jobShiftBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var jobShiftId = $(event.currentTarget).attr('data-id');
    renderData(jobShiftId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: jobShiftUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.shift;
          $('#jobShiftId').val(result.data.id);
          $('#editShift').val(element.value);
          element.innerHTML = result.data.description;
          quill1.root.innerHTML = element.value;
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
    event.preventDefault();
    var editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content1);
    $('#edit_job_shift_desc').val(input.replace(/"/g, ''));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#jobShiftId').val();
    $.ajax({
      url: jobShiftUrl + id,
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
    var jobShiftId = $(event.currentTarget).attr('data-id');
    $.ajax({
      url: jobShiftUrl + jobShiftId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showShift').html('');
          $('#showDescription').html('');
          $('#showShift').append(result.data.shift);
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
    var jobShiftId = $(event.currentTarget).attr('data-id');
    deleteItem(jobShiftUrl + jobShiftId, tableName, Lang.get('messages.job.job_shift'));
  });
  $('#addJobShiftModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobShiftForm', '#jobShiftValidationErrorsBox');
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
  var quill = new Quill('#jobShiftDescription', {
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