'use strict';

$(document).ready(function () {
    $('#filterFeatured').select2();
});
let tableName = '#jobCategoriesTbl';
let tbl = $('#jobCategoriesTbl').DataTable({
    processing: true,
    serverSide: true,
    searchDelay: 500,
    'order': [[0, 'asc']],
    ajax: {
        url: jobCategoryUrl,
        data: function (data) {
            data.is_featured = $('#filterFeatured').find('option:selected').val();
        },
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
    ],
    columns: [
        {
            data: function (row) {
                return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a >
                                    <div class="">
                                        <img src="${row.image_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                           <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="mb-1 show-btn" data-id="${row.id}">${row.name}</a>
                            </div>
                         </div>`;
            },
            name: 'name',
        },
        {
            data: function (row) {
                let checked = row.is_featured === false ? '' : 'checked';
                let data = [{'id': row.id, 'checked': checked}];
                return prepareTemplateRender('#isFeatured', data);
            },
            name: 'is_featured',
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
                let url = jobCategoryUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#jobCategoryActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#filterFeatured').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});
handleSearchDatatable(tbl);

let jobCategoryDescription = new Quill('#jobCategoryDescription', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline','strike'],
            ['clean']
        ]
    },
    placeholder: 'Enter Description',
    theme: 'snow'
});
let editDescription = new Quill('#editDescription', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline','strike'],
            ['clean']
        ]
    },
    placeholder: 'Enter Description',
    theme: 'snow'
});

$(document).on('click', '.addJobCategoryModal', function () {
    $('#addJobCategoryModal').appendTo('body').modal('show');
});

$(document).on('change', '#customerImage', function () {
    if (isValidFile($(this), '#validationErrorsBox')) {
        displayPhoto(this, '#previewImage');
    }
});

$(document).on('change', '#editCustomerImage', function () {
    if (isValidFile($(this), '#editValidationErrorsBox')) {
        displayPhoto(this, '#editPreviewImage');
    }
});

$(document).on('submit', '#addJobCategoryForm', function (e) {
    e.preventDefault();
    processingBtn('#addJobCategoryForm', '#jobCategoryBtnSave', 'loading');
    // if (!checkSummerNoteEmpty('#jobCategoryDescription',
    //     'Description field is required.')) {
    //     processingBtn('#addJobCategoryForm', '#jobCategoryBtnSave');
    //     return true;
    // }
    let editor_content = jobCategoryDescription.root.innerHTML;

    if (jobCategoryDescription.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }

    let input = JSON.stringify(editor_content);
    $('#jobCategoryDescriptionValue').val(input.replace(/"/g, ""));

    $.ajax({
        url: jobCategorySaveUrl,
        type: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addJobCategoryModal').modal('hide');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addJobCategoryForm', '#jobCategoryBtnSave');
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let jobCategoryId = $(event.currentTarget).attr('data-id');
    renderData(jobCategoryId);
});

window.renderData = function (id) {
    $.ajax({
        url: jobCategoryUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.name;
                $('#jobCategoryId').val(result.data.id);
                $('#editName').val(element.value);
                element.innerHTML = result.data.description;
                editDescription.root.innerHTML = element.value;
                // $('#editDescription').
                //     summernote('code', result.data.description);
                (result.data.is_featured == 1) ? $('#editIsFeatured').
                    prop('checked', true) : $('#editIsFeatured').
                    prop('checked', false);
                if (isEmpty(result.data.image_url)) {
                    // $('#editPreviewImage').
                    //     attr('src', defaultDocumentImageUrl);
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + defaultDocumentImageUrl + '")');
                } else {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")');
                }
                $('#editModal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    processingBtn('#editForm', '#btnEditSave', 'loading');
    // if (!checkSummerNoteEmpty('#editDescription',
    //     'Description field is required.')) {
    //     processingBtn('#editForm', '#btnEditSave');
    //     return true;
    // }
    let editor_content1 = editDescription.root.innerHTML;

    if (editDescription.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }

    let input = JSON.stringify(editor_content1);
    $('#editJobCategoryDescriptionValue').val(input.replace(/"/g, ""));

    const id = $('#jobCategoryId').val();
    $.ajax({
        url: jobCategoryUrl + id,
        type: 'POST',
        data: new FormData($(this)[0]),
        dataType: 'JSON',
        processData: false,
        contentType: false,
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
    let jobCategoryId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: jobCategoryUrl + jobCategoryId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').html('');
                $('#showDescription').html('');
                $('#showIsFeatured').html('');
                $('#showName').append(result.data.name);
                if (!isEmpty(result.data.description) ? $('#showDescription').
                    append(result.data.description) : $('#showDescription').
                    append('N/A'))
                    (result.data.is_featured == 1) ? $('#showIsFeatured').
                            append('Yes')
                        : $('#showIsFeatured').append('No');
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
    let jobCategoryId = $(event.currentTarget).attr('data-id');
    deleteItem(jobCategoryUrl + jobCategoryId, tableName,
        Lang.get('messages.job_category.job_category'));
});

// $(document).on('click', '.delete-btn', function (event) {
//     let jobCategoryId = $(event.currentTarget).attr('data-id');
//     swal({
//         title: Lang.get('messages.common.delete') + ' !',
//         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job_category.job_category') + '" ?',
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
//             url: jobCategoryUrl + jobCategoryId,
//             type: 'DELETE',
//             success: function success(result) {
//                 if (result.success) {
//                     window.livewire.emit('refresh');
//                 }
//
//                 swal({
//                     title: Lang.get('messages.common.deleted') + ' !',
//                     text: Lang.get('messages.job_category.job_category') + Lang.get('messages.common.has_been_deleted'),
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

$('#addJobCategoryModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobCategoryForm', '#jobCategoryValidationErrorsBox');
    // $('#previewImage').prop('src', defaultDocumentImageUrl);?
    $('#previewImage').css('background-image','url("' + defaultDocumentImageUrl + '")');

});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

$(document).on('change', '.isFeatured', function (event) {
    let jobCategoryId = $(event.currentTarget).attr('data-id');
    activeIsFeatured(jobCategoryId);
});

window.activeIsFeatured = function (id) {
    $.ajax({
        url: jobCategoryUrl + id + '/change-status',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                window.livewire.emit('refresh');
            }
        },
    });
};

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#filterFeatured').val('').trigger('change');
    });
});

// $('#jobCategoryDescription, #editDescription').summernote({
//     minHeight: 200,
//     height: 200,
//     toolbar: [
//         ['style', ['bold', 'italic', 'underline', 'clear']],
//         ['font', ['strikethrough']],
//         ['para', ['paragraph']]],
// });
