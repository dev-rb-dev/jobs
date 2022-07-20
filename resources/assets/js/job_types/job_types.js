'use strict';


$(document).ready(function (){
    let tableName = '#jobTypesTbl';
    let tbl = $('#jobTypesTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[0, 'asc']],
        ajax: {
            url: jobTypeUrl,
        },
        columnDefs: [
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '9%',
            },
            {
                'targets': [1],
                'width': '15%',
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
                    return `<div class="badge badge-light">
                    <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
                    </div>`;
                },
                name: 'created_at',
            },
            {
                data: function (row) {
                    let url = jobTypeUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#jobTypeActionTemplate',data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);


$(document).on('click', '.addJobTypeModal', function () {
    $('#addJobTypeModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addJobTypeForm', function (e) {
    e.preventDefault();
    // if (!checkSummerNoteEmpty('#jobTypeDescription',
    //     'Description field is required.', 1)) {
    //     return true;
    // }
    let editor_content = quill.root.innerHTML;

    if (quill.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        return false;
    }
    let input = JSON.stringify(editor_content);
    $('#job_type_desc').val(input.replace(/"/g, ""));
    processingBtn('#addJobTypeForm', '#jobTypeBtnSave', 'loading');
    $.ajax({
        url: jobTypeSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addJobTypeModal').modal('hide');
                // window.livewire.emit('refresh');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addJobTypeForm', '#jobTypeBtnSave');
        },
    });
});
$(document).on('click', '.edit-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let jobTypeId = $(event.currentTarget).attr('data-id');
    renderData(jobTypeId);
});

window.renderData = function (id) {
    $.ajax({
        url: jobTypeUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.name;
                $('#jobTypeId').val(result.data.id);
                $('#editName').val(element.value);
                element.innerHTML = result.data.description;
                quill1.root.innerHTML = element.value;
                // $('#editDescription').edit_job_type_desc
                // summernote('code', result.data.description);
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
    $('#edit_job_type_desc').val(input.replace(/"/g, ""));
    processingBtn('#editForm', '#btnEditSave', 'loading');
    const id = $('#jobTypeId').val();
    $.ajax({
        url: jobTypeUrl + id,
        type: 'put',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                // window.livewire.emit('refresh');
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
    let jobTypeId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: jobTypeUrl + jobTypeId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showName').html('');
                $('#showDescription').html('');
                $('#showName').append(result.data.name);
                let element = document.createElement('textarea');
                element.innerHTML = result.data.description;
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
    let jobTypeId = $(event.currentTarget).attr('data-id');
    deleteItem(jobTypeUrl + jobTypeId,tableName, Lang.get('messages.job_type.job_type'));
});
//
// $('#addJobTypeModal').on('hidden.bs.modal', function () {
//     resetModalForm('#addJobTypeForm', '#jobTypeValidationErrorsBox');
//     $('#jobTypeDescription').summernote('code', '');
// });
//
// $('#editModal').on('hidden.bs.modal', function () {
//     resetModalForm('#editForm', '#editValidationErrorsBox');
// });
//
// $('#jobTypeDescription, #editDescription').summernote({
//     minHeight: 200,
//     height: 200,
//     toolbar: [
//         ['style', ['bold', 'italic', 'underline', 'clear']],
//         ['font', ['strikethrough']],
//         ['para', ['paragraph']]],
// });

    $('#addJobTypeModal').on('hidden.bs.modal', function () {
        resetModalForm('#addJobTypeForm', '#editValidationErrorsBox');
        quill.setContents([{insert: ''}]);
        quill1.setContents([{insert: ''}]);
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

    let quill = new Quill('#jobTypeDescription', {
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
});
