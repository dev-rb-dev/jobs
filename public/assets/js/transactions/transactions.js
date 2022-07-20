/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/assets/js/transactions/transactions.js ***!
  \**********************************************************/


var tableName = '#transactionsTable';
var tbl = $(tableName).DataTable({
  processing: true,
  serverSide: true,
  'order': [[2, 'desc']],
  ajax: {
    url: transactionUrl
  },
  columnDefs: [{
    targets: '_all',
    defaultContent: 'N/A'
  }, {
    'targets': [4],
    'className': 'text-center',
    'width': '10%',
    'orderable': false
  }, {
    'targets': [3],
    'className': 'text-right',
    'width': '13%'
  }, {
    'targets': [1],
    orderable: false
  }],
  columns: [{
    data: 'type_name',
    name: 'owner_type'
  }, {
    data: 'user.full_name',
    name: 'user.first_name'
  }, {
    data: function data(row) {
      return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
    },
    name: 'created_at'
  }, {
    data: function data(row) {
      return row;
    },
    render: function render(row) {
      var transactionAmount = 0;
      if (row.invoice_id == null) transactionAmount = currency(row.amount, {
        precision: 0
      }).format();else transactionAmount = currency(row.amount, {
        precision: 2
      }).format();
      if (row.owner != null && row.owner.plan_currency != null && row.owner.plan_currency.salary_currency != null) return row.owner.plan_currency.salary_currency.currency_icon + ' ' + transactionAmount;else return '$ ' + transactionAmount;
    },
    name: 'amount'
  }, {
    data: function data(row) {
      if (row.invoice_id != null) {
        var data = [{
          'invoiceId': row.invoice_id,
          'amount': row.amount
        }];
        return prepareTemplateRender('#invoiceTemplate', data);
      }

      return 'N/A';
    },
    name: 'id'
  }]
});
handleSearchDatatable(tbl);
$(document).on('click', '.view-invoice', function () {
  var invoiceId = $(this).data('invoice-id');
  $.ajax({
    url: invoiceUrl + invoiceId,
    type: 'get',
    success: function success(result) {
      window.open(result.data, '_blank');
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
/******/ })()
;