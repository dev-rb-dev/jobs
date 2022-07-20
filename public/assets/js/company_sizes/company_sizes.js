/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************!*\
  !*** ./resources/assets/js/company_sizes/company_sizes.js ***!
  \************************************************************/


$(document).ready(function () {
  var tableName = '#companySizeTbl';
  $('#size, #editCompanySize').keypress(function (e) {
    if (e.which != 8 && e.which != 0 && String.fromCharCode(e.which) != '-' && (e.which < 48 || e.which > 57)) {
      $('#errMsg, #errEditMsg').html('Digits Only').show().fadeOut('slow');
      return false;
    }
  });
  var tbl = $('#companySizeTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[1, 'desc']],
    ajax: {
      url: companySizeUrl
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
      'width': '45%'
    }],
    columns: [{
      data: 'size',
      name: 'size'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = companySizeUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#companySize', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $('#addCompanySizeModal').on('hidden.bs.modal', function () {
    resetModalForm('#addCompanySizeForm', '#companySizeValidationErrorsBox');
  });
  $('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
  });
  $('#addCompanySizeModal').on('shown.bs.modal', function () {
    $('#size').focus();
  });
  $('#editModal').on('shown.bs.modal', function () {
    $('#editCompanySize').focus();
  });
  $(document).on('click', '.addCompanySizeModal', function () {
    console.log('clicked');
    $('#addCompanySizeModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addCompanySizeForm', function (e) {
    e.preventDefault();
    processingBtn('#addCompanySizeForm', '#companySizeBtnSave', 'loading');
    $.ajax({
      url: companySizeSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addCompanySizeModal').modal('hide');
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addCompanySizeForm', '#companySizeBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    var companySizeId = $(event.currentTarget).data('id');
    renderData(companySizeId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: companySizeUrl + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#companySizeId').val(result.data.id);
          $('#editCompanySize').val(result.data.size);
          $('#editModal').appendTo('body').modal('show');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  }; //


  $(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    processingBtn('#editForm', '#btnEditSave', 'loading');
    var id = $('#companySizeId').val();
    $.ajax({
      url: companySizeUrl + id,
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
  }); // $(document).on('click', '.delete-btn', function (event) {
  //     let companySizeId = $(event.currentTarget).attr('data-id');
  //     swal({
  //             title: Lang.get('messages.common.delete') + ' !',
  //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.company_size.company_size') + '" ?',
  //             type: 'warning',
  //             showCancelButton: true,
  //             closeOnConfirm: false,
  //             showLoaderOnConfirm: true,
  //             confirmButtonColor: '#6777ef',
  //             cancelButtonColor: '#d33',
  //             cancelButtonText: Lang.get('messages.common.no'),
  //             confirmButtonText: Lang.get('messages.common.yes'),
  //         },
  //         function () {
  //             window.livewire.emit('deleteCompanySize', companySizeId);
  //         });
  // });
  //
  // document.addEventListener('delete', function () {
  //     swal({
  //         title: Lang.get('messages.common.deleted') + ' !',
  //         text: Lang.get('messages.company_size.company_size')+ Lang.get('messages.common.has_been_deleted'),
  //         type: 'success',
  //         confirmButtonColor: '#6777ef',
  //         timer: 2000,
  //     });
  // });

  $(document).on('click', '.delete-btn', function (event) {
    var companySizeId = $(event.currentTarget).attr('data-id');
    deleteItem(companySizeUrl + companySizeId, tableName, Lang.get('messages.company_size.company_size'));
  }); //         swal({
  //             title: Lang.get('messages.common.delete') + ' !',
  //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.company_size.company_size') + '" ?',
  //             type: 'warning',
  //             showCancelButton: true,
  //             closeOnConfirm: false,
  //             showLoaderOnConfirm: true,
  //             confirmButtonColor: '#6777ef',
  //             cancelButtonColor: '#d33',
  //             cancelButtonText: Lang.get('messages.common.no'),
  //             confirmButtonText: Lang.get('messages.common.yes')
  //         }, function () {
  //             $.ajax({
  //                 url: companySizeUrl+companySizeId,
  //                 type: 'DELETE',
  //                 success: function success(result) {
  //                     if (result.success) {
  //                         tbl.ajax.reload(null, false);
  //                     }
  //
  //                     swal({
  //                         title: Lang.get('messages.common.deleted') + ' !',
  //                         text: Lang.get('messages.company_size.company_size') + Lang.get('messages.common.has_been_deleted'),
  //                         type: 'success',
  //                         confirmButtonColor: '#6777ef',
  //                         timer: 2000
  //                     });
  //                 },
  //                 error: function error(data) {
  //                     swal({
  //                         title: '',
  //                         text: data.responseJSON.message,
  //                         type: 'error',
  //                         confirmButtonColor: '#6777ef',
  //                         timer: 2000
  //                     });
  //                 }
  //             });
  //         });
  //     });
});
/******/ })()
;