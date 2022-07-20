/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/assets/js/employer/follower.js ***!
  \**************************************************/


$(document).ready(function () {
  var tbl = $('#empFollowerTable').DataTable({
    scrollX: false,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
      url: indexUrl
    },
    columnDefs: [{
      'targets': [3],
      'orderable': false,
      'searchable': false,
      'className': 'text-center'
    }],
    columns: [{
      data: function data(row) {
        return "<div class=\"d-flex align-items-center\">\n                        <div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">\n                            <a href=\"#\">\n                                <div>\n                                    <img src=\"".concat(row.user.avatar, "\" alt=\"\" class=\"user-img\">\n                                </div>\n                            </a>\n                       </div>\n                       <div class=\"d-flex flex-column\">\n                            <a href=\"candidate-details/").concat(row.user.candidate.unique_id, "\" target=\"_blank\" class=\"mb-1 show-btn\">").concat(row.user.full_name, "</a>\n                        </div>\n                     </div>");
      },
      name: 'user.first_name'
    }, {
      data: function data(row) {
        return !isEmpty(row.user.phone) ? row.user.phone : 'N/A';
      },
      name: 'user.phone'
    }, {
      data: 'user.email',
      name: 'user.email'
    }, {
      data: function data(row) {
        return "<span class=\"badge badge-light-".concat(row.user.candidate.immediate_available == 1 ? 'info' : 'danger', " fs-6\">Immediate Available</span>");
      },
      name: 'id'
    }]
  });
  handleSearchDatatable(tbl);
});
/******/ })()
;