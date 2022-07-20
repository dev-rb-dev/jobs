'use strict';
$(document).ready(function(){
    let tbl = $('#empFollowerTable').DataTable({
        scrollX: false,
        deferRender: true,
        scroller: true,
        processing: true,
        serverSide: true,
        'order': [[0, 'desc']],
        ajax: {
            url: indexUrl,
        },
        columnDefs: [
            {
                'targets': [3],
                'orderable':false,
                'searchable':false,
                'className':'text-center',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return `<div class="d-flex align-items-center">
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="#">
                                <div>
                                    <img src="${row.user.avatar}" alt="" class="user-img">
                                </div>
                            </a>
                       </div>
                       <div class="d-flex flex-column">
                            <a href="candidate-details/${row.user.candidate.unique_id}" target="_blank" class="mb-1 show-btn">${row.user.full_name}</a>
                        </div>
                     </div>`;
                },
                name: 'user.first_name',
            },
            {
                data:function(row){
                    return !isEmpty(row.user.phone) ? row.user.phone : 'N/A';
                },
                name:'user.phone',
            },
            {
                data:'user.email',
                name:'user.email',
            },
            {
                data:function(row){
                    return `<span class="badge badge-light-${row.user.candidate.immediate_available == 1 ? 'info' : 'danger'} fs-6">Immediate Available</span>`
                },
                name:'id'
            }
        ],
    });
    handleSearchDatatable(tbl);
});
