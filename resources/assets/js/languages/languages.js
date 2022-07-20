'use strict';

$(document).ready(function (){
    let tableName = '#languagesTbl';
    let tbl = $('#languagesTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        ajax: {
            url: languageUrl,
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
                    return row.language;
                },
                name: 'language',
                sortable: true,
            },
            // {
            //     data: function (row) {
            //         return `<div class="badge badge-light">
            //         <div> ${moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY')}</div>
            //         </div>`;
            //     },
            //     name: 'created_at',
            // },
            {
                data: function (row) {
                    return `<div class="badge badge-light-info">
                    <div> ${row.iso_code}</div>
                    </div>`;
                },
                name: 'iso_code',
            },
            {
                data: function (row) {
                    let url = languageUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#languagesActionTemplate',data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);


$(document).on('click', '.addLanguageModal', function () {
    $('#addLanguageModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addLanguageForm', function (e) {
    e.preventDefault();
    processingBtn('#addLanguageForm', '#languageBtnSave', 'loading');
    $.ajax({
        url: languageSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addLanguageModal').modal('hide');
                tbl.ajax.reload(null, false);
                setTimeout(function () {
                    $('#languageBtnSave').button('reset');
                }, 1000);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            setTimeout(function () {
                $('#languageBtnSave').button('reset');
            }, 1000);
        },
        complete: function () {
            setTimeout(function () {
                processingBtn('#addLanguageForm', '#languageBtnSave');
            }, 1000);
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    let languageId = $(event.currentTarget).data('id');
    renderData(languageId);
});

window.renderData = function (id) {
    $.ajax({
        url: languageUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.language;
                $('#languageId').val(result.data.id);
                $('#editLanguage').val(element.value);
                $('#editNative').val(result.data.native);
                $('#editIso').val(result.data.iso_code);
                $('#editModal').appendTo('body').modal('show');
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
        const id = $('#languageId').val();
        $.ajax({
            url: languageUrl  + id,
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


    $(document).on('click', '.delete-btn', function (event) {
        let languageId = $(event.currentTarget).attr('data-id');
        deleteItem(languageUrl + languageId, tableName, Lang.get('messages.user_language.language'));
    });
//     swal({
//         title: Lang.get('messages.common.delete') + ' !',
//         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.user_language.language') + '" ?',
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
//             url: languageUrl + languageId,
//             type: 'DELETE',
//             success: function success(result) {
//                 if (result.success) {
//                     tbl.ajax.reload(null, false);
//                 }
//
//                 swal({
//                     title: Lang.get('messages.common.deleted') + ' !',
//                     text: Lang.get('messages.user_language.language') + Lang.get('messages.common.has_been_deleted'),
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

    $('#addLanguageModal').on('hidden.bs.modal', function () {
        resetModalForm('#addLanguageForm', '#languageValidationErrorsBox');
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });
});
