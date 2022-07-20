'use strict';

$(document).ready(function () {
// $(document).on('click', '.delete-btn', function (event) {
//     let resumeId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.apply_job.resume') + '" ?',
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
//             window.livewire.emit('deleteCandidateResume', resumeId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.apply_job.resume')+ Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });

    let tableName = $('#allResumeTbl');
    let tbl = tableName.DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[3, 'desc']],
        ajax: {
            url: resumesUrl,
        },
        columnDefs: [
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '15%',
            },
            {
                'targets': [1],
                'className': 'text-center',
                'orderable': false,
                'width': '15%',
            },
            {
                'targets': [3],
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
                                ${row.candidate.user.full_name}
                            </div>
                         </div>`;
                },
                name:'candidate.user.first_name',
            },
            {
                data: function (row) {
                    return `${row.custom_properties["title"]}`;
                }, name: 'id',
            },
            {
                data: function (row) {
                    let data = [
                        {
                            'downloadResume': downloadresumesUrl + '/' + row.id,
                        }];
                    return prepareTemplateRender('#resumeDownloadTemplate',
                        data);
                }, name: 'id',
            },
            // {
            //     data: function (row) {
            //         let data = [
            //             {
            //                 'id': row.id,
            //             }];
            //         return prepareTemplateRender('#allResumeActionTemplate',
            //             data);
            //     }, name: 'id',
            // },
            {
                data: 'created_at',
                name: 'created_at',
            },
        ],
    });
    // handleSearchDatatable(tbl);

// $(document).on('click', '.delete-btn', function (event) {
//     let allResumeId = $(event.currentTarget).attr('data-id');
//     swal({
//         title: Lang.get('messages.common.delete') + ' !',
//         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' +
//             Lang.get('messages.apply_job.resume') + '" ?',
//         type: 'warning',
//         showCancelButton: true,
//         closeOnConfirm: false,
//         showLoaderOnConfirm: true,
//         confirmButtonColor: '#6777ef',
//         cancelButtonColor: '#d33',
//         cancelButtonText: Lang.get('messages.common.no'),
//         confirmButtonText: Lang.get('messages.common.yes'),
//     }, function () {
//         $.ajax({
//             url: deleteresumesUrl + allResumeId,
//             type: 'DELETE',
//             success: function success (result) {
//                 if (result.success) {
//                     tbl.ajax.reload(null, false);
//                 }
//
//                 swal({
//                     title: Lang.get('messages.common.deleted') + ' !',
//                     text: Lang.get('messages.apply_job.resume') +
//                         Lang.get('messages.common.has_been_deleted'),
//                     type: 'success',
//                     confirmButtonColor: '#6777ef',
//                     timer: 2000,
//                 });
//             },
//             error: function error (data) {
//                 swal({
//                     title: '',
//                     text: data.responseJSON.message,
//                     type: 'error',
//                     confirmButtonColor: '#6777ef',
//                     timer: 2000,
//                 });
//             },
//         });
//     });
// });
});
