'use strict';

$(document).ready(function (){
    let tableName = '#skillsTbl';
    let tbl = $('#skillsTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[1, 'desc']],
        ajax: {
            url: skillUrl,
        },
        columnDefs: [
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '5%',
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
                    let url = skillUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#skillActionTemplate',data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);

    $(document).on('click', '.addSkillModal', function () {
        $('#addSkillModal').appendTo('body').modal('show');
    });

    $(document).on('submit', '#addSkillForm', function (e) {
        e.preventDefault();
        // if (!checkSummerNoteEmpty('#skillDescription',
        //     'Description field is required.', 1)) {
        //     return true;
        // }
        let editor_content = quill.root.innerHTML;

        if (quill.getText().trim().length === 0) {
            displayErrorMessage('Description field is required.');
            return false;
        }
        let input = JSON.stringify(editor_content);
        $('#skill_desc').val(input.replace(/"/g, ""));
        processingBtn('#addSkillForm', '#skillBtnSave', 'loading');
        $.ajax({
            url: skillSaveUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('#addSkillModal').modal('hide');
                    $("#addSkillForm")[0].reset();
                    tbl.ajax.reload(null, false);
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
            complete: function () {
                processingBtn('#addSkillForm', '#skillBtnSave');
            },
        });
    });
    $(document).on('click', '.edit-btn', function (event) {
        let skillId = $(event.currentTarget).attr('data-id');
        renderData(skillId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: skillUrl + '/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    let element = document.createElement('textarea');
                    element.innerHTML = result.data.skill;
                    $('#skillId').val(result.data.id);
                    $('#editName').val(result.data.name);
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
        $('#edit_skill_desc').val(input.replace(/"/g, ""));
        processingBtn('#editForm', '#btnEditSave', 'loading');
        const id = $('#skillId').val();
        $.ajax({
            url: skillUrl + '/' + id,
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
            url: skillUrl + '/' + salaryPeriodId,
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#showName').html('');
                    $('#showDescription').html('');
                    $('#showName').append(result.data.name);
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




// $(document).on('click', '.show-btn', function (event) {
//     let skillId = $(event.currentTarget).attr('data-id');
//     $.ajax({
//         url: skillUrl + skillId,
//         type: 'GET',
//         success: function (result) {
//             if (result.success) {
//                 $('#showName').html('');
//                 $('#showDescription').html('');
//                 $('#showName').append(result.data.name);
//                 let element = document.createElement('textarea');
//                 element.innerHTML = (!isEmpty(result.data.description))
//                     ? result.data.description
//                     : 'N/A';
//                 $('#showDescription').html(element.value);
//                 $('#showModal').appendTo('body').modal('show');
//             }
//         },
//         error: function (result) {
//             displayErrorMessage(result.responseJSON.message);
//         },
//     });
// });
//
    $(document).on('click', '.delete-btn', function (event) {
        let skillId = $(event.currentTarget).attr('data-id');
        deleteItem(skillUrl + '/' + skillId, tableName, Lang.get('messages.skill.show_skill'));
    });
    //     swal({
    //         title: Lang.get('messages.common.delete') + ' !',
    //         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.skill.show_skill') + '" ?',
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
    //             url: skillUrl + '/' + skillId,
    //             type: 'DELETE',
    //             success: function success(result) {
    //                 if (result.success) {
    //                     tbl.ajax.reload(null, false);
    //                 }
    //
    //                 swal({
    //                     title: Lang.get('messages.common.deleted') + ' !',
    //                     text: Lang.get('messages.skill.show_skill') + Lang.get('messages.common.has_been_deleted'),
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
//     $('#editModal').on('hidden.bs.modal', function () {
//         resetModalForm('#editForm', '#editValidationErrorsBox');
//     });
//
//     $('#skillDescription, #editDescription').summernote({
//         minHeight: 200,
//         height: 200,
//         toolbar: [
//             ['style', ['bold', 'italic', 'underline', 'clear']],
//             ['font', ['strikethrough']],
//             ['para', ['paragraph']]],
//     });
// });
//
//
//
// $('#addSkillModal').on('hidden.bs.modal', function () {
//     resetModalForm('#addSkillForm', '#skillValidationErrorsBox');
//     $('#skillDescription').summernote('code', '');
// });
//
// $('#editModal').on('hidden.bs.modal', function () {
//     resetModalForm('#editForm', '#editValidationErrorsBox');
// });
//
// $('#skillDescription, #editDescription').summernote({
//     minHeight: 200,
//     height: 200,
//     toolbar: [
//         ['style', ['bold', 'italic', 'underline', 'clear']],
//         ['font', ['strikethrough']],
//         ['para', ['paragraph']]],
// });

$('#addSkillModal').on('hidden.bs.modal', function () {
    resetModalForm('#addSkillForm', '#skillValidationErrorsBox');
    quill.setContents([{insert: ''}]);
    quill1.setContents([{insert: ''}]);
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});

let quill = new Quill('#skillDescription', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline','strike'],
            ['clean']
        ]
    },
    placeholder:'Enter description',
    theme: 'snow'
});
let quill1 = new Quill('#editDescription', {
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['clean']
        ]
    },
    placeholder:'Enter description',
    theme: 'snow'
});
});

