/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ./resources/assets/js/candidate/applied-jobs.js ***!
  \*******************************************************/


var filterJobId = null;
document.addEventListener('livewire:load', function (event) {
  window.livewire.hook('message.processed', function () {
    $('#jobApplicationStatus').select2({
      width: '100%'
    });
    $('#jobApplicationStatus').val(filterJobId).trigger('change.select2');
    setTimeout(function () {
      $('.alert').fadeOut('fast');
    }, 4000);
  });
});
$(document).on('click', '.apply-job-note', function (event) {
  var appliedJobId = $(event.currentTarget).attr('data-id');
  $.ajax({
    url: candidateAppliedJobUrl + '/' + appliedJobId,
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        $('#showNote').html('');
        if (!isEmpty(result.data.notes) ? $('#showNote').append(result.data.notes) : $('#showNote').append('N/A')) $('#showModal').appendTo('body').modal('show');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
$(document).on('click', '.remove-applied-jobs', function (event) {
  var jobId = $(event.currentTarget).attr('data-id');
  var swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
      cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0'
    },
    buttonsStyling: false
  });
  swalWithBootstrapButtons.fire({
    title: Lang.get('messages.common.delete') + ' !',
    text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.applied_job.applied_jobs') + '" ?',
    icon: 'warning',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }).then(function (result) {
    if (result.isConfirmed) {
      window.livewire.emit('removeAppliedJob', jobId);
    }
  });
});
document.addEventListener('deleted', function () {
  swal({
    title: Lang.get('messages.common.deleted') + ' !',
    text: Lang.get('messages.applied_job.applied_jobs') + Lang.get('messages.common.has_been_deleted'),
    type: 'success',
    confirmButtonColor: '#009ef7',
    timer: 2000
  });
});
document.addEventListener('notDeleted', function () {
  swal({
    type: 'error',
    title: 'Not Deleted',
    text: 'Job can\'t be Deleted'
  });
});
$(document).ready(function () {
  $('#jobApplicationStatus').on('change', function () {
    filterJobId = $(this).val();
    window.livewire.emit('changeFilter', 'jobApplicationStatus', $(this).val());
  });
  $('#jobApplicationStatus').select2({
    width: '100%'
  });
});
$(document).on('click', '.schedule-slot-book', function (event) {
  var appliedJobId = $(event.currentTarget).attr('data-id');
  $.ajax({
    url: candidateAppliedJobUrl + '/' + appliedJobId + '/schedule-slot-book',
    type: 'POST',
    success: function success(result) {
      if (result.success) {
        if (!isEmpty(result.data)) {
          //slot rejected
          if (result.data.rejectedSlot) {
            if (!isEmpty(result.data.employer_cancel_note)) {
              $('#scheduleSlotBookValidationErrorsBox').removeClass('d-none').html(result.data.company_fullName + Lang.get('messages.job_stage.cancel_your_selected_slot') + '<br>' + '<b>Reason</b>:- ' + result.data.employer_cancel_note);
              $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').addClass('d-none');
            } else {
              $('#scheduleSlotBookValidationErrorsBox').removeClass('d-none').html(Lang.get('messages.job_stage.you_have_rejected_all_slot'));
              $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').addClass('d-none');
            }

            $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').addClass('d-none');
          }

          if (result.data.scheduleSelect >= 0) {
            $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').addClass('d-none');
          }

          if (!result.data.rejectedSlot) {
            $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').removeClass('d-none');
            var index = 0;
            $.each(result.data, function (i, v) {
              if (!isEmpty(v.job_Schedule_Id)) {
                index++;
                var data = {
                  'index': index,
                  'notes': v.notes,
                  'schedule_date': v.schedule_date,
                  'schedule_time': v.schedule_time,
                  'schedule_id': v.job_Schedule_Id
                };
                $('.slot-main-div').append(prepareTemplateRender('#scheduleSlotBookHtmlTemplate', data));
                $('.choose-slot-textarea').removeClass('d-none');
                $('#scheduleSlotBookValidationErrorsBox').addClass('d-none');
              }
            });
          } //display selected slot


          if (result.data.selectSlot.length != 0) {
            $.each(result.data.selectSlot, function (i, v) {
              var data = {
                'notes': !isEmpty(v.notes) ? v.notes : 'New Slot Send.',
                'schedule_date': v.date,
                'schedule_time': v.time
              };
              $('.slot-main-div').append(prepareTemplateRender('#selectedSlotBookHtmlTemplate', data));
            });
            $('#selectedSlotBookValidationErrorsBox').removeClass('d-none').html(Lang.get('messages.job_stage.you_have_selected_this_slot'));
          } //history


          if (!isEmpty(result.data)) {
            $('#historyMainDiv').removeClass('d-none');
            $.each(result.data, function (i, v) {
              if ($.type(v) == 'object' && isEmpty(v.job_Schedule_Id)) {
                if (!isEmpty(v.notes)) {
                  var data = {
                    'notes': v.notes,
                    'companyName': v.company_name,
                    'schedule_created_at': v.schedule_created_at
                  };
                  $('#historyDiv').prepend(prepareTemplateRender('#chooseSlotHistoryHtmlTemplate', data));
                }
              }
            });
          } else {
            $('#historyMainDiv').addClass('d-none');
          }

          if (result.data.scheduleSelect == 1) {
            $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').addClass('d-none');
          }
        }

        $('#scheduleSlotBookModal').appendTo('body').modal('show');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
$('#scheduleSlotBookModal').on('hidden.bs.modal', function () {
  $('.slot-main-div').html('');
  $('.choose-slot-textarea textarea').val('');
  $('.choose-slot-textarea').addClass('d-none');
  $('#selectedSlotBookValidationErrorsBox').addClass('d-none');
  $('#historyDiv').html('');
  $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').attr('disabled', false);
  $('#rejectSlotBtnSave').val('');
});
$('#rejectSlotBtnSave').click(function () {
  $(this).val('rejectSlot');
});
$('#scheduleInterviewBtnSave').click(function () {
  $('#rejectSlotBtnSave').val('');
});
$(document).on('submit', '#scheduleSlotBookForm', function (e) {
  e.preventDefault();
  $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').attr('disabled', true);
  var appliedJobId = $('.schedule-slot-book').attr('data-id');
  var scheduleId;
  var formData = new FormData($(this)[0]);
  $.each($('.slot-book'), function (i) {
    if ($(this).prop('checked')) {
      scheduleId = $(this).data('schedule');
    }
  });
  formData.append('rejectSlot', $('#rejectSlotBtnSave').val());
  formData.append('schedule_id', scheduleId);
  $.ajax({
    url: candidateAppliedJobUrl + '/' + appliedJobId + '/choose-preference',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#scheduleSlotBookModal').modal('hide');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
      $('#scheduleInterviewBtnSave,#rejectSlotBtnSave').attr('disabled', false);
    },
    complete: function complete() {
      processingBtn('#scheduleSlotBookForm', '#scheduleInterviewBtnSave');
    }
  });
});
/******/ })()
;