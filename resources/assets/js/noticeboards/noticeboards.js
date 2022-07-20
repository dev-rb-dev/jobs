'use strict';

$(document).on('click', '.addNoticeboardModal', function () {
    $('#addModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault();
    processingBtn('#addNewForm', '#btnSave', 'loading');
    let element = document.createElement('textarea');
    let editor_content_1 = quill1.root.innerHTML;
    element.innerHTML = editor_content_1;

    if (quill1.getText().trim().length === 0) {
        displayErrorMessage('The description is required.');
        return false;
    }

    let input = JSON.stringify(editor_content_1);
    $('#termData').val(input.replace(/"/g, ''));
    $.ajax({
        url: noticeboardSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                //window.livewire.emit('refresh');
                $('#noticeboardsTbl').DataTable().ajax.reload(null, false);

            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addNewForm', '#btnSave');
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let noticeboardId = $(event.currentTarget).data('id');
    renderData(noticeboardId);
});

window.renderData = function (id) {
    $.ajax({
        url: noticeboardUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.title;
                $('#noticeboardId').val(result.data.id);
                $('#editTitle').val(element.value);
                element.innerHTML = result.data.description;
                quill2.root.innerHTML = element.value;
                (result.data.is_active == 1) ? $('#editIsActive').
                    prop('checked', true) : $('#editIsActive').
                    prop('checked', false);
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
    let editor_content1 = quill2.root.innerHTML;

    if (quill2.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }
    let input = JSON.stringify(editor_content1);
    $('#editDescription').val(input.replace(/"/g, ''));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    const id = $('#noticeboardId').val();
    $.ajax({
        url: noticeboardUrl + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                //window.livewire.emit('refresh');
                $('#noticeboardsTbl').DataTable().ajax.reload();
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
    let noticeboardId = $(event.currentTarget).data('id');
    $.ajax({
        url: noticeboardUrl + noticeboardId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showTitle').html('');
                $('#showDescription').html('');
                $('#showTitle').append(result.data.title);
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.description))
                    ? result.data.description
                    : 'N/A';
                $('#showDescription').append(element.value);
                (result.data.is_active === 1)
                    ? $('#showIsActive').html('Active')
                    : $('#showIsActive').html('Deactive');
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
    let noticeboardId = $(event.currentTarget).attr('data-id');
    deleteItem(noticeboardUrl + noticeboardId, '#noticeboardsTbl',
        Lang.get('messages.noticeboard.noticeboard'));
});

$(document).on('change', '.isActive', function (event) {
    let noticeId = $(event.currentTarget).data('id');
    $.ajax({
        url: noticeboardUrl + noticeId + '/' + 'change-status',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                //window.livewire.emit('refresh');
                $('#noticeboardsTbl').DataTable().ajax.reload();
            }
        },
    });
});

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
    quill1.setContents([{ insert: '' }]);
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

// $('#description, #editDescription').summernote({
//     minHeight: 200,
//     height: 200,
//     toolbar: [
//         ['style', ['bold', 'italic', 'underline', 'clear']],
//         ['font', ['strikethrough']],
//         ['para', ['paragraph']]],
// });

// $(document).ready(function () {
//     $('#noticeboard_filter_status').select2();
//
//     $('#noticeboard_filter_status').on('change', function (e) {
//         let data = $('#noticeboard_filter_status').select2('val');
//         window.livewire.emit('changeFilter', 'status', data);
//         $('#noticeboardsTbl').DataTable().ajax.reload();
//     });
// });

$(document).ready(function () {
    var tbl = $('#noticeboardsTbl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: noticeboardUrl,
            type: 'GET',
            // data: function (data) {
            //     data.is_active = $('#noticeboard_filter_status').
            //         find('option:selected').
            //         val();
            // },
        },
        columnDefs: [
            {
                'targets': [0],
                'orderable': true,
                'width': '25%',
            },
            {
                'targets': [1],
                'orderable': true,
                'width': '40%',
            },
            {
                'targets': [3],
                'orderable': false,
                'className': 'text-center',
                'width': '10%',
            },
            {
                'targets': [2],
                'orderable': false,
                'width': '5%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return `<a class="show-btn" href="javascript:void(0)" data-id="${row.id}">${row.title.length >
                    20 ? row.title.substr(0, 20) + '...' : row.title}</a>`;
                },
                name: 'title',
            },
            {
                data: function (row) {
                    let element = document.createElement('textarea');
                    element.innerHTML = !isEmpty(row.description)
                        ? row.description
                        : 'N/A';
                    return (element.value.length > 190) ? element.value.slice(0,
                        190) + '...' : element.value;
                },
                name: 'description',
            },
            {
                data: function (row) {
                    let checked = row.is_active === 0 ? '' : 'checked';
                    let data = [{ 'id': row.id, 'checked': checked }];
                    return prepareTemplateRender('#isActive', data);
                },
                name: 'id',
                searchable: false,
            },
            {
                data: function data (row) {
                    return prepareTemplateRender('#noticeboardActionTemplate', [
                        {
                            'id': row.id,
                        }]);
                },
                name: 'id',
                searchable: false,
            },
        ],
    });
    handleSearchDatatable(tbl);
});

let quill1 = new Quill('#descriptionId', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['clean'],
        ],
    },
    placeholder: 'Description',
    theme: 'snow', // or 'bubble'
});

quill1.on('text-change', function (delta, oldDelta, source) {
    if (quill1.getText().trim().length === 0) {
        quill1.setContents([{ insert: '' }]);
    }
});

let quill2 = new Quill('#editDescriptionId', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['clean'],
        ],
    },
    placeholder: 'Description',
    theme: 'snow', // or 'bubble'
});

quill2.on('text-change', function (delta, oldDelta, source) {
    if (quill2.getText().trim().length === 0) {
        quill2.setContents([{ insert: '' }]);
    }
});
// let element = document.createElement('textarea');
// element.innerHTML = termConditionData;
// quill1.root.innerHTML = element.value;
//
// $(document).on('submit', '#policyTerms', function () {
//     let element = document.createElement('textarea');
//     let editor_content_1 = quill1.root.innerHTML;
//     element.innerHTML = editor_content_1;
//     let editor_content_2 = quill2.root.innerHTML;
//
//     if (quill1.getText().trim().length === 0) {
//         displayErrorMessage('The Terms & Conditions is required.');
//         return false;
//     }
//
//     if (quill2.getText().trim().length === 0) {
//         displayErrorMessage('The Privacy Policy is required.');
//         return false;
//     }
//
//     $('#termData').val(JSON.stringify(editor_content_1));
//     $('#privacyData').val(JSON.stringify(editor_content_2));
// });
