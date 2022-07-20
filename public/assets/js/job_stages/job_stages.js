/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/js/job_stages/job_stages.js ***!
  \******************************************************/


$(document).ready(function () {
  var tableName = '#jobStagesTbl';
  var tbl = $('#jobStagesTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: jobStageUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '10%'
    }, {
      'targets': [1],
      'width': '90%',
      'orderable': false
    }],
    columns: [{
      data: function data(row) {
        return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' + row.name + '</a>';
      },
      name: 'name'
    }, // {
    //     data: function (row) {
    //         return `<div class="badge badge-light">
    //         <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
    //         </div>`;
    //     },
    //     name: 'created_at',
    // },
    {
      data: function data(row) {
        var element = document.createElement('textarea');
        element.innerHTML = row.description;
        return element.value.length > 190 ? element.value.slice(0, 190) + '...' : element.value;
      },
      name: 'description'
    }, {
      data: function data(row) {
        var url = jobStageUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#jobStagesActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addJobStageModal', function () {
    $('#addJobStageModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addJobStageForm', function (e) {
    e.preventDefault();
    var editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#job_stage_desc').val(input.replace(/"/g, ""));
    processingBtn('#addJobStageForm', '#jobStageBtnSave', 'loading');
    $.ajax({
      url: jobStageSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobStageModal').modal('hide'); // window.livewire.emit('refresh');

          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobStageForm', '#jobStageBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var jobStageId = $(event.currentTarget).attr('data-id');
    $.ajax({
      url: jobStageUrl + jobStageId + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.name;
          $('#jobStageId').val(result.data.id);
          $('#editName').val(element.value);
          element.innerHTML = result.data.description;
          quill1.root.innerHTML = element.value; // $('#editDescription').summernote('code', result.data.description);

          $('#editModal').appendTo('body').modal('show');
          ajaxCallCompleted();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    var editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content1);
    $('#edit_job_stage_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading'); // if (!checkSummerNoteEmpty('#editDescription',
    //     'Description field is required.')) {
    //     processingBtn('#editForm', '#btnEditSave');
    //     return true;
    // }

    $.ajax({
      url: jobStageUrl + $('#jobStageId').val(),
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
  });
  $(document).on('click', '.show-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var jobStageId = $(event.currentTarget).attr('data-id');
    $.ajax({
      url: jobShowUrl + '/' + jobStageId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showName').html('');
          $('#showDescription').html('');
          $('#showName').append(result.data.name);
          var element = document.createElement('textarea');
          element.innerHTML = result.data.description;

          if (element.value == '') {
            $('#showDescription').html("N/A");
          } else {
            $('#showDescription').html(element.value);
          }

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
    var jobStageId = $(event.currentTarget).attr('data-id');
    deleteItem(jobStageUrl + jobStageId, tableName, Lang.get('messages.job_stage.job_stage'));
  }); //     swal({
  //         title: Lang.get('messages.common.delete') + ' !',
  //         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job_stage.job_stage') + '" ?',
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
  //             url: jobStageUrl + jobStageId,
  //             type: 'DELETE',
  //             success: function success(result) {
  //                 if (result.success) {
  //                     // window.livewire.emit('refresh');
  //                     tbl.ajax.reload(null, false);
  //                 }
  //                 swal({
  //                     title: Lang.get('messages.common.delete') + ' !',
  //                     text: Lang.get('messages.job_stage.job_stage') + Lang.get('messages.common.has_been_deleted'),
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
  // $('#addJobStageModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#addJobStageForm', '#jobStageValidationErrorsBox');
  //     $('#jobStageDescription').summernote('code', '');
  // });
  //
  // $('#editModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#editForm', '#editValidationErrorsBox');
  // });
  //
  // $('#jobStageDescription, #editDescription').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });

  $('#addJobStageModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobStageForm', '#jobStageValidationErrorsBox');
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
  var quill = new Quill('#jobStageDescription', {
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