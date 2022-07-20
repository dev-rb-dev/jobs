'use strict';

// $(document).on('click', '.delete-btn', function (event) {
//     let reportedCandidateId = $(event.currentTarget).data('id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.candidate.reported_candidate') + '" ?',
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
//             window.livewire.emit('deleteReportedCandidate',
//                 reportedCandidateId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.candidate.reported_candidate')+ Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });

// $(document).on('click', '.view-note', function (event) {
//     if (ajaxCallIsRunning) {
//         return;
//     }
//     ajaxCallInProgress();
//     let reportedCandidateId = $(event.currentTarget).data('id');
//     $.ajax({
//         url: reportedCandidatesUrl + '/' + reportedCandidateId,
//         type: 'GET',
//         success: function (result) {
//             if (result.success) {
//                 $('#showNote,#showName,#showReportedBy,#showReportedOn,#showImage').
//                     html('');
//                 if (!isEmpty(result.data.note) ? $('#showNote').
//                     append(result.data.note) : $('#showNote').append('N/A'))
//                     $('#showName').
//                         append(result.data.candidate.user.first_name);
//                 $('#showReportedBy').append(result.data.user.first_name);
//                 $('#showReportedOn').append(result.data.date);
//                 $('#showImage').
//                     append('<img src="' + result.data.candidate.candidate_url +
//                         '" class="img-responsive users-avatar-img employee-img mr-2" />');
//                 $('#showModal').appendTo('body').modal('show');
//                 ajaxCallCompleted();
//             }
//         },
//         error: function (result) {
//             displayErrorMessage(result.responseJSON.message);
//         },
//     });
// });

// $(document).ready(function () {
//     $('#filter_by_reported_date').select2();
// });
//
// $(document).ready(function () {
//     $('#filter_by_reported_date').on('change', function (e) {
//         var data = $('#filter_by_reported_date').select2('val');
//         window.livewire.emit('changeFilter', 'filterByReportedDate', data);
//     });
// });

let tableName = $('#reportedCandidateTbl');
let tbl = tableName.DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[4, 'desc']],
    ajax: {
        url: reportedCandidatesUrl,
    },
    columnDefs: [
        {
            'targets': [3],
            'orderable': false,
            'className': 'text-center',
            'width': '15%',
        },
        {
            'targets': [2],
            'className': 'text-center',
            'width': '15%',
        },
        {
            'targets': [1],
            'className': 'text-center',
            'width': '15%',
        },
        {
            'targets': [4],
            'visible': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a >
                                    <div class="">
                                        <img src="${row.candidate.candidate_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                           <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="mb-1 show-btn" data-id="${row.id}">${row.candidate.user.full_name}</a>
                            </div>
                         </div>`;
            },
            name: 'candidate.user.first_name',
        },
        {
            data: function (row) {
                return `<span>${row.user.first_name}`;
            },
            name: 'user.first_name',
        },
        {
            data: function (row) {
                return `<div class="badge badge-light">
                    <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').
                    format('Do MMM, YYYY')}</div>
                    </div>`;
            },
            name: 'created_at',
        },
        {
            data: function (row) {
                let data = [
                    {
                        'id': row.id,
                    }];
                return prepareTemplateRender('#reportedCandidateActionTemplate',
                    data);
            }, name: 'id',
        },
        {
            data: 'created_at',
            name: 'created_at',
        },
    ],
});
handleSearchDatatable(tbl);

$(document).on('click', '.show-btn', function (event) {
    ajaxCallInProgress();
    let reportedCandidateId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: reportedCandidatesUrl + '/' + reportedCandidateId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showReportedCandidate').html('');
                $('#showReportedBy').html('');
                $('#showReportedWhen').html('');
                $('#showReportedNote').html('');
                $('#showImage').html('');

                $('#showReportedCandidate').
                    append(result.data.candidate.user.full_name);
                $('#showReportedBy').append(result.data.user.first_name);
                $('#showReportedWhen').append(result.data.date);
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.note))
                    ? result.data.note
                    : 'N/A';
                $('#showReportedNote').append(element.value);
                $('#showImage').append('<img src="' + result.data.candidate.candidate_url +
                    '" class="testimonial-modal-img" />');
                $('#showCandidateModal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

$(document).on('click', '.delete-btn', function (event) {
    let reportedCandidateId = $(event.currentTarget).attr('data-id');
    deleteItem(reportedCandidatesUrl + '/' + reportedCandidateId, tableName, Lang.get('messages.candidate.reported_candidate'));
});
// swal({
//     title: Lang.get('messages.common.delete') + ' !',
//     text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' +
//         Lang.get('messages.candidate.reported_candidate') + '" ?',
//     type: 'warning',
//     showCancelButton: true,
//     closeOnConfirm: false,
//     showLoaderOnConfirm: true,
//     confirmButtonColor: '#6777ef',
//     cancelButtonColor: '#d33',
//     cancelButtonText: Lang.get('messages.common.no'),
//     confirmButtonText: Lang.get('messages.common.yes'),
// }, function () {
//     $.ajax({
//         url: reportedCandidatesUrl + '/' + reportedCandidateId,
//         type: 'DELETE',
//         success: function success (result) {
//             if (result.success) {
//                 tbl.ajax.reload(null, false);
//             }
//
//             swal({
//                 title: Lang.get('messages.common.deleted') + ' !',
//                 text: Lang.get('messages.candidate.reported_candidate') +
//                     Lang.get('messages.common.has_been_deleted'),
//                 type: 'success',
//                 confirmButtonColor: '#6777ef',
//                 timer: 2000,
//             });
//         },
//         error: function error (data) {
//             swal({
//                 title: '',
//                 text: data.responseJSON.message,
//                 type: 'error',
//                 confirmButtonColor: '#6777ef',
//                 timer: 2000,
//             });
//         },
//     });
// });

