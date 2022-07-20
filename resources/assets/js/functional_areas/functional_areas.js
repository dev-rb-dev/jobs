'use strict';

// const Handlebars = require('handlebars');

$(document).ready(function () {
    let tableName = '#functionalAreasTbl';
    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[1, 'desc']],
        ajax: {
            url: functionalAreaUrl,
        },
        columnDefs: [
            {
                'targets': [1],
                'width': '15%',
            },
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center text-nowrap',
                'width': '10%',
            },
            {
                targets: '_all',
                defaultContent: 'N/A',
                'className': 'text-start align-middle text-nowrap',
            },
        ],
        columns: [
            {
                data: 'name',
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
                    let url = functionalAreaUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#functionAreaStatus', data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);


    $(document).on('click', '.addFunctionalAreaModal', function () {
    $('#addFunctionalModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addFunctionalForm', function (e) {
    e.preventDefault();
    processingBtn('#addFunctionalForm', '#functionalBtnSave', 'loading');
    $('#btnSave').attr('disabled', true);
    $.ajax({
        url: functionalAreaSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addFunctionalModal').modal('hide');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            $('#btnSave').attr('disabled', false);
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addFunctionalForm', '#functionalBtnSave');
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    let functionalAreaId = $(event.currentTarget).data('id');
    renderData(functionalAreaId);
});

window.renderData = function (id) {
    $.ajax({
        url: functionalAreaUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.name;
                $('#functionalAreaId').val(result.data.id);
                $('#editName').val(element.value);
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
    $('#btnSave').attr('disabled', true);
    const id = $('#functionalAreaId').val();
    $.ajax({
        url: functionalAreaUrl + '/' + id,
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
            $('#btnSave').attr('disabled', false);
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#editForm', '#btnEditSave');
        },
    });
});

    $(document).on('click', '.delete-btn', function (event) {
        let functionalAreaId = $(event.currentTarget).attr('data-id');
        deleteItem(functionalAreaUrl + '/' + functionalAreaId, tableName, Lang.get('messages.job.functional_area'));
    });
    // swal({
    //     title: Lang.get('messages.common.delete') + ' !',
    //     text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job.functional_area') + '" ?',
    //     type: 'warning',
    //     showCancelButton: true,
    //     closeOnConfirm: false,
    //     showLoaderOnConfirm: true,
    //     confirmButtonColor: '#6777ef',
    //     cancelButtonColor: '#d33',
    //     cancelButtonText: Lang.get('messages.common.no'),
    //     confirmButtonText: Lang.get('messages.common.yes')
    // }, function () {
    //     $.ajax({
    //         url: functionalAreaUrl + '/' + functionalAreaId,
    //         type: 'DELETE',
    //         success: function success(result) {
    //             if (result.success) {
    //                 tbl.ajax.reload(null, false);
    //             }
    //
    //             swal({
    //                 title: Lang.get('messages.common.deleted') + ' !',
    //                 text: Lang.get('messages.job.functional_area') + Lang.get('messages.common.has_been_deleted'),
    //                 type: 'success',
    //                 confirmButtonColor: '#6777ef',
    //                 timer: 2000
    //             });
    //         },
    //         error: function error(data) {
    //             swal({
    //                 title: '',
    //                 text: data.responseJSON.message,
    //                 type: 'error',
    //                 confirmButtonColor: '#6777ef',
    //                 timer: 2000
    //             });
    //         }
    //     });
    // });
// });

    $('#addFunctionalModal').on('hidden.bs.modal', function () {
        $('#functionalBtnSave').attr('disabled', false);
        resetModalForm('#addFunctionalForm', '#validationErrorsBox');
    });

    $('#editModal').on('hidden.bs.modal', function () {
        $('#btnSave').attr('disabled', false);
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

});

// let source = $('#actionTemplate')[0].innerHTML;
// window.actionTemplate = Handlebars.compile(source);
