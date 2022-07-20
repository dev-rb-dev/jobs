/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/assets/js/jobs/reported_jobs.js ***!
  \***************************************************/


$(document).ready(function () {
  $('#filter_reported_date').select2();
  var tableName = '#reportedJobsTbl';
  var tbl = $('#reportedJobsTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
      url: reportedJobsUrl,
      data: function data(_data) {
        _data.created_at = $('#filter_reported_date').find('option:selected').val();
      }
    },
    columnDefs: [{
      'targets': [4],
      'orderable': false,
      'className': 'text-center',
      'width': '9%'
    }, {
      'targets': [2],
      'width': '15%'
    }],
    columns: [{
      data: function data(row) {
        return row.created_at;
      },
      name: 'created_at',
      sortable: false,
      visible: false
    }, {
      data: function data(row) {
        return "<div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">\n                        <div class=\"symbol-label\">\n                            <img src=\"".concat(row.job.company.company_url, "\" alt=\"\"\n                                 class=\"w-100 object-cover\">\n                        </div>\n                    </div>\n                    <div class=\"d-inline-block align-top\">\n                        <div class=\"d-inline-block align-self-center d-flex\">\n                            <a href=\"").concat(frontJobDetail + '/' + row.job.job_id, "\" target=\"_blank\">").concat(row.job.job_title, "</a>\n                            <div class=\"star-ratings d-inline-block align-self-center ms-2\">\n                            </div>\n                       </div>\n                    </div>");
      },
      name: 'job.job_title'
    }, {
      data: function data(row) {
        return '<p class="">' + row.user.full_name + '</p>';
      },
      name: 'user.first_name'
    }, {
      data: function data(row) {
        return "<div class=\"badge badge-light-primary\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        var url = reportedJobsUrl + '/' + row.id;
        var data = [{
          'id': row.id,
          'url': url + '/edit'
        }];
        return prepareTemplateRender('#reportedJobsTemplate', data);
      },
      name: 'id'
    }],
    'fnInitComplete': function fnInitComplete() {
      $('#filter_reported_date').change(function () {
        $(tableName).DataTable().ajax.reload(null, true);
      });
    }
  });
  handleSearchDatatable(tbl); // $(document).on('click', '.delete-btn', function (event) {
  //     let reportedJobId = $(event.currentTarget).attr('data-id');
  //     swal({
  //             title: Lang.get('messages.common.delete') + ' !',
  //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job.reported_job') + '" ?',
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
  //
  //             // window.livewire.emit('deleteReportedJob', reportedJobId);
  //         });
  // });
  //
  // document.addEventListener('delete', function () {
  //     swal({
  //         title: Lang.get('messages.common.deleted') + ' !',
  //         text: Lang.get('messages.job.reported_job')+ Lang.get('messages.common.has_been_deleted'),
  //         type: 'success',
  //         confirmButtonColor: '#6777ef',
  //         timer: 2000,
  //     });
  // });

  $(document).on('click', '.delete-btn', function (event) {
    var reportedJobId = $(event.currentTarget).attr('data-id');
    deleteItem(reportedJobsUrl + reportedJobId, tableName, Lang.get('messages.job.reported_job'));
  });
  $(document).on('click', '.showModal', function (event) {
    if (ajaxCallIsRunning) {
      return;
    }

    ajaxCallInProgress();
    var reportedJobId = $(event.currentTarget).attr('data-id');
    $.ajax({
      url: reportedJobsUrl + reportedJobId,
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#showNote,.showName,#showReportedBy,#showReportedOn,#showImage').html('');
          if (!isEmpty(result.data.note) ? $('#showNote').append(result.data.note) : $('#showNote').append('N/A')) $('.showName').append(result.data.job.job_title);
          $('#showReportedBy').append(result.data.user.full_name);
          $('#showReportedOn').append(moment(result.data.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')); // console.log(result.data.created_at);
          // $('#showImage').
          //     append('<img src="' + result.data.job.company.company_url +
          //         '" class="img-responsive users-avatar-img employee-img mr-2" />');

          if (isEmpty(result.data.job.company.company_url)) {
            $('#documentUrl').hide(); // $('#noDocument').show();
          } else {
            $('#noDocument').hide();
            $('#documentUrl').show();
            $('#documentUrl').attr('src', result.data.job.company.company_url);
          }

          $('#showModal').appendTo('body').modal('show');
          ajaxCallCompleted();
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  });
});
/******/ })()
;