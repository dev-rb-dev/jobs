/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************!*\
  !*** ./resources/assets/js/candidate/favourite_company.js ***!
  \************************************************************/


$(document).ready(function () {
  var tableName = '#followingTbl';
  var tbl = $('#followingTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: followingUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center',
      'width': '9%'
    }, {
      'targets': [3, 1],
      'className': 'text-center'
    }, {
      'targets': [4],
      'orderable': false,
      'serchable': false,
      'className': 'text-center',
      'width': '5%'
    }],
    columns: [{
      data: function data(row) {
        return "<div class=\"d-flex align-items-center\">\n                        <div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">\n                            <a>\n                                <div class=\"\">\n                                    <img src=\"".concat(row.company.user.avatar, "\" alt=\"\" class=\"user-img\">\n                                </div>\n                            </a>\n                        </div>\n                        <div class=\"d-flex flex-column\">\n                            <a class=\"mb-1\">").concat(row.company.user.first_name, "</a>\n                            <span>").concat(row.company.user.email, "</span>\n                        </div>\n                    </div>");
      },
      name: 'company.user.first_name'
    }, {
      data: function data(row) {
        return row.company.no_of_offices;
      },
      name: 'company.no_of_offices'
    }, {
      data: function data(row) {
        return row.company.user.phone ? row.company.user.phone : 'N/A';
      },
      name: 'company.user.phone'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light-info fs-6\">\n                    <div> ".concat(row.company.industry.name ? row.company.industry.name : 'N/A', "</div>\n                    </div>");
      },
      name: 'company.industry.name'
    }, {
      data: function data(row) {
        var url = followingUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#followingsActionTemplate', data);
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl); // document.addEventListener('livewire:load', function (event) {
  //     window.livewire.hook('message.processed', () => {
  //         setTimeout(function () { $('.alert').fadeOut('fast'); }, 4000);
  //     });
  // });
  // $(document).on('click', '.delete-btn', function (event) {
  //     let jobId = $(event.currentTarget).attr('data-id');
  //     swal({
  //             title: Lang.get('messages.common.delete') + ' !',
  //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job.favourite_company') + '" ?',
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
  //             window.livewire.emit('removeFavouriteCompany', jobId);
  //         });
  // });
  //
  // document.addEventListener('deleted', function () {
  //     swal({
  //         title: Lang.get('messages.common.deleted') + ' !',
  //         text: Lang.get('messages.job.favourite_company')+ Lang.get('messages.common.has_been_deleted'),
  //         type: 'success',
  //         confirmButtonColor: '#6777ef',
  //         timer: 2000,
  //     });
  // });

  $(document).on('click', '.delete-btn', function (event) {
    var jobId = $(event.currentTarget).attr('data-id');
    deleteItem(followingUrl + '/' + jobId, tableName, Lang.get('messages.job.favourite_company'));
  });
});
/******/ })()
;