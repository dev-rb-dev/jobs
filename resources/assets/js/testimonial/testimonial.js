'use strict';
$(document).ready(function () {
    'use strict';

    let tableName = '#testimonialTbl';
    let tbl = $('#testimonialTbl').DataTable({
        processing: true,
        serverSide: true,
        'order': [[0, 'asc']],
        ajax: {
            url: testimonialUrl,
        },
        columnDefs: [
            {
                'targets': [1],
                'width': '15%',
                'orderable': false,
            },
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '10%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a >
                                    <div class="">
                                        <img src="${row.customer_image_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                           <div class="d-flex flex-column">
                                <a href="javascript:void(0)" class="mb-1 show-btn" data-id="${row.id}">${row.customer_name}</a>
                            </div>
                         </div>`;
                },
                name: 'customer_name',
            },
            {
                data: function (row) {
                    if (isEmpty(row.customer_image_url)) {
                        return 'N/A';
                    } else {
                        return '<a href="' + testimonialImageSaveUrl + '/' + row.id
                            + '"><i class="fas fa-download text-primary fs-1" aria-hidden="true"></i></a>';
                    }
                },
                name: 'customer_name',
            },
            {
                data: function (row) {
                    let data = [{'id': row.id}];
                    return prepareTemplateRender('#testimonialActionTemplate',
                        data);
                }, name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);

// const Handlebars = require('handlebars');
// preparedTemplate();

    $(document).on('submit', '#addNewForm', function (e) {
        e.preventDefault();
        let editor_content = quill.root.innerHTML;

        if (quill.getText().trim().length === 0) {
            displayErrorMessage('Description field is required.');
            return false;
        }
        let input = JSON.stringify(editor_content);
        $('#testimonial_desc').val(input.replace(/"/g, ""));

        processingBtn('#addNewForm', '#btnSave', 'loading');
        if ($('#customerName').val().length > 50) {
            displayErrorMessage('Customer Name may not be greater than 50 character.');
            setTimeout(function () {
                processingBtn('#addNewForm', '#btnSave');
            }, 1000)
            return false;
        }
        $.ajax({
            url: testimonialSaveUrl,
            type: 'POST',
            data: new FormData(this),
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
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let testimonialId = $(event.currentTarget).data('id');
        renderData(testimonialId);
    });

    window.renderData = function (id) {
        $.ajax({
            url: testimonialUrl + id + '/edit',
            type: 'GET',
            success: function (result) {
                if (result.success) {
                    let element = document.createElement('textarea');
                    element.innerHTML = result.data.customer_name;
                    $('#testimonialId').val(result.data.id);
                    $('#editCustomerName').val(element.value);
                    if (isEmpty(result.data.customer_image_url)) {
                        $('#editPreviewImage').css('background-image',
                            'url("' + defaultDocumentImageUrl + '")');
                    } else {
                        $('#editPreviewImage').css('background-image',
                            'url("' + result.data.customer_image_url + '")');
                    }
                    element.innerHTML = result.data.description;
                    quill1.root.innerHTML = element.value;
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
        let editor_content1 = quill1.root.innerHTML;

        if (quill1.getText().trim().length === 0) {
            displayErrorMessage('Description field is required.');
            return false;
        }
        let input = JSON.stringify(editor_content1);
        $('#testimonial_edit_desc').val(input.replace(/"/g, ""));
        processingBtn('#editForm', '#btnEditSave', 'loading');
        if ($('#editCustomerName').val().length > 50) {
            displayErrorMessage('Customer Name may not be greater than 50 character.');
            setTimeout(function () {
                processingBtn('#editForm', '#btnEditSave');
            }, 1000)
            return false;
        }
        const id = $('#testimonialId').val();
        $.ajax({
            url: testimonialUrl + id + '/update',
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

    $(document).on('click', '.show-btn', function (event) {
        if (ajaxCallIsRunning) {
            return;
        }
        ajaxCallInProgress();
        let testimonialId = $(event.currentTarget).data('id');
        $.ajax({
            url: testimonialUrl + testimonialId,
            type: 'GET',
            success: function (result) {
                console.log(result.data);
                if (result.success) {
                    $('#showCustomerName').html('');
                    $('#showDescription').html('');
                    $('#documentUrl').html('');

                    $('#showCustomerName').append(result.data.customer_name);
                    if (isEmpty(result.data.customer_image_url)) {
                        $('#documentUrl').hide();
                        $('#noDocument').show();
                    } else {
                        $('#noDocument').hide();
                        $('#documentUrl').show();
                        $('#documentUrl').
                            attr('src', result.data.customer_image_url);
                    }
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

    $(document).on('click', '.addTestimonialModal', function () {
        $('#addModal').appendTo('body').modal('show');
    });

    $(document).on('click', '.delete-btn', function (event) {
        var testimonialId = $(event.currentTarget).attr('data-id');
        deleteItem(testimonialUrl + testimonialId, tableName,
            Lang.get('messages.testimonial.testimonial'));
    });

    // $(document).on('click', '.delete-btn', function (event) {
    //     let testimonialId = $(event.currentTarget).attr('data-id');
    //     swal({
    //             title: Lang.get('messages.common.delete') + ' !',
    //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.testimonial.testimonial') + '" ?',
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
    //             window.livewire.emit('deleteTestimonial', testimonialId);
    //         });
    // });
    //
    // document.addEventListener('delete', function () {
    //     swal({
    //         title: Lang.get('messages.common.deleted') + ' !',
    //         text: Lang.get('messages.testimonial.testimonial') + Lang.get('messages.common.has_been_deleted'),
    //         type: 'success',
    //         confirmButtonColor: '#6777ef',
    //         timer: 2000,
    //     });
    // });

    $('#addModal').on('hidden.bs.modal', function () {
        resetModalForm('#addNewForm', '#validationErrorsBox');
        quill.setContents([{ insert: '' }]);
        // $('#previewImage').attr('src', defaultDocumentImageUrl);
        $('#previewImage').css('background-image','url("' + defaultDocumentImageUrl + '")');

    });

    $('#editModal').on('hidden.bs.modal', function () {
        resetModalForm('#editForm', '#editValidationErrorsBox');
        // $('#editForm')[0].reset();
    });

    let quill = new Quill('#description', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
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

    $(document).on('change', '#customerImage', function () {
        if (isValidFile($(this), '#validationErrorsBox')) {
            displayPhoto(this, '#previewImage');
        }
    });

    $(document).on('change', '#editCustomerImage', function () {
        if (isValidFile($(this), '#editValidationErrorsBox')) {
            displayPhoto(this, '#editPreviewImage');
        }
    });
});

// let source = $('#actionTemplate')[0].innerHTML;
// window.actionTemplate = Handlebars.compile(source);
