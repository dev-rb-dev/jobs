'use strict';

$(document).ready(function () {
    $('#headerFilterStatus').select2();
});

$(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault();
    processingBtn('#addNewForm', '#btnSave', 'loading');
    // if ($('#description').summernote('isEmpty')) {
    //     $('#description').val('');
    // }
    $.ajax({
        url: headerSliderSaveUrl,
        type: 'POST',
        data: new FormData($(this)[0]),
        dataType: 'JSON',
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#addNewForm')[0].reset();
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
    let headerSliderId = $(event.currentTarget).data('id');
    renderData(headerSliderId);
});

window.renderData = function (id) {
    $.ajax({
        url: headerSliderUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#headerSliderId').val(result.data.id);
                if (isEmpty(result.data.header_slider_url)) {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + defaultDocumentImageUrl + '")');
                    // $('#editPreviewImage').attr('src', defaultDocumentImageUrl);
                } else {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + result.data.header_slider_url + '")');
                    // attr('src', result.data.header_slider_url);
                    $('#imageSliderUrl').
                        css('background-image',
                            'url("' + result.data.header_slider_url + '")');
                    // attr('href', result.data.header_slider_url);
                    $('#imageSliderUrl').text(view);
                }
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
    const id = $('#headerSliderId').val();
    $.ajax({
        url: headerSliderUrl + id + '/update',
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
                // window.livewire.emit('refresh');
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

$(document).on('click', '.addHeaderSliderModal', function () {
    $('#previewImage').
        css('background-image', 'url(' + defaultDocumentImageUrl + ')');
    $('#addModal').appendTo('body').modal('show');
});

// $(document).on('click', '.delete-btn', function (event) {
//     let headerSliderId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.header_slider.header_slider') + '" ?',
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
//             window.livewire.emit('deleteHeaderSlider', headerSliderId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.header_slider.header_slider') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });

$(document).on('click', '.delete-btn', function (event) {
    let headerSliderId = $(event.currentTarget).attr('data-id');
    deleteItem(headerSliderUrl + headerSliderId,tableName,Lang.get('messages.header_slider.header_slider'));
});

$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
    // $('#previewImage').attr('src', defaultDocumentImageUrl);
    $('#previewImage').css('background-image','url("' + defaultDocumentImageUrl + '")');
});

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
    $('#editPreviewImage').attr('src', defaultDocumentImageUrl);
});

window.displayImage = function (input, selector, validationMessageSelector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                if ((image.height < 1080 || image.width < 1920)) {
                    $('#imageSlider').val('');
                    $(validationMessageSelector).removeClass('d-none');
                    $(validationMessageSelector).
                        html(headerSizeMessage).
                        show();
                    $(validationMessageSelector).delay(5000).slideUp(300);
                    return false;
                }
                $(selector).attr('src', e.target.result);
                $(validationMessageSelector).hide();
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
            html(headerSizeMessage).
            show();
        $(validationMessageSelector).delay(5000).slideUp(300);
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

$(document).on('change', '#headerSlider', function () {
    $('#addModal #validationErrorsBox').addClass('d-none');
    if (isValidImage($(this), '#addModal #validationErrorsBox')) {
        displayImage(this, '#previewImage', '#addModal #validationErrorsBox');
    }
});

$(document).on('change', '#editHeaderSlider', function () {
    $('#editModal #editValidationErrorsBox').addClass('d-none');
    if (isValidFile($(this), '#editModal #editValidationErrorsBox')) {
        displayImage(this, '#editPreviewImage',
            '#editModal #editValidationErrorsBox');
    }
});

$(document).on('change', '.isActive', function (event) {
    let headerSliderId = $(event.currentTarget).data('id');
    changeIsActive(headerSliderId);
});

window.changeIsActive = function (id) {
    $.ajax({
        url: headerSliderUrl + id + '/change-is-active',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, true);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$('.searchIsActive').on('change', function () {
    $.ajax({
        url: headerSliderUrl + 'change-search-disable',
        method: 'post',
        data: $('#searchIsActive').serialize(),
        dataType: 'JSON',
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

// $(document).ready(function () {
//     $('#headerFilterStatus').on('change', function (e) {
//         let data = $('#headerFilterStatus').select2('val');
//         window.livewire.emit('changeFilter', 'status', data);
//     });
// });

let tableName = '#headerSlidersTbl';
let tbl = $('#headerSlidersTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [3, 'desc'],
    ajax: {
        url: headerSliderUrl,
        data: function (data) {
            data.is_active = $('#headerFilterStatus').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'orderable': false,
        },
        {
            'targets': [1],
            'orderable': false,
            'className': 'text-center',
        },
        {
            'targets': [2],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [3],
            'visible': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a >
                                    <div class="">
                                        <img src="${row.header_slider_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                         </div>`;
            },
            name: 'header_slider_url',
        },
        {
            data: function (row) {
                let checked = row.is_active === 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#isActive', data);
            },
            name: 'is_active',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#headerSliderActionTemplate',
                    data);
            }, name: 'id',
        },
        {
            data: 'created_at',
            name: 'created_at',
        },
    ],
    'fnInitComplete': function () {
        $('#headerFilterStatus').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#headerFilterStatus').val('').trigger('change');
    });
});
