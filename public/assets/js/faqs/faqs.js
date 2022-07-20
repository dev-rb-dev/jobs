/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/faqs/faqs.js ***!
  \******************************************/


$(document).ready(function () {
  var tableName = '#faqsTbl';
  var tbl = $('#faqsTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: faqUrl
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
        return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' + row.title + '</a>';
      },
      name: 'title'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = faqUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#faqActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addFaqModal', function () {
    $('#addModal').appendTo('body').modal('show');
  });
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
    $('#faqs_desc').val(input.replace(/"/g, ""));
    processingBtn('#addNewForm', '#btnSave', 'loading');
    $.ajax({
      url: faqSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addModal').modal('hide'); // window.livewire.emit('refresh');

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
    var faqId = $(event.currentTarget).data('id');
    renderData(faqId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: faqUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.title;
          $('#faqId').val(result.data.id);
          $('#editTitle').val(element.value);
          element.innerHTML = result.data.description;
          quill1.root.innerHTML = element.value; // $('#editDescription').
          //     summernote('code', result.data.description);

          $('#editModal').appendTo('body').modal('show');
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
    $('#edit_faqs_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#faqId').val();
    $.ajax({
      url: faqUrl + id,
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
    var faqId = $(event.currentTarget).data('id');
    $.ajax({
      url: faqUrl + faqId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showName').html('');
          $('#showDescription').html('');
          $('#showName').append(result.data.title);
          var element = document.createElement('textarea');
          element.innerHTML = result.data.description;
          $('#showDescription').append(element.value);
          $('#showModal').appendTo('body').modal('show');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
  $(document).on('click', '.delete-btn', function (event) {
    var faqId = $(event.currentTarget).attr('data-id');
    deleteItem(faqUrl + faqId, tableName, Lang.get('messages.faq.faq'));
  });
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