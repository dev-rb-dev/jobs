/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************!*\
  !*** ./resources/assets/js/career_levels/career_levels.js ***!
  \************************************************************/


$(document).ready(function () {
  var tableName = '#careerLevelsTbl';
  var tbl = $(tableName).DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[1, 'desc']],
    ajax: {
      url: careerLevelUrl
    },
    columnDefs: [{
      'targets': [1],
      'width': '15%'
    }, {
      'targets': [2],
      'orderable': false,
      'className': 'text-center text-nowrap',
      'width': '10%'
    }, {
      targets: '_all',
      defaultContent: 'N/A',
      'className': 'text-start align-middle text-nowrap'
    }],
    columns: [{
      data: 'level_name',
      name: 'level_name'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = careerLevelUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#careerLevelActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addCareerLevelModal', function () {
    $('#addCareerModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addCareerForm', function (e) {
    e.preventDefault();
    processingBtn('#addCareerForm', '#careerBtnSave', 'loading');
    $('#careerBtnSave').attr('disabled', true);
    $.ajax({
      url: careerLevelSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addCareerModal').modal('hide');
          tbl.ajax.reload(null, false); // window.livewire.emit('refresh');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
        $('#careerBtnSave').attr('disabled', false);
      },
      complete: function complete() {
        processingBtn('#addCareerForm', '#careerBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    var careerLevelId = $(event.currentTarget).data('id');
    renderData(careerLevelId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: careerLevelUrl + '/' + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          var element = document.createElement('textarea');
          element.innerHTML = result.data.level_name;
          $('#careerLevelId').val(result.data.id);
          $('#editCareerLevel').val(element.value);
          $('#editModal').appendTo('body').modal('show');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  };

  $(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    processingBtn('#editForm', '#btnEditSave', 'loading');
    $('#btnEditSave').attr('disabled', true);
    var id = $('#careerLevelId').val();
    $.ajax({
      url: careerLevelUrl + '/' + id,
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
        $('#btnEditSave').attr('disabled', false);
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#editForm', '#btnEditSave');
      }
    });
  });
  $(document).on('click', '.delete-btn', function (event) {
    var careerLevelId = $(event.currentTarget).attr('data-id');
    deleteItem(careerLevelUrl + '/' + careerLevelId, tableName, Lang.get('messages.job.career_level'));
  }); //     swal({
  //         title: Lang.get('messages.common.delete') + ' !',
  //         text: Lang.get('messages.common.are_you_sure_want_to_delete') +
  //             '"' + Lang.get('messages.job.career_level') + '" ?',
  //         type: 'warning',
  //         showCancelButton: true,
  //         closeOnConfirm: false,
  //         showLoaderOnConfirm: true,
  //         confirmButtonColor: '#6777ef',
  //         cancelButtonColor: '#d33',
  //         cancelButtonText: Lang.get('messages.common.no'),
  //         confirmButtonText: Lang.get('messages.common.yes'),
  //     }, function () {
  //         $.ajax({
  //             url: careerLevelUrl + '/' + careerLevelId,
  //             type: 'DELETE',
  //             success: function success (result) {
  //                 if (result.success) {
  //                     tbl.ajax.reload(null, false);
  //                     // window.livewire.emit('refresh');
  //                 }
  //
  //                 swal({
  //                     title: Lang.get('messages.common.deleted') + ' !',
  //                     text: Lang.get('messages.job.career_level') +
  //                         Lang.get('messages.common.has_been_deleted'),
  //                     type: 'success',
  //                     confirmButtonColor: '#6777ef',
  //                     timer: 2000,
  //                 });
  //             },
  //             error: function error (data) {
  //                 swal({
  //                     title: '',
  //                     text: data.responseJSON.message,
  //                     type: 'error',
  //                     confirmButtonColor: '#6777ef',
  //                     timer: 2000,
  //                 });
  //             },
  //         });
  //     });
  // });

  $('#addCareerModal').on('hidden.bs.modal', function () {
    $('#careerBtnSave, #btnEditSave').attr('disabled', false);
    resetModalForm('#addCareerForm', '#careerValidationErrorsBox');
  });
  $('#editModal').on('hidden.bs.modal', function () {
    $('#careerBtnSave, #btnEditSave').attr('disabled', false);
    resetModalForm('#editForm', '#editValidationErrorsBox');
  });
});
/******/ })()
;