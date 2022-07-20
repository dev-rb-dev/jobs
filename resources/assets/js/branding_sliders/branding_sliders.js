'use strict';

let tableName = '#brandingSlidersTbl';
let tbl = $('#brandingSlidersTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [1, 'asc'],
    ajax: {
        url: brandingSliderUrl,
        data: function (data) {
            data.is_active = $('#branding_filter_status').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [1],
            'orderable': false,
            'className': 'text-center',
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
                return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a >
                                    <div class="">
                                        <img src="${row.branding_slider_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                           <div class="d-flex flex-column">
                                ${row.title}
                            </div>
                         </div>`;
            },
            name: 'title',
        },
        {
            data: function (row) {
                let checked = row.is_active === 0 ? '' : 'checked';
                let data = [{'id': row.id, 'checked': checked}];
                return prepareTemplateRender('#isActive', data);
            },
            name: 'is_active',
        },
        {
            data: function (row) {
                let data = [{'id': row.id}];
                return prepareTemplateRender('#brandingSliderActionTemplate',
                    data);
            }, name: 'id',
        },
    ],
    'fnInitComplete': function () {
        $('#branding_filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});
handleSearchDatatable(tbl);

$(document).ready(function () {
    $('#branding_filter_status').select2();
});

$(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault();
    processingBtn('#addNewForm', '#btnSave', 'loading');
    $.ajax({
        url: brandingSliderSaveUrl,
        type: 'POST',
        data: new FormData($(this)[0]),
        dataType: 'JSON',
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                tbl.ajax.reload(null, false);
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
    let brandingSliderId = $(event.currentTarget).data('id');
    renderData(brandingSliderId);
});

window.renderData = function (id) {
    $.ajax({
        url: brandingSliderUrl + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let element = document.createElement('textarea');
                element.innerHTML = result.data.title;
                $('#brandingSliderId').val(result.data.id);
                if (isEmpty(result.data.branding_slider_url)) {
                    $('#editPreviewImage').attr('src', defaultDocumentImageUrl);
                } else {
                    $('#editPreviewImage')
                        .css('background-image',
                            'url("' + result.data.branding_slider_url + '")');
                    $('#brandingSliderUrl').attr('href', result.data.branding_slider_url);
                    $('#brandingSliderUrl').text(view);
                }
                $('#editTitle').val(element.value);
                (result.data.is_active == 1) ? $('#editIsActive').
                    prop('checked', true) : $('#editIsActive').
                    prop('checked', false);
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
    const id = $('#brandingSliderId').val();
    $.ajax({
        url: brandingSliderUrl + '/' + id + '/update',
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

$(document).on('click', '.addBrandingSliderModal', function () {
    $('#addModal').appendTo('body').modal('show');
});

$(document).on('click', '.delete-btn', function (event) {
    let brandingSliderId = $(event.currentTarget).attr('data-id');
    deleteItem(brandingSliderUrl + '/' + brandingSliderId, tableName,
        Lang.get('messages.branding_slider.brand'));
});

// $(document).on('click', '.delete-btn', function (event) {
//     let brandingSliderId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.branding_slider.brand') + '" ?',
//             type: 'warning',
//             showCancelButton: true,
//             closeOnConfirm: false,
//             showLoaderOnConfirm: true,
//             confirmButtonColor: '#6777ef',
//             cancelButtonColor: '#d33',
//             cancelButtonText: Lang.get('messages.common.no'),
//             confirmButtonText: Lang.get('messages.common.yes'),
//         },
//         function () {
//             window.livewire.emit('deleteBrandingSlider', brandingSliderId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.branding_slider.brand') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
    // $('#previewImage').attr('src', defaultDocumentImageUrl);
    $('#previewImage').css('background-image','url("' + defaultDocumentImageUrl + '")');

});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
    $('#editPreviewImage').css('background-image', 'url("' + defaultDocumentImageUrl + '")');
    // $('#editPreviewImage').attr('src', defaultDocumentImageUrl);
});

window.displayImage = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                $(selector).attr('src', e.target.result);
                displayPreview = true;
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0]);
            $(selector).show();
        }
    }
};

window.isValidImage = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).removeClass('d-none');
        $(validationMessageSelector).
            html(brandingExtensionMessage).
            show();
        $(validationMessageSelector).delay(5000).slideUp(300);
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

$(document).on('change', '#brandingSlider', function () {
    $('#addModal #validationErrorsBox').addClass('d-none');
    if (isValidImage($(this), '#addModal #validationErrorsBox')) {
        displayImage(this, '#previewImage', '#addModal #validationErrorsBox');
    }
});

$(document).on('change', '#editBrandingSlider', function () {
    $('#editModal #editValidationErrorsBox').addClass('d-none');
    if (isValidFile($(this), '#editModal #editValidationErrorsBox')) {
        displayImage(this, '#editPreviewImage',
            '#editModal #editValidationErrorsBox');
    }
});

$(document).on('change', '.isActive', function (event) {
    let brandingSliderId = $(event.currentTarget).data('id');
    changeIsActive(brandingSliderId);
});

window.changeIsActive = function (id) {
    $.ajax({
        url: brandingSliderUrl + '/' + id + '/change-is-active',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                tbl.ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#branding_filter_status').val('').trigger('change');
    });
});

// $(document).ready(function () {
//     $('#branding_filter_status').on('change', function (e) {
//         let data = $('#branding_filter_status').select2('val');
//         window.livewire.emit('changeFilter', 'status', data);
//     });
// });
