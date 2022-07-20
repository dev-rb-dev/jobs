'use strict';

$(document).ready(function (){
    let tableName = '#followingTbl';
    let tbl = $('#followingTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[0, 'asc']],
        ajax: {
            url: followingUrl,
        },
        columnDefs: [
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '9%',
            },
            {
                'targets': [3,1],
                'className': 'text-center',
            },
            {
                'targets': [4],
                'orderable':false,
                'serchable':false,
                'className':'text-center',
                'width': '5%',
            },
        ],
        columns: [
            {
                data: function (row) {

                    return `<div class="d-flex align-items-center">
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a>
                                <div class="">
                                    <img src="${row.company.user.avatar}" alt="" class="user-img">
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-column">
                            <a class="mb-1">${row.company.user.first_name}</a>
                            <span>${row.company.user.email}</span>
                        </div>
                    </div>`;
                },
                name: 'company.user.first_name',
            },
            {
                data: function (row) {
                    return row.company.no_of_offices;
                },
                name: 'company.no_of_offices',
            },
            {
                data: function (row) {
                    return row.company.user.phone ? row.company.user.phone : 'N/A';
                },
                name: 'company.user.phone',
            },
            {
                data: function (row) {
                    return `<div class="badge badge-light-info fs-6">
                    <div> ${(row.company.industry.name) ? row.company.industry.name: 'N/A'}</div>
                    </div>`;
                },
                name: 'company.industry.name',
            },

            {
                data: function (row) {
                    let url = followingUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#followingsActionTemplate',data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);


// document.addEventListener('livewire:load', function (event) {
//     window.livewire.hook('message.processed', () => {
//         setTimeout(function () { $('.alert').fadeOut('fast'); }, 4000);
//     });
// });

// $(document).on('click', '.delete-btn', function (event) {
//     let jobId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job.favourite_company') + '" ?',
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
//             window.livewire.emit('removeFavouriteCompany', jobId);
//         });
// });
//
// document.addEventListener('deleted', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.job.favourite_company')+ Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });


$(document).on('click', '.delete-btn', function (event) {
    let jobId = $(event.currentTarget).attr('data-id');
    deleteItem(followingUrl + '/' + jobId,tableName,Lang.get('messages.job.favourite_company'));
});
})
