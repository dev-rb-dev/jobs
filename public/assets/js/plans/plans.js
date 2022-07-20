/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/js/plans/plans.js ***!
  \********************************************/
$(document).ready(function () {
  'use strict';

  new AutoNumeric('#amount', {
    maximumValue: 99999,
    currencySymbol: '',
    digitGroupSeparator: '\,',
    decimalPlaces: 2,
    currencySymbolPlacement: AutoNumeric.options.currencySymbolPlacement.suffix
  });
});
var tableName = '#plansTbl';
var tbl = $('#plansTbl').DataTable({
  processing: true,
  serverSide: true,
  searchDelay: 500,
  'order': [[0, 'asc']],
  ajax: {
    url: planUrl
  },
  columnDefs: [{
    'targets': [1],
    'className': 'text-right'
  }, {
    'targets': [2],
    'className': 'text-right'
  }, {
    'targets': [3],
    'className': 'text-center',
    'width': '12%'
  }, {
    'targets': [4],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }, {
    'targets': [5],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }],
  columns: [{
    data: function data(row) {
      return row;
    },
    render: function render(row) {
      var element = document.createElement('textarea');
      element.innerHTML = row.name;

      if (row.name.length < 60) {
        return element.value;
      }

      return '<span data-toggle="tooltip" title="' + element.value + '">' + row.name.substr(0, 60).concat('...') + '</span>';
    },
    name: 'name'
  }, {
    data: function data(row) {
      return "<div class=\"badge badge-light-info\">\n                    <div> ".concat(row.allowed_jobs, "</div>\n                    </div>");
    },
    name: 'allowed_jobs'
  }, {
    data: function data(row) {
      return row;
    },
    render: function render(row) {
      if (!isEmpty(row.salary_currency)) {
        return "<div class=\"badge badge-light-success\">\n                    <div> ".concat(row.salary_currency.currency_icon + ' ' + currency(row.amount, {
          precision: 2
        }).format(), "</div>\n                    </div>");
      } else {
        return '$ ' + "<div class=\"badge badge-light-success\">\n                    <div> ".concat(currency(row.amount, {
          precision: 2
        }).format(), "</div>\n                    </div>");
      }
    },
    name: 'amount'
  }, {
    data: function data(row) {
      return "<div class=\"badge badge-light-primary\">\n                    <div> ".concat(row.active_subscriptions_count, "</div>\n                    </div>");
    },
    name: 'active_subscriptions_count'
  }, {
    data: function data(row) {
      var data = [{
        'trial': row.is_trial_plan == 1
      }];
      return prepareTemplateRender('#trialSwitch', data);
    },
    name: 'id'
  }, {
    data: function data(row) {
      var isDisabledDelete = row.active_subscriptions_count > 0 ? 'disabled' : '';
      var data = [{
        'id': row.id,
        'trial': row.is_trial_plan == 1,
        'isDisabledDelete': isDisabledDelete
      }];
      return prepareTemplateRender('#planActionTemplate', data);
    },
    name: 'id'
  }]
});
handleSearchDatatable(tbl);
$('.addPlanModal').click(function () {
  $('#addModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addNewForm', function (e) {
  e.preventDefault();
  processingBtn('#addNewForm', '#btnSave', 'loading');
  e.preventDefault();
  $.ajax({
    url: planSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addModal').modal('hide');
        $(tableName).DataTable().ajax.reload(null, false);
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
  var planId = $(event.currentTarget).data('id');
  renderData(planId);
});

window.renderData = function (id) {
  $.ajax({
    url: planUrl + '/' + id + '/edit',
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        var element = document.createElement('textarea');
        element.innerHTML = result.data.name;
        $('#planId').val(result.data.id);
        $('#editName').val(element.value);
        $('#editAllowedJobs').val(result.data.allowed_jobs);
        $('#editAmount').val(result.data.amount);
        $('#editCurrency').val(result.data.salary_currency_id).trigger('change');
        $('#planAmount').addClass('d-none');

        if (result.data.stripe_plan_id == null) {
          $('#editCurrency').attr('disabled', false);
          $('#editAmount').attr('readonly', false);
        } else {
          $('#editCurrency').attr('disabled', true);
          $('#editAmount').attr('readonly', true);
          $('#planAmount').removeClass('d-none');
        }

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
  var id = $('#planId ').val();
  $.ajax({
    url: planUrl + '/' + id,
    type: 'put',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#editModal').modal('hide');
        $(tableName).DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#editForm', '#btnEditSave');
    }
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var planId = $(event.currentTarget).data('id');
  deleteItem(planUrl + '/' + planId, tableName, Lang.get('messages.plan.plan'));
});
$('#addModal').on('hidden.bs.modal', function () {
  resetModalForm('#addNewForm', '#validationErrorsBox');
});
$('#editModal').on('hidden.bs.modal', function () {
  resetModalForm('#editForm', '#editValidationErrorsBox');
});
$('#addModal').on('shown.bs.modal', function () {
  $('#name').focus();
});
$('#editModal').on('shown.bs.modal', function () {
  $('#editName').focus();
});
$(document).ready(function () {
  var options = [];
  var currencies = planCurrencies;
  var currencySymbols = planCurrencySymbols;
  $.each(currencies, function (index, currency) {
    options.push({
      id: index,
      text: currencySymbols['' + index + ''] + ' - ' + currency
    });
  });
  $('#currency').select2({
    width: '100%',
    data: options,
    dropdownParent: $('#addModal')
  });
  $('#editCurrency').select2({
    width: '100%',
    data: options,
    dropdownParent: $('#editModal')
  });
});
/******/ })()
;