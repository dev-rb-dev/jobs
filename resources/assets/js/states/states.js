'use strict';
$(document).ready(function (){
    $('#filter_country').select2();

    $('#countryID').select2({
        dropdownParent: $('#addStateModal'),
    });

    let tableName = '#stateTbl';
    let tbl = $('#stateTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[0, 'asc']],
        ajax: {
            url: stateUrl,
            data: function (data) {
                data.countryId = $('#filter_country').find('option:selected').val();
            },
        },
        columnDefs: [
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '5%',
            },
        ],
        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'country.name',
                name: 'country.name',
            },
            {
                data: function (row) {
                    let url = stateUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#stateActionTemplate',data);
                }, name: 'id',
            },
        ],
        'fnInitComplete': function () {
            $('#filter_country').change(function () {
                $(tableName).DataTable().ajax.reload(null, true);
            });
        },
    });
    handleSearchDatatable(tbl);

    // $('#countryID').select2({
    //     'width': '100%',
    //     dropdownParent: $('#addStateModal'),
    //     sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
    //
    // });
    $('#editCountryId').select2({
        'width': '100%',
        dropdownParent: $('#editModal')
    });

    $(document).on('click', '.addStateModal', function () {
        $('#addStateModal').appendTo('body').modal('show');
    });

    $(document).on('submit', '#addStateForm', function (e) {
        e.preventDefault();
        processingBtn('#addStateForm', '#stateBtnSave', 'loading');
        $.ajax({
            url: stateSaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addStateModal').modal('hide');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addStateForm', '#stateBtnSave');
        },
    });
});


$(document).on('click', '.edit-btn', function (event) {
    let stateId = $(event.currentTarget).attr('data-id');
    renderData(stateId);
});

window.renderData = function (id) {
    $.ajax({
        url: stateUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#stateId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editCountryId').
                    val(result.data.country_id).
                    trigger('change');
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
    const id = $('#stateId').val();
    $.ajax({
        url: stateUrl + '/' + id,
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


// $(document).on('click', '.delete-btn', function (event) {
//     let stateId = $(event.currentTarget).attr('data-id');
//     swal({
//         title: Lang.get('messages.common.delete') + ' !',
//         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.company.state') + '" ?',
//         type: 'warning',
//         showCancelButton: true,
//         closeOnConfirm: false,
//         showLoaderOnConfirm: true,
//         confirmButtonColor: '#6777ef',
//         cancelButtonColor: '#d33',
//         cancelButtonText: Lang.get('messages.common.no'),
//         confirmButtonText: Lang.get('messages.common.yes'),
//     }, function () {
//         window.livewire.emit('deleteState', stateId);
//     });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.company.state') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });
//
// document.addEventListener('NotDeleted', function () {
//     swal({
//         type: 'error',
//         title: '',
//         text: 'State can' + '\'' + 't be deleted',
//         footer: '<a href="">Why do I have this issue?</a>',
//         confirmButtonColor: '#6777ef',
//     });
// });

    $(document).on('click', '.delete-btn', function (event) {
        let stateId = $(event.currentTarget).attr('data-id');
        deleteItem(stateUrl + '/' + stateId,tableName,Lang.get('messages.company.state'));
    });


$('#addStateModal').on('hidden.bs.modal', function () {
    $('#countryID').val('').trigger('change');
    resetModalForm('#addStateForm', '#StateValidationErrorsBox');
});

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

});

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#filter_country').val('').trigger('change');
    });
});
