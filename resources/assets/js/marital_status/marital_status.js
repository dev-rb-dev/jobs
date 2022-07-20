'use strict';

$(document).ready(function (){
    let tableName = '#marital_status';
    let tbl = $('#marital_status').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[0, 'asc']],
        ajax: {
            url: maritalStatusUrl,
        },
        columnDefs: [
            {
                'targets': [1],
                'width': '15%',
            },
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '5%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' +
                        row.marital_status + '</a>';
                },
                name: 'marital_status',
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
                    let url = maritalStatusUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#maritalStatus',data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);

$(document).on('click', '.addMaritalStatusModal', function () {
    $('#addMaritalStatusModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addMaritalStatusForm', function (e) {
    e.preventDefault();
    // if (!checkSummerNoteEmpty('#martialDescription',
    //     'Description field is required.', 1)) {
    //     return true;
    // }
    let editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }
    let input = JSON.stringify(editor_content);
    $('#marital_desc').val(input.replace(/"/g, ""));
    processingBtn('#addMaritalStatusForm', '#maritalStatusBtnSave', 'loading');
    $.ajax({
        url: maritalStatusSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addMaritalStatusModal').modal('hide');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addMaritalStatusForm', '#maritalStatusBtnSave');
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    let maritalStatusId = $(event.currentTarget).attr('data-id');
    renderData(maritalStatusId);
});

window.renderData = function (id) {
    $.ajax({
        url: maritalStatusUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.marital_status;
                $('#maritalStatusId').val(result.data.id);
                $('#editMaritalStatus').val(element.value);
                element.innerHTML = result.data.description;
                quill1.root.innerHTML = element.value;
                // $('#editDescription').val(result.data.description);
                // $('#editDescription').summernote('code', result.data.description);
                $('#editModal').modal('show');
                // ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    // if (!checkSummerNoteEmpty('#editDescription',
    //     'Description field is required.', 1)) {
    //     return true;
    // }
    let editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }
    let input = JSON.stringify(editor_content1);
    $('#edit_marital_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    const id = $('#maritalStatusId').val();
    $.ajax({
        url: maritalStatusUrl + '/' + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#editForm', '#btnEditSave');
        },
    });
});

$(document).on('click', '.show-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let salaryPeriodId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: maritalStatusUrl + '/' + salaryPeriodId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showMaritalStatus').html('');
                $('#showDescription').html('');
                $('#showMaritalStatus').append(result.data.marital_status);
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.description))
                    ? result.data.description
                    : 'N/A';
                $('#showDescription').append(element.value);
                $('#showModal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

    $(document).on('click', '.delete-btn', function (event) {
        let maritalStatusId = $(event.currentTarget).attr('data-id');
        deleteItem(maritalStatusUrl + '/' + maritalStatusId, tableName, Lang.get('messages.marital_status.marital_status'));
    });
//     swal({
//         title: Lang.get('messages.common.delete') + ' !',
//         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.marital_status.marital_status') + '" ?',
//         type: 'warning',
//         showCancelButton: true,
//         closeOnConfirm: false,
//         showLoaderOnConfirm: true,
//         confirmButtonColor: '#6777ef',
//         cancelButtonColor: '#d33',
//         cancelButtonText: Lang.get('messages.common.no'),
//         confirmButtonText: Lang.get('messages.common.yes')
//     }, function () {
//         $.ajax({
//             url: maritalStatusUrl + '/' + maritalStatusId,
//             type: 'DELETE',
//             success: function success(result) {
//                 if (result.success) {
//                     tbl.ajax.reload(null, false);
//                 }
//
//                 swal({
//                     title: Lang.get('messages.common.deleted') + ' !',
//                     text: Lang.get('messages.marital_status.marital_status') + Lang.get('messages.common.has_been_deleted'),
//                     type: 'success',
//                     confirmButtonColor: '#6777ef',
//                     timer: 2000
//                 });
//             },
//             error: function error(data) {
//                 swal({
//                     title: '',
//                     text: data.responseJSON.message,
//                     type: 'error',
//                     confirmButtonColor: '#6777ef',
//                     timer: 2000
//                 });
//             }
//         });
//     });


    $('#addMaritalStatusModal').on('hidden.bs.modal', function () {
        resetModalForm('#addMaritalStatusForm', '#maritalStatusValidationErrorsBox');
        quill.setContents([{insert: ''}]);
        quill1.setContents([{insert: ''}]);
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

    let quill = new Quill('#martialDescription', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline','strike'],
                ['clean']
            ]
        },
        placeholder: 'Enter description',
        theme: 'snow'
    });
    let quill1 = new Quill('#editDescription', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['clean']
            ]
        },
        placeholder: 'Enter description',
        theme: 'snow'
    });
});
