/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*******************************************************************!*\
  !*** ./resources/assets/js/employer_transactions/transactions.js ***!
  \*******************************************************************/
 // $(document).ready(function (){
//     let tableName = '#marital_status';
//     let tbl = $('#marital_status').DataTable({
//
//     }

$(document).ready(function () {
  var tableName = '#transactionsTable';
  var tbl = $('#transactionsTable').DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'DESC']],
    ajax: {
      url: transactionUrl
    },
    columnDefs: [{
      'targets': [1],
      'className': 'text-right',
      'width': '25%'
    }, {
      'targets': [2],
      'width': '12%',
      'className': 'text-center',
      'orderable': false
    }, {
      targets: '_all',
      defaultContent: 'N/A'
    }],
    columns: [{
      data: function data(row) {
        return moment(row.created_at, 'YYYY-MM-DD').format('Do MMM, YYYY');
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
        if ('owner' in row && row.owner.plan_currency != null && row.owner.plan_currency.salary_currency != null) return row.owner.plan_currency.salary_currency.currency_icon + ' ' + transactionAmount;else return '$ ' + transactionAmount;
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
});
/******/ })()
;