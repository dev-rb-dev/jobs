/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/assets/js/job_tags/job_tags.js ***!
  \**************************************************/


$(document).ready(function () {
  var tableName = '#jobTagTbl';
  var tbl = $('#jobTagTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: jobTagUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '5%'
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

        if (!str.length) {
          return 'N/A';
        }

        if (str.length > 200) {
          str = str.substring(0, 200);
          return str + '.....';
        } else {
          return str;
        }
      },
      name: 'description'
    }, {
      data: function data(row) {
        var url = jobTagUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#JobsTagsActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addJobTagModal', function () {
    $('#addJobTagModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addJobTagForm', function (e) {
    e.preventDefault();
    var editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#job_tag_desc').val(input.replace(/"/g, ""));
    processingBtn('#addJobTagForm', '#jobTagBtnSave', 'loading'); // if (!checkSummerNoteEmpty('#jobTagDescription',
    //     'Description field is required.')) {
    //     processingBtn('#addJobTagForm', '#jobTagBtnSave');
    //     return true;
    // }

    $.ajax({
      url: jobTagSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobTagModal').modal('hide'); // window.livewire.emit('refresh');

          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobTagForm', '#jobTagBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var jobTagId = $(event.currentTarget).attr('data-id');
    renderData(jobTagId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: jobTagUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.name;
          $('#jobTagId').val(result.data.id);
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
    event.preventDefault();
    var editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content1);
    $('#edit_job_tag_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading'); // if (!checkSummerNoteEmpty('#editDescription',
    //     'Description field is required.')) {
    //     processingBtn('#editForm', '#btnEditSave');
    //     return true;
    // }

    var id = $('#jobTagId').val();
    $.ajax({
      url: jobTagUrl + id,
      type: 'put',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#editModal').modal('hide');
          tbl.ajax.reload(null, false); // window.livewire.emit('refresh');
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
    var jobTagId = $(event.currentTarget).attr('data-id');
    $.ajax({
      url: jobTagUrl + jobTagId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showName').html('');
          $('#showDescription').html('');
          $('#showName').append(result.data.name);
          if (!isEmpty(result.data.description) ? $('#showDescription').append(result.data.description) : $('#showDescription').append('N/A')) $('#showModal').appendTo('body').modal('show');
          ajaxCallCompleted();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('click', '.delete-btn', function (event) {
    var jobTagId = $(event.currentTarget).attr('data-id');
    deleteItem(jobTagUrl + jobTagId, tableName, Lang.get('messages.job_tag.job_tag'));
  }); //
  // $('#addJobTagModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#addJobTagForm', '#jobTagValidationErrorsBox');
  //     $('#jobTagDescription').summernote('code', '');
  // });
  //
  // $('#editModal').on('hidden.bs.modal', function () {
  //     resetModalForm('#editForm', '#editValidationErrorsBox');
  // });
  //
  // $('#jobTagDescription, #editDescription').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });

  $('#addJobTagModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobTagForm', '#jobTagValidationErrorsBox');
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
  var quill = new Quill('#jobTagDescription', {
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