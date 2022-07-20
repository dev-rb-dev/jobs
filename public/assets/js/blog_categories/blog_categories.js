/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ./resources/assets/js/blog_categories/blog_categories.js ***!
  \****************************************************************/


$(document).ready(function () {
  var tableName = '#blogCategoryTbl';
  var tbl = $('#blogCategoryTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: blogCategorySaveUrl
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
        var url = blogCategorySaveUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#blogCategoryActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addBlogCategoryModal', function () {
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
    $('#post_category_desc').val(input.replace(/"/g, ""));
    processingBtn('#addNewForm', '#btnSave', 'loading');
    $.ajax({
      url: blogCategorySaveUrl,
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
    var blogCategoryId = $(event.currentTarget).data('id');
    renderData(blogCategoryId);
  });
  $(document).on('click', '.edit-btn', function (event) {
    var blogCategoryId = $(event.currentTarget).attr('data-id');
    renderData(blogCategoryId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: blogCategoryUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.name;
          $('#blogCategoryId').val(result.data.id);
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
    $('#edit_post_category_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#blogCategoryId').val();
    $.ajax({
      url: blogCategoryUrl + id,
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
    var blogCategoryId = $(event.currentTarget).data('id');
    $.ajax({
      url: blogCategoryUrl + blogCategoryId,
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
    var blogCategoryId = $(event.currentTarget).attr('data-id');
    deleteItem(blogCategorySaveUrl + '/' + blogCategoryId, '#blogCategoryTbl', Lang.get('messages.post_category.post_category'));
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