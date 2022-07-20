'use strict';

$(document).ready(function () {
    let tableName = '#companiesTbl';
    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        'language': {
            'lengthMenu': 'Show _MENU_',
        },
        'order': [[1, 'desc']],
        ajax: {
            url: companiesUrl,
            data: function (data) {
                data.is_featured = $('#filter_featured').find('option:selected').val();
                data.is_status = $('#filter_status').find('option:selected').val();
            },
        },
        columnDefs: [
            {
                'targets': [0],
                'width': '10%',
            },
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '5%',
            },
            {
                'targets': [3],
                'orderable': false,
                'className': 'text-center',
                'width': '5%',
            },
            {
                'targets': [4],
                'orderable': false,
                'className': 'text-center',
                'width': '9%',
            },
            {
                'targets': [5],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="${companiesUrl}/${row.id}">
                                    <div class="">
                                        <img src="${row.company_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                           <div class="d-flex flex-column">
                                <a href="${companiesUrl}/${row.id}" class="mb-1">${row.user.full_name}</a>
                                <span>${row.user.email}</span>
                            </div>
                         </div>`;
                },
                name: 'user.first_name',
            },
            {
                data: function data (row) {
                    return row.created_at;
                },
                name: 'created_at',
                searchable: false,
                visible: false,
            },
            {
                data: function (row) {
                    let featured = row.active_featured;
                    let expiryDate;
                    if (featured) {
                        expiryDate = moment(featured.end_time).format('YYYY-MM-DD');
                    }
                    let data = [
                        {
                            'id': row.id,
                            'featured': featured,
                            'expiryDate': expiryDate,
                        }];
                    return prepareTemplateRender('#isFeatured', data);
                },
                name: 'user.last_name',
            },
            {
                data: function (row) {
                    let email_verified = row.user.email_verified_at;
                    let url = companiesUrl + '/' + row.id;
                    let data = [{
                        'id': row.id,
                        'email_verified': email_verified,
                        'url': url + '/send-email-verification',
                    }];
                    return prepareTemplateRender('#isEmailVerified', data);
                },
                name: 'user.email_verified_at',
            },
            {
                data: function (row) {
                    let checked = row.user.is_active === 0 ? '' : 'checked';
                    let data = [{'id': row.id, 'checked': checked}];
                    return prepareTemplateRender('#isActive', data);
                },
                name: 'user.is_active',
            },
            {
                data: function (row) {
                    let url = companiesUrl + '/' + row.id;
                    let data = [
                        {
                            'id': row.id,
                            'url': url + '/edit',
                        }];
                    return prepareTemplateRender('#companyActionTemplate',
                        data);
                }, name: 'id',
            },
        ],
        'fnInitComplete': function () {
            $('#filter_featured,#filter_status').change(function () {
                $(tableName).DataTable().ajax.reload(null, true);
            });
        },
    });
    handleSearchDatatable(tbl);
    $(document).ready(function () {
        $('#filter_featured').select2();
        $('#filter_status').select2();
    });

    $(document).ready(function () {
        $(document).on('click', '#resetFilter', function () {
            $('#filter_featured').val('').trigger('change');
            $('#filter_status').val('').trigger('change');
        });
    });

    $(document).on('click', '.adminMakeFeatured', function (event) {
        let companyId = $(event.currentTarget).data('id');
        makeFeatured(companyId);
    });

    window.makeFeatured = function (id) {
        $.ajax({
            url: companiesUrl + '/' + id + '/mark-as-featured',
            method: 'post',
            cache: false,
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('[data-toggle="tooltip"]').tooltip('hide');
                    $(tableName).DataTable().ajax.reload(null, true);
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    };

    $(document).on('click', '.adminUnFeatured', function (event) {
        let companyId = $(event.currentTarget).data('id');
        makeUnFeatured(companyId);
    });

    window.makeUnFeatured = function (id) {
        $.ajax({
            url: companiesUrl + '/' + id + '/mark-as-unfeatured',
            method: 'post',
            cache: false,
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('[data-toggle="tooltip"]').tooltip('hide');
                    $(tableName).DataTable().ajax.reload(null, true);
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    };

    // $(document).on('click', '.delete-btn', function (event) {
    //     let companyId = $(event.currentTarget).attr('data-id');
    //     swal({
    //             title: Lang.get('messages.common.delete') + ' !',
    //             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' +
    //                 Lang.get('messages.company.employer') + '" ?',
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
    //             window.livewire.emit('deleteEmployee', companyId);
    //         });
    // });
    //
    // document.addEventListener('delete', function () {
    //     swal({
    //         title: Lang.get('messages.common.deleted') + ' !',
    //         text: Lang.get('messages.company.employer') +
    //             Lang.get('messages.common.has_been_deleted'),
    //         type: 'success',
    //         confirmButtonColor: '#6777ef',
    //         timer: 2000,
    //     });
    // });

    $(document).on('click', '.delete-btn', function (event) {
        var companyId = $(event.currentTarget).data('id');
        deleteItem(companiesUrl + '/' + companyId, tableName,
            Lang.get('messages.company.employer'));
    });

    $(document).on('change', '.isFeatured', function (event) {
        let companyId = $(event.currentTarget).data('id');
        activeIsFeatured(companyId);
    });

    $(document).on('change', '.isActive', function (event) {
        let companyId = $(event.currentTarget).data('id');
        changeIsActive(companyId);
    });

    window.changeIsActive = function (id) {
        $.ajax({
            url: companiesUrl + '/' + id + '/change-is-active',
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

    $(document).on('change', '.is-email-verified', function (event) {
        if ($(this).is(':checked')) {
            let companyId = $(event.currentTarget).data('id');
            changeEmailVerified(companyId);
            $(this).attr('disabled', true);
        } else {
            return false;
        }
    });

    window.changeEmailVerified = function (id) {
        $.ajax({
            url: companiesUrl + '/' + id + '/verify-email',
            method: 'post',
            cache: false,
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $(tableName).DataTable().ajax.reload(null, true);
                    return true;
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    };

    $(document).on('click', '.send-email-verification', function (event) {
        let companyId = $(event.currentTarget).attr('data-id');
        let isDisabled = $(this);
        isDisabled.addClass('disabled');

        $.ajax({
            url: companiesUrl + '/' + companyId + '/resend-email-verification',
            type: 'post',
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    isDisabled.removeClass('disabled');
                    return true;
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });

    // $(document).ready(function () {
    //     $('#filter_featured').on('change', function (e) {
    //         var data = $('#filter_featured').select2('val');
    //         window.livewire.emit('changeFilter', 'featured', data);
    //     });
    //
    //     $('#filter_status').on('change', function (e) {
    //         var data = $('#filter_status').select2('val');
    //         window.livewire.emit('changeFilter', 'status', data);
    //     });
    // });
});
