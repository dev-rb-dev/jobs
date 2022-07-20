'use strict';

let tableName = '#favouriteJobsTbl';
$(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[0, 'desc']],
    ajax: {
        url: favouriteJobsUrl,
    },
    columnDefs: [
        {
            'targets': [3],
            'orderable': false,
            'className': 'text-center',
        },
        {
            'targets': [5],
            'orderable': false,
        },
    ],
    columns: [
        {
            data: function (row){
                return row.created_at;
            },name:'created_at',
            searchable:false,
            visible:false,
        },
        {
            data: function (row) {
                return `<a href="${jobDetailsUrl}/${row.job.job_id}" target="_blank">${row.job.job_title}</a>`
            },
            name: 'job.job_title',
        },
        {
            data: function (row) {

                return `<div class="d-flex align-items-center">
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a>
                                <div class="">
                                    <img src="${row.job.company.user.avatar}" alt="" class="user-img">
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a class="mb-1">${row.job.company.user.first_name}</a>
                            <span>${row.job.company.user.email}</span>
                        </div>
                    </div>`;
            },
            name: 'user.first_name',
        },
        {
            data: function (row) {
                return `<div class="badge badge-light">
                    <div> ${moment(row.job.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
            },
            name: 'created_at',
        },
        {
            data: function (row) {
                let todayDate = (new Date()).toISOString().split('T')[0];
                if (todayDate > row.job.job_expiry_date) {
                    return `<div class="badge badge-light-danger">
                        <div> ${moment(row.job.job_expiry_date, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                        </div>`;
                }

                return `<div class="badge badge-light-info">
                    <div> ${moment(row.job.job_expiry_date, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
            },
            name:'job.job_expiry_date',
        },
        {
            data: function (row) {
                let data = [{'id': row.id}];
                return prepareTemplateRender(
                    '#favouriteJobsActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

// $(document).on('click', '.removeJob', function (event) {
//     let favouriteJobId = $(event.currentTarget).data('id');
//     deleteItem(favouriteJobsUrl + '/' + favouriteJobId, tableName,
//         'Favourite Job');
// });
$(document).on('click', '.removeJob', function (event) {
    let jobId = $(event.currentTarget).attr('data-id');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
            cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: Lang.get('messages.common.delete') + ' !',
        text: Lang.get('messages.common.are_you_sure_want_to_remove') + '"' +
            Lang.get('messages.job.favourite_job') + '" ?',
        icon: 'warning',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonColor: '#6777ef',
        cancelButtonColor: '#d33',
        cancelButtonText: Lang.get('messages.common.no'),
        confirmButtonText: Lang.get('messages.common.yes'),
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: favouriteJobsUrl + '/' + jobId,
                type: 'DELETE',
                dataType: 'json',
                success: function (obj) {
                    if (obj.success) {
                        if ($(tableName).DataTable().data().count() == 1) {
                            $(tableName).DataTable().page('previous').draw('page');
                        } else {
                            $(tableName).DataTable().ajax.reload(null, false);
                        }
                    }
                    swal({
                        title: Lang.get('messages.common.remove') + ' !',
                        text: Lang.get('messages.job.favourite_job') +
                            Lang.get('messages.common.has_been_removed'),
                        type: 'success',
                        confirmButtonColor: '#009ef7',
                        timer: 2000,
                    });
                    if (callFunction) {
                        eval(callFunction);
                    }
                },
                error: function (data) {
                    swal({
                        title: '',
                        text: data.responseJSON.message,
                        type: 'error',
                        confirmButtonColor: '#009ef7',
                        timer: 5000,
                    });
                },
            });
        }
    });
});
