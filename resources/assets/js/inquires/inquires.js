'use strict';

// $(document).on('click', '.delete-btn', function (event) {
//     let inquiryId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.inquiry.inquiry') + '" ?',
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
//             window.livewire.emit('deleteInquiry', inquiryId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.inquiry.inquiry') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });
$(document).ready(function () {
    let table = $('#inquiresTbl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: inquiresUrl,
        },
        columnDefs: [
            {
                'targets': [3],
                'width':'5%',
                'orderable': false,
                'className': 'text-center',
            }],
        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'subject',
                name: 'subject',
            },
            {
                data: function (row) {
                    return `<div class="badge badge-light">
                    <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
                },
                name: 'created_at',
            },
            {
                data: function (row) {
                    return prepareTemplateRender('#inquiresActionTemplate', [
                        {
                            'id': row.id,
                            'url': showInquiry + '/' + row.id,
                        }]);
                },
                name: 'id',
            },
        ],
    });
    handleSearchDatatable(table);
    $(document).on('click', '.delete-btn', function (event) {
        let inqueryId = $(event.currentTarget).data('id');
        deleteItem(deleteInquiry + '/' + inqueryId, '#inquiresTbl',
            Lang.get('messages.inquiry.inquiry'));
    });

});

$(document).on('click', '.show-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let inquiryId = $(event.currentTarget).data('id');
    $.ajax({
        url: inquiresUrl + '/' + inquiryId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').html('');
                $('#showEmail').html('');
                $('#showPhoneNo').html('');
                $('#showSubject').html('');
                $('#showCreatedAt').html('');
                $('#showUpdatedAt').html('');
                $('#showMessage').html('');

                $('#showName').append(result.data.name);
                $('#showEmail').append(result.data.email);
                $('#showPhoneNo').append(result.data.phone_no);
                $('#showSubject').append(result.data.subject);
                $('#showCreatedAt').
                    text(moment(result.data.created_at, 'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY'));
                $('#showUpdatedAt').
                    text(moment(result.data.updated_at, 'YYYY-MM-DD hh:mm:ss').
                        format('Do MMM, YYYY'));
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.message))
                    ? result.data.message
                    : 'N/A';
                $('#showMessage').append(element.value);
                $('#showModal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});
