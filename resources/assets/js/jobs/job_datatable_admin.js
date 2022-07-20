$(document).ready(function() {
    'use strict';

    $('#filter_featured,#filter_suspended,#filter_freelancer,#filter_expiry_date,#filter_job_active_expire').
    select2();
});

let tableName = '#jobsTbl';
let tbl = $('#jobsTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [
        [6, 'desc']
    ],
    ajax: {
        url: jobsUrl,
        data: function(data) {
            data.is_featured = $('#filter_featured').
            find('option:selected').
            val();
            data.is_suspended = $('#filter_suspended').
            find('option:selected').
            val();
            data.is_freelancer = $('#filter_freelancer').
            find('option:selected').
            val();
            data.expiry_date = $('#filter_expiry_date').
            find('option:selected').
            val();
            data.is_job_active = $('#filter_job_active_expire').
            find('option:selected').
            val();
        },
    },
    columnDefs: [{
            'targets': [1],
            'orderable': false,
            'className': 'text-center',
            'width': '15%',
        },
        {
            'targets': [2],
            'orderable': false,
            'className': 'text-center',
            'width': '11%',
        },
        {
            'targets': [3],
            'width': '15%',
        },
        {
            'targets': [4],
            'width': '15%',
        },
        {
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [6],
            'orderable': false,
            'className': 'text-center',
            'width': '10%',
        },
        {
            'targets': [7],
            'visible': false,
        },
    ],
    columns: [{
            data: function(row) {
                let element = document.createElement('textarea');
                element.innerHTML = row.job_title;
                return '<a href="' + jobsUrl + '/' + row.id + '">' +
                    element.value + '</a>';
            },
            name: 'job_title',
        },
        {
            data: function(row) {
                let featured = row.active_featured;
                let expiryDate;
                if (featured) {
                    expiryDate = moment(featured.end_time).format('YYYY-MM-DD');
                }
                let data = [{
                    'id': row.id,
                    'featured': featured,
                    'expiryDate': expiryDate,
                }];
                let todayDate = (new Date()).toISOString().split('T')[0];
                if (todayDate > row.job_expiry_date) {
                    return '<i class="font-20 fas fa-times-circle text-danger"></i>';
                }

                return prepareTemplateRender('#isFeatured', data);
            },
            name: 'hide_salary',
        },
        {
            data: function(row) {
                let checked = row.is_suspended === false ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#isSuspended', data);
            },
            name: 'hide_salary',
        },
        {
            data: function(row) {
                return `<div class="badge badge-light">
                    <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
            },
            name: 'created_at',
        },
        {
            data: function(row) {
                let todayDate = (new Date()).toISOString().split('T')[0];
                if (todayDate > row.job_expiry_date) {
                    return `<div class="badge badge-light-danger">
                        <div> ${moment(row.job_expiry_date, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                        </div>`;
                }

                return `<div class="badge badge-light-info">
                    <div> ${moment(row.job_expiry_date, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
            },
            name: 'job_expiry_date',
        },
        {
            data: function data(row) {
              var statusColor = {
                '0': 'info',
                '1': 'success',
                '2': 'danger'
              };
              var displayinfo = {
                  '0': '',
                  '1': '',
                  '2': '<i data-jobid="' + row.id + '" class="fas fa-info-circle openremarks"></i>'
              };
              return '<div data-jobid="' + row.id + '" class="openremarks badge badge-light-' + statusColor[row.admin_approved] + '">' + adminStatus[row.admin_approved] + displayinfo[row.admin_approved] + '</div>';
            },
            name: 'admin_approved'
          },
        {
            data: function(row) {
                let url = jobsUrl + '/' + row.id;
                let data = [{
                    'id': row.id,
                    'url': url + '/edit',
                }];
                return prepareTemplateRender('#jobActionTemplate',
                    data);
            },
            name: 'id',
        },
        {
            data: 'created_at',
            name: 'created_at',
        },
    ],
    'fnInitComplete': function() {
        $('#filter_featured,#filter_suspended,#filter_freelancer,#filter_expiry_date,#filter_job_active_expire').
        change(function() {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});
handleSearchDatatable(tbl);

$(document).on('click', '.delete-btn', function(event) {
    let jobId = $(event.currentTarget).data('id');
    deleteItem(jobsUrl + '/' + jobId, tableName, Lang.get('messages.job.job'));
});

$(document).on('click', ' .adminJobMakeFeatured ', function(event) {
    let jobId = $(event.currentTarget).data('id');
    jobMakeFeatured(jobId);
});

window.jobMakeFeatured = function(id) {
    $.ajax({
        url: jobsUrl + '/' + id + '/make-job-featured',
        method: 'post',
        cache: false,
        success: function(result) {
            if (result.success) {
                $(tableName).DataTable().ajax.reload(null, false);
                displaySuccessMessage(result.message);
                $('[data-toggle="tooltip"]').tooltip('hide');
            }
        },
        error: function(result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('click', ' .adminJobUnFeatured ', function(event) {
    let jobId = $(event.currentTarget).data('id');
    jobMakeUnFeatured(jobId);
});

window.jobMakeUnFeatured = function(id) {
    $.ajax({
        url: jobsUrl + '/' + id + '/make-job-unfeatured',
        method: 'post',
        cache: false,
        success: function(result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
        error: function(result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('change', '.isSuspended', function(event) {
    let jobId = $(event.currentTarget).data('id');
    activeIsSuspended(jobId);
});

window.activeIsSuspended = function(id) {
    $.ajax({
        url: jobsUrl + '/' + id + '/change-is-suspend',
        method: 'post',
        cache: false,
        success: function(result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
        error: function(result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$('#jobsFilters').on('click', function() {
    $('#jobsFiltersForm').toggleClass('d-block d-none');
});

$(document).on('click', '#reset-filter', function() {
    $('#filter_featured,#filter_suspended,#filter_freelancer,#filter_expiry_date,#filter_job_active_expire').
    val('').
    change();
});

$(document).on('click', function(event) {
    if ($(event.target).closest('#jobsFilters,#jobsFiltersForm').length === 0) {
        $('#jobsFiltersForm').removeClass('d-block').addClass('d-none');
    }
});
