'use strict';

$(document).ready(function () {
    $('#filter_status').select2({
        width: '100%',
    });

    $('#immediateAvailable').select2({
        width: '100%',
    });

    $('#jobSkills').select2({
        width: '100%',
    });
});

$(document).on('click', '.delete-btn', function (event) {
    let candidateId = $(event.currentTarget).data('id');
    deleteItem(candidateUrl + '/' + candidateId, tableName,
        Lang.get('messages.notification_settings.candidate'));
});

$(document).on('change', '.isActive', function (event) {
    let candidateId = $(event.currentTarget).data('id');
    $.ajax({
        url: candidateUrl + '/' + candidateId + '/' + 'change-status',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

$(document).on('change', '.is-candidate-email-verified', function (event) {
    if ($(this).is(':checked')) {
        let candidateId = $(event.currentTarget).data('id');
        changeEmailVerified(candidateId);
        $(this).attr('disabled', true);
    } else {
        let candidateId = $(event.currentTarget).data('id');
        changeEmailVerified(candidateId);
    }
});

window.changeEmailVerified = function (id) {
    $.ajax({
        url: candidateUrl + '/' + id + '/verify-email',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('click', '.send-email-verification', function (event) {
    let candidateId = $(event.currentTarget).attr('data-id');
    let isDisabled = $(this);
    isDisabled.addClass('disabled');
    $.ajax({
        url: candidateUrl + '/' + candidateId + '/resend-email-verification',
        type: 'post',
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, false);
                isDisabled.removeClass('disabled');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

$('#candidateFilters').on('click', function () {
    $('#candidateFiltersForm').toggleClass('d-block d-none');
});

$('#action_dropdown').click(function () {
    $('#candidateFiltersForm').removeClass('d-block').addClass('d-none');
});

$(document).ready(function () {
    $('#filter_status').on('change', function (e) {
        var data = $('#filter_status').select2('val');
        $(tableName).DataTable().ajax.reload(null, true);
    });

    $('#immediateAvailable').on('change', function (e) {
        var data = $('#immediateAvailable').select2('val');
        $(tableName).DataTable().ajax.reload(null, true);
    });

    $('#jobSkills').on('change', function (e) {
        var data = $('#jobSkills').select2('val');
        $(tableName).DataTable().ajax.reload(null, true);
    });
});

$(document).on('click', '#reset-filter', function () {
    $('#jobSkills,#immediateAvailable,#filter_status').val('').change();
});

$(document).on('click', function (event) {
    if ($(event.target).
        closest('#candidateFilters,#candidateFiltersForm').length === 0) {
        $('#candidateFiltersForm').removeClass('d-block').addClass('d-none');
    }
});

let tableName = '#candidateTbl';
let tbl = $(tableName).DataTable({
    processing: true,
    serverSide: true,
    'order': [[5, 'desc']],
    ajax: {
        url: candidateUrl,
        data: function (data) {
            data.job_skill = $('#jobSkills').find('option:selected').val();
            data.immediate_available = $('#immediateAvailable').
                find('option:selected').
                val();
            data.is_active = $('#filter_status').find('option:selected').val();
        },
    },
    columnDefs: [
        {
            'targets': [0],
            'width': '10%',
        },
        {
            'targets': [1],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
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
            'width': '9%',
        },
        {
            'targets': [4],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
        {
            'targets': [5],
            'visible': false,
        },
    ],
    columns: [
        {
            data: function (row) {
                return `<div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="${candidateUrl}/${row.id}">
                                    <div class="">
                                        <img src="${row.candidate_url}" alt="" class="user-img">
                                    </div>
                                </a>
                           </div>
                           <div class="d-flex flex-column">
                                <a href="${candidateUrl}/${row.id}" class="mb-1">${row.user.full_name}</a>
                                <span>${row.user.email}</span>
                            </div>
                         </div>`;
            },
            name: 'user.first_name',
        },
        {
            data: function (row) {
                let available = row.immediate_available;
                let data = [
                    {
                        'available': available,
                    }];
                return prepareTemplateRender('#isAvailabe', data);
            },
            name: 'user.last_name',
        },
        {
            data: function (row) {
                let email_verified = row.user.email_verified_at;
                let url = candidateUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'email_verified': email_verified,
                        'url': url + '/resend-email-verification',
                    }];
                return prepareTemplateRender('#isEmailVerified', data);
            },
            name: 'user.email_verified_at',
        },
        {
            data: function (row) {
                let checked = row.user.is_active === 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#isActive', data);
            },
            name: 'user.is_active',
        },
        {
            data: function (row) {
                let url = candidateUrl + '/' + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];
                return prepareTemplateRender('#candidateActionTemplate',
                    data);
            }, name: 'id',
        },
        {
            data: 'created_at',
            name: 'created_at',
        },
    ],
    'fnInitComplete': function () {
        $('#immediateAvailable,#jobSkills,#filter_status').change(function () {
            $(tableName).DataTable().ajax.reload(null, true);
        });
    },
});
handleSearchDatatable(tbl);

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#filter_status').val('').trigger('change');
        $('#immediateAvailable').val('').trigger('change');
        $('#jobSkills').val('').trigger('change');
    });
});
