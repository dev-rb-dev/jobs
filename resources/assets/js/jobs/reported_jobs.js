'use strict';

$(document).ready(function (){
    $('#filter_reported_date').select2()

    let tableName = '#reportedJobsTbl';
    let tbl = $('#reportedJobsTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[0, 'asc']],
        ajax: {
            url: reportedJobsUrl,
            data: function (data) {
                data.created_at = $('#filter_reported_date').find('option:selected').val();
            },
        },
        columnDefs: [
            {
                'targets': [4],
                'orderable': false,
                'className': 'text-center',
                'width': '9%',
            },
            {
                'targets': [2],
                'width': '15%',
            },
        ],
        columns: [
            {
              data: function (row){
                  return row.created_at;
              },name:'created_at',sortable:false,visible:false,
            },
            {
                data: function (row) {
                    return `<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <div class="symbol-label">
                            <img src="${row.job.company.company_url}" alt=""
                                 class="w-100 object-cover">
                        </div>
                    </div>
                    <div class="d-inline-block align-top">
                        <div class="d-inline-block align-self-center d-flex">
                            <a href="${frontJobDetail + '/' + row.job.job_id}" target="_blank">${row.job.job_title}</a>
                            <div class="star-ratings d-inline-block align-self-center ms-2">
                            </div>
                       </div>
                    </div>`;
                },
                name: 'job.job_title',
            },
            {
                data: function (row) {
                    return '<p class="">' +
                        row.user.full_name + '</p>';
                },
                name: 'user.first_name',

            },
            {
                data: function (row) {
                    return `<div class="badge badge-light-primary">
                    <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
                },
                name: 'created_at',
            },
            {
                data: function (row) {
                    let url = reportedJobsUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#reportedJobsTemplate',data);
                }, name: 'id',
            },
        ],
        'fnInitComplete': function () {
            $('#filter_reported_date').change(function () {
                $(tableName).DataTable().ajax.reload(null, true);
            });
        },
    });
    handleSearchDatatable(tbl);


// $(document).on('click', '.delete-btn', function (event) {
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
    let reportedJobId = $(event.currentTarget).attr('data-id');
    deleteItem(reportedJobsUrl + reportedJobId, tableName, Lang.get('messages.job.reported_job'));
});

$(document).on('click', '.showModal', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let reportedJobId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: reportedJobsUrl + reportedJobId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showNote,.showName,#showReportedBy,#showReportedOn,#showImage').
                    html('');
                if (!isEmpty(result.data.note) ? $('#showNote').
                    append(result.data.note) : $('#showNote').append('N/A'))
                    $('.showName').append(result.data.job.job_title);
                $('#showReportedBy').append(result.data.user.full_name);
                $('#showReportedOn').append(moment(result.data.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'));
                // console.log(result.data.created_at);
                // $('#showImage').
                //     append('<img src="' + result.data.job.company.company_url +
                //         '" class="img-responsive users-avatar-img employee-img mr-2" />');
                if (isEmpty(result.data.job.company.company_url)) {
                    $('#documentUrl').hide();
                    // $('#noDocument').show();
                } else {
                    $('#noDocument').hide();
                    $('#documentUrl').show();
                    $('#documentUrl').attr('src', result.data.job.company.company_url);
                }
                $('#showModal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            },
        });
    });
});

