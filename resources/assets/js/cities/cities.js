'use strict';

$(document).ready(function () {
    $('#filter_state').select2();
    let tableName = '#cityTbl';
    let tbl = $('#cityTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'order': [[0, 'asc']],
        ajax: {
            url: cityUrl,
            data: function (data) {
                data.stateId = $('#filter_state').find('option:selected').val();
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
                data: 'state.name',
                name: 'state.name',
            },
            {
                data: function (row) {
                    let url = cityUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#maritalStatus',data);
                }, name: 'id',
            },
        ],
        'fnInitComplete': function () {
            $('#filter_state').change(function () {
                $(tableName).DataTable().ajax.reload(null, true);
            });
        },
    });
    handleSearchDatatable(tbl);

$(document).on('click', '.addCityModal', function () {
    $('#addCityModal').appendTo('body').modal('show');
});

$(document).on('submit', '#addCityForm', function (e) {
    e.preventDefault();
    processingBtn('#addCityForm', '#cityBtnSave', 'loading');
    $.ajax({
        url: citySaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addCityModal').modal('hide');
                // window.livewire.emit('refresh');
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            processingBtn('#addCityForm', '#cityBtnSave');
        },
    });
});
//
$(document).on('click', '.edit-btn', function (event) {
    let cityId = $(event.currentTarget).attr('data-id');
    renderData(cityId);
});

window.renderData = function (id) {
    $.ajax({
        url: cityUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#cityId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editStateId').val(result.data.state_id).trigger('change');
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
    const id = $('#cityId').val();
    $.ajax({
        url: cityUrl + '/' + id,
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
        let cityId = $(event.currentTarget).attr('data-id');
        deleteItem(cityUrl + '/' + cityId,tableName,Lang.get('messages.job.city'));
    });

// $(document).on('click', '.delete-btn', function (event) {
//     let cityId = $(event.currentTarget).attr('data-id');
//     swal({
//         title: Lang.get('messages.common.delete') + ' !',
//         text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.job.city') + '" ?',
//         type: 'warning',
//         showCancelButton: true,
//         closeOnConfirm: false,
//         showLoaderOnConfirm: true,
//         confirmButtonColor: '#6777ef',
//         cancelButtonColor: '#d33',
//         cancelButtonText: Lang.get('messages.common.no'),
//         confirmButtonText: Lang.get('messages.common.yes'),
//     }, function () {
//         window.livewire.emit('deleteCity', cityId);
//     });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.job.city') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });
//
// document.addEventListener('NotDeleted', function () {
//     swal({
//         type: 'error',
//         title: 'Oops...',
//         text: 'City can' + "'" + 't be deleted',
//         footer: '<a href="">Why do I have this issue?</a>'
//     });
// });

    $('#addCityModal').on('hidden.bs.modal', function () {
        $('#stateID').val('').trigger('change');
        resetModalForm('#addCityForm', '#cityValidationErrorsBox');
    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
    });

    $('#stateID').select2({
        'width': '100%',
        dropdownParent: $('#addCityModal'),
    });
    $('#editStateId').select2({
        'width': '100%',
        dropdownParent: $('#editModal'),
    });
});

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#filter_state').val('').trigger('change');
    });
});
