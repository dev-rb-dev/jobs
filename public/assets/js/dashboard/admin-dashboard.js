/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/assets/js/dashboard/admin-dashboard.js ***!
  \**********************************************************/
$(document).ready(function () {
  'use strict';

  var timeRange = $('#timeRange');
  var isPickerApply = false;
  var today = moment();
  var start = today.clone().startOf('week');
  var end = today.clone().endOf('days');
  timeRange.on('apply.daterangepicker', function (ev, picker) {
    isPickerApply = true;
    start = picker.startDate.format('YYYY-MM-D  H:mm:ss');
    end = picker.endDate.format('YYYY-MM-D  H:mm:ss');
    loadDashboardData(start, end);
  });
  var lastMonth = moment().startOf('month').subtract(1, 'days');
  var thisMonthStart = moment().startOf('week');
  var thisMonthEnd = moment().endOf('week');

  window.cb = function (start, end) {
    timeRange.find('span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
  };

  timeRange.daterangepicker({
    startDate: start,
    endDate: end,
    opens: 'left',
    showDropdowns: true,
    autoUpdateInput: false,
    ranges: {
      'This Week': [moment().startOf('week'), moment().endOf('week')],
      'Last Week': [moment().startOf('week').subtract(7, 'days'), moment().startOf('week').subtract(1, 'days')]
    }
  }, cb);
  cb(start, end);

  window.loadDashboardData = function (startDate, endDate) {
    $.ajax({
      type: 'GET',
      url: adminDashboardChartData,
      dataType: 'json',
      data: {
        start_date: startDate,
        end_date: endDate
      },
      cache: false
    }).done(WeeklyBarChart, PostStatistics);
  };

  window.WeeklyBarChart = function (result) {
    $('#weeklyUserBarChartContainer').html('');
    $('canvas#weeklyUserBarChart').remove();
    $('#weeklyUserBarChartContainer').append('<canvas id="weeklyUserBarChart" width="515" height="400"></canvas>');
    var data = result.data.weeklyChartData;
    var weeklyData = {
      labels: data.weeklyLabels,
      datasets: [{
        label: 'Employers',
        backgroundColor: '#7239ea',
        data: data.totalEmployerCount
      }, {
        label: 'Candidates',
        backgroundColor: '#109ef7',
        data: data.totalCandidateCount
      }]
    };
    var ctx = $('#weeklyUserBarChart');
    var config = new Chart(ctx, {
      type: 'bar',
      data: weeklyData,
      options: {
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              display: false
            }
          }],
          yAxes: [{
            stacked: true,
            ticks: {
              min: 0,
              precision: 0
            },
            type: 'linear'
          }]
        }
      }
    });
  };

  window.PostStatistics = function (result) {
    $('#postStatisticsChartContainer').html('');
    $('canvas#postStatisticsChart').remove();
    $('#postStatisticsChartContainer').append('<canvas id="postStatisticsChart" width="515" height="400"></canvas>');
    var data = result.data.postStatisticsChartData;
    var postStatisticsLineChartData = {
      labels: data.weeklyPostLabels,
      datasets: [{
        label: 'Posts',
        data: data.totalPostCount,
        backgroundColor: '#109ef7',
        borderColor: '#109ef7',
        hoverOffset: 4,
        pointRadius: 5,
        pointHoverRadius: 5,
        fill: false,
        tension: 0.1
      }]
    };
    var postStatistics = $('#postStatisticsChart');
    var myChart = new Chart(postStatistics, {
      type: 'line',
      data: postStatisticsLineChartData,
      options: {
        legend: false,
        scales: {
          xAxes: [{
            stacked: true,
            gridLines: {
              display: false
            }
          }],
          yAxes: [{
            stacked: true,
            ticks: {
              min: 0,
              precision: 0
            },
            type: 'linear'
          }]
        }
      }
    });
  };

  loadDashboardData(start.format('YYYY-MM-D H:mm:ss'), end.format('YYYY-MM-D H:mm:ss'));
});
$(document).ready(function () {
  var applyBtn = $('.range_inputs > button.applyBtn');
  $(document).on('click', '.ranges li', function () {
    if ($(this).data('range-key') === 'Custom Range') {
      applyBtn.css('display', 'initial');
    } else {
      applyBtn.css('display', 'none');
    }
  });
  applyBtn.css('display', 'none');
});
$(document).ready(function () {
  $('#recent-employee-scroll').niceScroll({
    touchbehavior: true
  });
});
var tableName = '#candidateTbl';
var tbl = $(tableName).DataTable({
  processing: true,
  serverSide: true,
  'order': [[4, 'desc']],
  ajax: {
    url: candidateUrl
  },
  columnDefs: [{
    'targets': [0],
    'className': 'ms-5'
  }, // {
  //     'targets': [1],
  //     'orderable': false,
  //     'className': 'text-center',
  //     'width': '5%',
  // },
  {
    'targets': [2],
    'orderable': false,
    'className': 'text-center'
  }, {
    'targets': [3],
    'orderable': false,
    'className': 'text-center'
  }, // {
  //     'targets': [4],
  //     'orderable': false,
  //     'className': 'text-center',
  //     'width': '8%',
  // },
  {
    'targets': [4],
    'visible': false
  }],
  columns: [{
    data: function data(row) {
      return "\n                    <div class=\"symbol symbol-50px me-2 d-flex align-items-center ms-5\">\n                       <div class=\"d-flex flex-column\">\n                <a href=\"".concat(candidateUrl, "/").concat(row.id, "\" class=\"mb-1\">").concat(row.user.full_name, "</a>\n            </div>\n                    </div>");
    },
    name: 'user.first_name'
  }, {
    data: function data(row) {
      return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at).startOf('day').fromNow(), "</div>\n                    </div>");
    },
    name: 'created_at'
  }, {
    data: function data(row) {
      return "<i class=\"".concat(row.immediate_available == 1 ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger', " \"></i>");
    },
    name: 'immediate_available'
  }, {
    data: function data(row) {
      return "<i class=\"".concat(row.user.email_verified_at == null ? 'fas fa-times-circle text-danger' : 'fas fa-check-circle text-success', " \"></i>");
    },
    name: 'user.email_verified_at'
  }, {
    data: 'created_at',
    name: 'created_at'
  }]
});
$(document).ready(function () {
  var companyTableName = '#companiesTbl';
  var companyTable = $(companyTableName).DataTable({
    processing: true,
    serverSide: true,
    dataType: 'json',
    'order': [[5, 'desc']],
    ajax: {
      url: companiesUrl
    },
    columnDefs: [{
      'targets': [2],
      'orderable': false,
      'className': 'text-center'
    }, {
      'targets': [4],
      'className': 'text-center'
    }, {
      'targets': [5],
      'visible': false
    }, {
      'targets': '_all',
      'defaultContent': 'N/A',
      'className': 'text-start align-middle text-nowrap'
    }],
    columns: [{
      data: function data(row) {
        return "\n                    <div class=\"symbol symbol-50px me-2 d-flex align-items-center ms-5\">\n                       <div class=\"d-flex flex-column\">\n                <a href=\"".concat(companiesUrl, "/").concat(row.id, "\" class=\"mb-1\">").concat(row.user.first_name, "</a>\n            </div>\n                    </div>");
      },
      name: 'user.first_name'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at).startOf('day').fromNow(), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        if (row.website != null) {
          return "<a href=\"".concat(row.website, "\" class=\"mb-1\"> ").concat(row.website.length > 20 ? row.website.substr(0, 20) + '...' : row.website, "</a>");
        }
      },
      name: 'website'
    }, {
      data: 'location',
      name: 'location'
    }, {
      data: function data(row) {
        return "<i class=\"".concat(row.active_featured != null ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger', " \"></i>");
      },
      name: 'id'
    }, {
      data: 'created_at',
      name: 'created_at'
    }]
  });
});
var JobTableName = '#jobTbl';
$(JobTableName).DataTable({
  processing: true,
  serverSide: true,
  'order': [[7, 'desc']],
  ajax: {
    url: jobsUrl
  },
  columnDefs: [{
    'targets': [6],
    'className': 'text-center'
  }, {
    'targets': [7],
    'visible': false
  }, {
    'targets': '_all',
    'defaultContent': 'N/A',
    'className': 'text-start align-middle text-nowrap'
  }],
  columns: [{
    data: 'job_title',
    name: 'job_title'
  }, {
    data: function data(row) {
      return row.company.user.first_name;
    },
    name: 'company_id'
  }, {
    data: function data(row) {
      return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at).startOf('day').fromNow(), "</div>\n                    </div>");
    },
    name: 'created_at'
  }, {
    data: function data(row) {
      return row.job_category.name;
    },
    name: 'job_category_id'
  }, {
    data: function data(row) {
      return row.job_type.name;
    },
    name: 'job_type_id'
  }, {
    data: function data(row) {
      if (row.job_shift != null) {
        return row.job_shift.shift;
      }
    },
    name: 'job_shift_id'
  }, {
    data: function data(row) {
      return "<i class=\"".concat(row.active_featured != null ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger', " \"></i>");
    },
    name: 'id'
  }, {
    data: 'created_at',
    name: 'created_at'
  }]
});
/******/ })()
;