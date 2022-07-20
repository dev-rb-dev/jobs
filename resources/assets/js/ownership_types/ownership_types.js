'use strict';
$(document).ready(function (){
    // let tableName = '#ownershipTypeTbl';
    // $('#ownershipDescription, #editDescription').summernote({
    //     minHeight: 200,
    //     height: 200,
    //     toolbar: [
    //         ['style', ['bold', 'italic', 'underline', 'clear']],
    //         ['font', ['strikethrough']],
    //         ['para', ['paragraph']]],
    // });
    let tableName = '#ownershipTypeTbl';
    let tbl = $('#ownershipTypeTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        // 'order': [[1, 'asc']],
        ajax: {
            url: ownerShipTypeUrl,
        },
        columnDefs: [
            {
                'targets': [3],
                'orderable': false,
                'className': 'text-center',
                'width': '9%',
            },
            {
                'targets': [0,2],
                'width': '15%',
            },
            {
                'targets': [1],
                'orderable': false,
            },
        ],
        columns: [
            {
                data: function (row) {
                    return '<a class="show-btn cursor-pointer" data-id="' + row.id + '">' +
                        row.name + '</a>';
                },
                name: 'name',
            },
            {
                data: function (row) {
                  let element = document.createElement('textarea');
                  element.innerHTML = row.description;
                  return (element.value.length > 190) ? element.value.slice(0, 190) + '...' : element.value;
                },
                name:'description',
                sortable: false,
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
                    let url = ownerShipTypeUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#ownerShipTypeActionTemplate',data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);

$(document).on('click', '.addOwnerShipTypeModal', function () {
    $('#addOwnershipModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addOwnershipForm', function (e) {
    e.preventDefault();
    // if (!checkSummerNoteEmpty('#ownershipDescription',
    //     'Description field is required.')) {
    //     return true;
    // }
    let editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }
    let input = JSON.stringify(editor_content);
    $('#ownership_desc').val(input.replace(/"/g, ""));
    processingBtn('#addOwnershipForm', '#ownershipBtnSave', 'loading');
    $.ajax({
        url: ownerShipTypeSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addOwnershipModal').modal('hide');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addOwnershipForm', '#ownershipBtnSave');
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
   let ownerShipTypeId = $(event.currentTarget).data('id');
    $.ajax({
        url: ownerShipTypeUrl+ownerShipTypeId+'/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.name;
                $('#ownerShipTypeId').val(result.data.id);
                $('#editName').val(element.value);
                element.innerHTML = result.data.description;
                quill1.root.innerHTML = element.value;
                // $('#editDescription').summernote('code', result.data.description);
                $('#editModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
    // renderData(ownerShipTypeId);
});

// window.renderData = function (id) {
//
// };

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    // if (!checkSummerNoteEmpty('#editDescription',
    //     'Description field is required.')) {
    //     return true;
    // }
    let editor_content1 = quill1.root.innerHTML;

    if (quill1.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }
    let input = JSON.stringify(editor_content1);
    $('#edit_ownership_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    const id = $('#ownerShipTypeId').val();
    $.ajax({
        url: ownerShipTypeUrl + id,
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
    let ownerShipTypeId = $(event.currentTarget).data('id');
    $.ajax({
        url: ownerShipTypeUrl + ownerShipTypeId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').html('');
                $('#showDescription').html('');
                $('#showName').append(result.data.name);
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.description)
                    ? result.data.description
                    : 'N/A');
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
        let ownerShipTypeId = $(event.currentTarget).attr('data-id');
        deleteItem(ownerShipTypeUrl + ownerShipTypeId, tableName, Lang.get('messages.ownership_type.ownership_type'));
    });
    //     swal({
    //         title: Lang.get('messages.common.delete') + ' !',
    //         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.ownership_type.ownership_type') + '" ?',
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
    //             url: ownerShipTypeUrl + ownerShipTypeId,
    //             type: 'DELETE',
    //             success: function success(result) {
    //                 if (result.success) {
    //                     tbl.ajax.reload(null, false);
    //                 }
    //
    //                 swal({
    //                     title: Lang.get('messages.common.deleted') + ' !',
    //                     text: Lang.get('messages.ownership_types') + Lang.get('messages.common.has_been_deleted'),
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
    // });
});

document.addEventListener('delete', function () {
    swal({
        title: Lang.get('messages.common.deleted') + ' !',
        text: Lang.get('messages.company.ownership_type') + Lang.get('messages.common.has_been_deleted'),
        type: 'success',
        confirmButtonColor: '#6777ef',
        timer: 2000,
    });
});

$('#addOwnershipModal').on('hidden.bs.modal', function () {
    resetModalForm('#addOwnershipForm', '#ownershipValidationErrorsBox');
    quill.setContents([{insert: ''}]);
    quill1.setContents([{insert: ''}]);
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

let quill = new Quill('#ownershipDescription', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline','strike'],
            ['clean']
        ]
    },
    placeholder:'Enter Description',
    theme: 'snow'
});
let quill1 = new Quill('#editDescription', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['clean']
        ]
    },
    placeholder:'Enter Description',
    theme: 'snow'
});
