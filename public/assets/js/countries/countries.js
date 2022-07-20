/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/countries/countries.js ***!
  \****************************************************/


$(document).ready(function () {
  var tbl = $('#countryTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: countryUrl
    },
    columnDefs: [{
      'targets': [3],
      'orderable': false,
      'className': 'text-center',
      'width': '5%'
    }, {
      'targets': '_all',
      'defaultContent': 'N/A',
      'className': 'text-start align-middle text-nowrap'
    }],
    columns: [{
      data: 'name',
      name: 'name'
    }, {
      data: function data(row) {
        return '<div class="badge badge-light-primary">' + row.short_code + '</div>';
      },
      name: 'short_code'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light-info\">\n                        ".concat(row.phone_code != null ? row.phone_code : 'N/A', " </div>");
      },
      name: 'phone_code'
    }, {
      data: function data(row) {
        var url = countryUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#countriesActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
  $(document).on('click', '.addCountryModal', function () {
    $('#addCountryModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addCountryForm', function (e) {
    e.preventDefault();
    processingBtn('#addCountryForm', '#countryBtnSave', 'loading');
    $.ajax({
      url: countrySaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addCountryModal').modal('hide');
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addCountryForm', '#countryBtnSave');
      }
    });
  });
  $(document).on('click', '.edit-btn', function (event) {
    var countryId = $(event.currentTarget).data('id');
    renderData(countryId);
  });

  window.renderData = function (id) {
    $.ajax({
      url: countryUrl + '/' + id + '/edit',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#countryId').val(result.data.id);
          $('#editName').val(result.data.name);
          $('#editShortCode').val(result.data.short_code);
          $('#editPhoneCode').val(result.data.phone_code);
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
    var id = $('#countryId').val();
    $.ajax({
      url: countryUrl + '/' + id,
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
  }); // $(document).on('click', '.delete-btn', function (event) {
  //     let countryId = $(event.currentTarget).attr('data-id');
  //     swal({
  //             title: Lang.get('messages.common.delete') + ' !',
  //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.company.country') + '" ?',
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
  //             // window.livewire.emit('refresh');
  //             // tbl.ajax.reload(null, false);
  //         });
  // });
  //
  // document.addEventListener('delete', function () {
  //     swal({
  //         title: Lang.get('messages.common.deleted') + ' !',
  //         text: Lang.get('messages.company.country') + Lang.get('messages.common.has_been_deleted'),
  //         type: 'success',
  //         confirmButtonColor: '#6777ef',
  //         timer: 2000,
  //     });
  // });
  // document.addEventListener('NotDeleted', function () {
  //     swal({
  //         type: 'error',
  //         title: '',
  //         text: 'Country can' + '\'' + 't be deleted',
  //         footer: '<a href="">Why do I have this issue?</a>',
  //         confirmButtonColor: '#6777ef',
  //     });
  // });

  $(document).on('click', '.delete-btn', function (event) {
    var countryId = $(event.currentTarget).attr('data-id');
    deleteItem(countryUrl + '/' + countryId, '#countryTbl', Lang.get('messages.company.country'));
  });
  $('#addCountryModal').on('hidden.bs.modal', function () {
    resetModalForm('#addCountryForm', '#countryValidationErrorsBox');
  });
  $('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
  });
});
/******/ })()
;