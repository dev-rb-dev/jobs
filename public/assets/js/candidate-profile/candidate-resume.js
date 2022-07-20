/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************************************!*\
  !*** ./resources/assets/js/candidates/candidate-profile/candidate-resume.js ***!
  \******************************************************************************/


$(document).ready(function () {
  var tableName = '#resumeTbl';
  var tbl = $('#resumeTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[1, 'asc']],
    ajax: {
      url: candidateResumeUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '9%'
    }, {
      'targets': [0],
      'orderable': false
    }, {
      'targets': [1],
      'width': '20%'
    }],
    columns: [{
      data: function data(row) {
        if (row.custom_properties.is_default === true) {
          return "<span class=\"text-primary\">".concat(row.custom_properties.title + '(Default)', "</span>");
        }

        return row.custom_properties.title;
      },
      name: 'title'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = downloadResumeUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'downloadResume': url
        }];
        return prepareTemplateRender('#resumeActionTemplate', data);
      },
      name: 'id'
    }]
  }); // handleSearchDatatable(tbl);

  $(document).on('click', '.uploadResumeModal', function () {
    $('#uploadModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addNewForm', function (e) {
    var empty = $('#uploadResumeTitle').val().trim().replace(/ \r\n\t/g, '') === '';

    if (empty) {
      displayErrorMessage('The title field is not contain only white space');
      return false;
    }

    e.preventDefault();
    processingBtn('#addNewForm', '#btnSave', 'loading');
    $.ajax({
      url: resumeUploadUrl,
      type: 'post',
      data: new FormData(this),
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#uploadModal').modal('hide');
          setTimeout(function () {
            processingBtn('#addNewForm', '#btnSave', 'reset');
          }, 1000);
          location.reload();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
        setTimeout(function () {
          processingBtn('#addNewForm', '#btnSave', 'reset');
        }, 1000);
      },
      complete: function complete() {
        setTimeout(function () {
          processingBtn('#addNewForm', '#btnSave');
        }, 1000);
      }
    });
  });
  $(document).on('change', '#customFile', function () {
    var extension = isValidDocument($(this), '#validationErrorsBox');

    if (!isEmpty(extension) && extension != false) {
      $('#validationErrorsBox').html('').hide();
    }
  });

  window.isValidDocument = function (inputSelector, validationMessageSelector) {
    var ext = $(inputSelector).val().split('.').pop().toLowerCase();

    if ($.inArray(ext, ['jpg', 'jpeg', 'pdf', 'doc', 'docx']) == -1) {
      $(inputSelector).val('');
      $(validationMessageSelector).removeClass('d-none');
      $(validationMessageSelector).html('The document must be a file of type: jpeg, jpg, pdf, doc, docx.').show();
      $(validationMessageSelector).delay(5000).slideUp(300);
      return false;
    }

    $(validationMessageSelector).hide();
    return ext;
  };

  $('.custom-file-input').on('change', function () {
    var fileName = $(this).val().split('\\').pop();
    $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
  });
  $(document).on('click', '.delete-resume', function (event) {
    var resumeId = $(event.currentTarget).attr('data-id');
    deleteItem(resumeUploadUrl + '/' + resumeId, tableName, Lang.get('messages.apply_job.resume')); // swal({
    //         title: Lang.get('messages.common.delete') + ' !',
    //         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.apply_job.resume') + '" ?',
    //         type: 'warning',
    //         showCancelButton: true,
    //         closeOnConfirm: false,
    //         showLoaderOnConfirm: true,
    //         confirmButtonColor: '#6777ef',
    //         cancelButtonColor: '#d33',
    //         cancelButtonText: Lang.get('messages.common.no'),
    //         confirmButtonText: Lang.get('messages.common.yes'),
    //     },
    //     function () {
    //         $.ajax({
    //             url: resumeUploadUrl + '/' + resumeId,
    //             type: 'DELETE',
    //             success: function (result) {
    //                 if (result.success) {
    //                     setTimeout(location.reload(), 1000);
    //                 }
    //                 swal({
    //                     title: Lang.get('messages.common.deleted') + ' !',
    //                     text: Lang.get('messages.apply_job.resume')+ Lang.get('messages.common.has_been_deleted'),
    //                     type: 'success',
    //                     confirmButtonColor: '#6777ef',
    //                     timer: 2000,
    //                 });
    //             },
    //             error: function (data) {
    //                 swal({
    //                     title: '',
    //                     text: data.responseJSON.message,
    //                     type: 'error',
    //                     timer: 5000,
    //                 });
    //             },
    //         });
    //     },
    // );
  });
});
$('#uploadModal').on('hidden.bs.modal', function () {
  $('#customFile').siblings('.custom-file-label').addClass('selected').html('Choose file');
  resetModalForm('#addNewForm', '#validationErrorsBox');
});
/******/ })()
;