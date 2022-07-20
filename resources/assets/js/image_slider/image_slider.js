'use strict';

$(document).ready(function () {
    $('#image_filter_status').select2();
});

$(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault();
    processingBtn('#addNewForm', '#btnSave', 'loading');

    let element = document.createElement('textarea');
    let editor_content_1 = quill1.root.innerHTML;
    element.innerHTML = editor_content_1;
    let dataDesc = JSON.stringify(editor_content_1);
    $('#descriptionData').val(dataDesc.replace(/"/g, ''));

    // if (!checkSummerNoteEmpty('#description',
    //     'Description field is required.')) {
    //     return true;
    // }
    let formData = new FormData($('#addNewForm')[0]);
    $.ajax({
        url: imageSliderSaveUrl,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                tbl.ajax.reload(null, false);
                // window.livewire.emit('refresh');
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
        let imageSliderId = $(event.currentTarget).data('id');
        renderData(imageSliderId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: imageSliderUrl + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    $('#imageSliderId').val(result.data.id);
                    let element = document.createElement('textarea');
                    if (isEmpty(result.data.image_slider_url)) {
                        $('#editPreviewImage').
                            css('background-image',
                                'url("' + defaultDocumentImageUrl + '")');
                        // $('#editPreviewImage').attr('src', defaultDocumentImageUrl);
                    } else {
                        $('#editPreviewImage').
                            css('background-image',
                                'url("' + result.data.image_slider_url + '")');
                        // attr('src', result.data.image_slider_url);
                        $('#imageSliderUrl').
                            css('background-image',
                                'url("' + result.data.image_slider_url + '")');
                        // attr('href', result.data.image_slider_url);
                        $('#imageSliderUrl').text(view);
                    }
                    element.innerHTML = result.data.description;
                    quill2.root.innerHTML = element.value;
                    // $('#editDescription').summernote('code', result.data.description);
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
        // if (!checkSummerNoteEmpty('#editDescription',
        //     'Description field is required.')) {
        //     return true;
        // }
        let editor_content1 = quill2.root.innerHTML;

        let input = JSON.stringify(editor_content1);
        $('#editDescriptionData').val(input.replace(/"/g, ''));
        processingBtn('#editForm', '#btnEditSave', 'loading');
        const id = $('#imageSliderId').val();
        $.ajax({
            url: imageSliderUrl + id + '/update',
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

$(document).on('click', '.addImageSliderModal', function () {
    $('#previewImage').
        css('background-image', 'url(' + defaultDocumentImageUrl + ')');
    quill1.setContents([{ insert: '' }]);
    $('#addModal').appendTo('body').modal('show');
});

// $(document).on('click', '.delete-btn', function (event) {
//     let imageSliderId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.image_slider.image_slider') + '" ?',
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
//             window.livewire.emit('deleteImageSlider', imageSliderId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.image_slider.image_slider') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });

$(document).on('click', '.delete-btn', function (event) {
    let imageSliderId = $(event.currentTarget).attr('data-id');
    deleteItem(imageSliderUrl + imageSliderId,tableName,Lang.get('messages.image_slider.image_slider'));
});

    $('#addModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        // $('#description').summernote('code', '');
        // $('#previewImage').attr('src', defaultDocumentImageUrl);
        $('#previewImage').css('background-image','url("' + defaultDocumentImageUrl + '")');

    });

$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
    // $('#editDescription').summernote('code', '');
    $('#editPreviewImage').attr('src', defaultDocumentImageUrl);
});

// $('#description, #editDescription').summernote({
//     minHeight: 200,
//     height: 200,
//     toolbar: [
//         ['style', ['bold', 'italic', 'underline', 'clear']],
//         ['font', ['strikethrough']],
//         ['para', ['paragraph']]],
// });

window.displayImage = function (input, selector, validationMessageSelector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                if ((image.height < 500 || image.width < 1140)) {
                    $('#imageSlider').val('');
                    $(validationMessageSelector).removeClass('d-none');
                    $(validationMessageSelector).
                        html(imageSizeMessage).
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
            html(imageExtensionMessage).
            show();
        $(validationMessageSelector).delay(5000).slideUp(300);
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

$(document).on('change', '#imageSlider', function () {
    $('#addModal #validationErrorsBox').addClass('d-none');
    if (isValidImage($(this), '#addModal #validationErrorsBox')) {
        displayImage(this, '#previewImage', '#addModal #validationErrorsBox');
    }
});

$(document).on('change', '#editImageSlider', function () {
    $('#editModal #editValidationErrorsBox').addClass('d-none');
    if (isValidFile($(this), '#editModal #editValidationErrorsBox')) {
        displayImage(this, '#editPreviewImage',
            '#editModal #editValidationErrorsBox');
    }
});

$(document).on('change', '.isActive', function (event) {
    let imageSliderId = $(event.currentTarget).data('id');
    changeIsActive(imageSliderId);
});

window.changeIsActive = function (id) {
    $.ajax({
        url: imageSliderUrl + id + '/change-is-active',
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

$('.isFullSlider').on('change', function () {
    $.ajax({
        url: imageSliderUrl + 'change-full-slider',
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

$('.isSliderActive').on('change', function () {
    $.ajax({
        url: imageSliderUrl + 'change-slider-active',
        method: 'post',
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

$(document).on('click', '.show-btn', function (event) {
    let imageSliderId = $(event.currentTarget).data('id');
    $.ajax({
        url: imageSliderUrl + imageSliderId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showStatus').html('');
                $('#showDescription').html('');
                $('#documentUrl').html('');

                if (isEmpty(result.data.image_slider_url)) {
                    $('#documentUrl').hide();
                    $('#noDocument').show();
                } else {
                    $('#noDocument').hide();
                    $('#documentUrl').show();
                    $('#documentUrl').
                        attr('src', result.data.image_slider_url);
                }
                let status = result.data.is_active ? 'messages.common.active' : 'messages.common.de_active';
                $('#showStatus').append( Lang.get(status)  );
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.description)
                    ? result.data.description
                    : 'N/A');
                $('#showDescription').append(element.value);
                $('#showModal').appendTo('body').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

// $(document).ready(function () {
//     $('#image_filter_status').on('change', function (e) {
//         let data = $('#image_filter_status').select2('val');
//         window.livewire.emit('changeFilter', 'status', data);
//     });
// });

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

let tableName = '#imageSlidersTbl';
let tbl = $('#imageSlidersTbl').DataTable({
    processing: true,
    serverSide: true,
    'order': [4, 'desc'],
    ajax: {
        url: imageSliderUrl,
        data: function (data) {
            data.is_active = $('#image_filter_status').
                find('option:selected').
                val();
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'orderable': false,
            'width': '8%',
        },
        {
            'targets': [2],
            'orderable': false,
            'className': 'text-center',
        },
        {
            'targets': [3],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [4],
            'visible': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a>
                                    <div class="">
                                        <img src="${row.image_slider_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                         </div>`;
            },
            name: 'image_slider_url',
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
            name: 'is_active',
        },
        {
            data: function (row) {
                let data = [{ 'id': row.id }];
                return prepareTemplateRender('#imageSliderActionTemplate',
                    data);
            }, name: 'id',
        },
        {
            data: 'created_at',
            name: 'created_at',
        },
    ],
    'fnInitComplete': function () {
        $('#image_filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#image_filter_status').val('').trigger('change');
    });
});
