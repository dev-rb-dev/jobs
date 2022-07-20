/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************************!*\
  !*** ./resources/assets/js/subscribers/subscribers.js ***!
  \********************************************************/


$(document).ready(function () {
  var tableName = '#subscriberTbl';
  var tbl = $('#subscriberTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: subscriberUrl
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
        return '<p>' + row.email + '</p>';
      },
      name: 'email'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = subscriberUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#subscriberActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl); // $(document).on('click', '.delete-btn', function (event) {
  //     let subscriberId = $(event.currentTarget).attr('data-id');
  //     swal({
  //             title: Lang.get('messages.common.delete') + ' !',
  //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job.subscriber') + '" ?',
  //             type: 'warning',
  //             showCancelButton: true,
  //             closeOnConfirm: false,
  //             showLoaderOnConfirm: true,
  //             confirmButtonColor: '#6777ef',
  //             cancelButtonColor: '#d33',
  //             cancelButtonText: Lang.get('messages.common.no'),
  //             confirmButtonText: Lang.get('messages.common.yes'),
  //         },function () {
  //             $.ajax({
  //                 url: subscriberUrl + '/' + subscriberId,
  //                 type: 'DELETE',
  //                 success: function success(result) {
  //                     if (result.success) {
  //                         tbl.ajax.reload(null, false);
  //                     }
  //                 }
  //         });
  // });
  //
  // document.addEventListener('delete', function () {
  //     swal({
  //         title: Lang.get('messages.common.deleted') + ' !',
  //         text: Lang.get('messages.job.subscriber')+ Lang.get('messages.common.has_been_deleted'),
  //         type: 'success',
  //         confirmButtonColor: '#6777ef',
  //         timer: 2000,
  //         });
  //     });
  // });

  $(document).on('click', '.delete-btn', function (event) {
    var subscriberId = $(event.currentTarget).attr('data-id');
    deleteItem(subscriberUrl + '/' + subscriberId, tableName, Lang.get('messages.job.subscriber'));
  });
});
/******/ })()
;