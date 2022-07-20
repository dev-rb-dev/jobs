/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*******************************************************************************************!*\
  !*** ./resources/assets/js/candidates/candidate-profile/candidate_career_informations.js ***!
  \*******************************************************************************************/


$(document).ready(function () {
  $('#countryId').select2({
    dropdownParent: $('#addExperienceModal')
  }); // $('#educationCountryId').select2({
  //     dropdownParent: $('#addEducationModal')
  // });

  $('#educationYearId,#degreeLevelId,#educationCountryId').select2({
    dropdownParent: $('#addEducationModal')
  });
  $('#editYear,#editDegreeLevel,#editEducationCountry, #editEducationState, #editEducationCity').select2({
    dropdownParent: $('#editEducationModal')
  });
  $('#editCountry, #editState, #editCity').select2({
    dropdownParent: $('#editExperienceModal')
  }); // $('#editEducationCountry, #editEducationState, #editEducationCity').select2({
  //     dropdownParent: $('#editEducationModal')
  // });
  // $('#degreeLevelId').select2({
  //     'width': '100%',
  // });

  $('#addExperienceModal').on('shown.bs.modal', function () {
    setDatePicker('#startDateExperience', '#endDateExperience');
  });
  $('#editExperienceModal').on('shown.bs.modal', function () {
    var minDate = $('#editStartDate').val();
    setDatePicker('#editStartDate', '#editEndDate', minDate);
  });

  window.setDatePicker = function (startDateExperience, endDateExperience) {
    var minDate = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
    var startpicker = $(startDateExperience).flatpickr({
      format: 'YYYY-MM-DD',
      useCurrent: true,
      sideBySide: true,
      maxDate: new Date(),
      onChange: function onChange(selectedDates, dateStr, instance) {
        endpicker.clear();
        endpicker.set('minDate', dateStr);
      }
    });
    var endpicker = $(endDateExperience).flatpickr({
      format: 'YYYY-MM-DD',
      sideBySide: true,
      maxDate: new Date(),
      useCurrent: false,
      minDate: minDate
    });
  };

  window.setExperienceSelect2 = function () {
    $('#stateId').select2({
      'width': '100%',
      'placeholder': 'Select State',
      dropdownParent: $('#addExperienceModal')
    });
    $('#cityId').select2({
      'width': '100%',
      'placeholder': 'Select City',
      dropdownParent: $('#addExperienceModal')
    });
  };

  window.setEducationSelect2 = function () {
    $('#educationStateId').select2({
      'width': '100%',
      'placeholder': 'Select State',
      dropdownParent: $('#addEducationModal')
    });
    $('#educationCityId').select2({
      'width': '100%',
      'placeholder': 'Select City',
      dropdownParent: $('#addEducationModal')
    });
  };

  $('#default').on('click', function () {
    if ($(this).prop('checked') == true) {
      $('#endDateExperience').prop('disabled', true);
      $('#endDateExperience').val('');
      $('#endDateExperience').val('').removeAttr('required', false);
      $('#requiredText').addClass('d-none');
    } else if ($(this).prop('checked') == false) {
      $('#endDateExperience').val('').attr('required', true);
      $('#requiredText').removeClass('d-none');
      $('#endDateExperience').prop('disabled', false);
    }
  });
  $('#editWorking').on('click', function () {
    if ($(this).prop('checked') == true) {
      $('#editEndDate').prop('disabled', true);
      $('#editEndDate').val('');
      $('#editEndDate').val('').removeAttr('required', false);
      $('#editRequiredText').addClass('d-none');
    } else if ($(this).prop('checked') == false) {
      $('#editEndDate').val('').attr('required', true);
      $('#editRequiredText').removeClass('d-none');
      $('#editEndDate').prop('disabled', false);
    }
  });
  $('.addExperienceModal').on('click', function () {
    setExperienceSelect2();
    $('#addExperienceModal').appendTo('body').modal('show');
  });
  $('.addEducationModal').on('click', function () {
    setEducationSelect2();
    $('#addEducationModal').appendTo('body').modal('show');
  });
  $('#addEducationModal').on('shown.bs.modal', function () {
    $(this).find('input:text').first().blur();
  });

  window.renderExperienceTemplate = function (experienceArray) {
    var candidateExperienceCount = $('.candidate-experience-container .candidate-experience:last').data('experience-id') != undefined ? $('.candidate-experience-container .candidate-experience:last').data('experience-id') + 1 : 0;
    var template = $.templates('#candidateExperienceTemplate');
    var endDateExperience = experienceArray.currently_working == 1 ? present : moment(experienceArray.end_date, 'YYYY-MM-DD').format('Do MMM, YYYY');
    var data = {
      candidateExperienceNumber: candidateExperienceCount,
      id: experienceArray.id,
      title: experienceArray.experience_title,
      company: experienceArray.company,
      startDateExperience: moment(experienceArray.start_date, 'YYYY-MM-DD').format('Do MMM, YYYY'),
      endDateExperience: endDateExperience,
      description: experienceArray.description,
      country: experienceArray.country
    };
    var stageTemplateHtml = template.render(data);
    $('.candidate-experience-container').append(stageTemplateHtml);
    $('#notfoundExperience').addClass('d-none');
  };

  $(document).on('submit', '#addNewExperienceForm', function (e) {
    e.preventDefault();
    var startDateExperience = new Date($('#startDateExperience').val());
    var endDateExperience = new Date($('#endDateExperience').val());

    if (endDateExperience < startDateExperience) {
      displayErrorMessage('The start date must be a date before end date.');
      return false;
    }

    processingBtn('#addNewExperienceForm', '#btnExperienceSave', 'loading');
    $.ajax({
      url: addExperienceUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          $('#notfoundExperience').addClass('d-none');
          displaySuccessMessage(result.message);
          $('#addExperienceModal').modal('hide');
          renderExperienceTemplate(result.data);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addNewExperienceForm', '#btnExperienceSave');
      }
    });
  });
  $(document).on('click', '.edit-experience', function (event) {
    var experienceId = $(event.currentTarget).data('id');
    renderExperienceData(experienceId);
  });

  window.renderExperienceData = function (id) {
    $.ajax({
      url: candidateUrl + id + '/edit-experience',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#experienceId').val(result.data.id);
          $('#editTitle').val(result.data.experience_title);
          $('#editCompany').val(result.data.company);
          $('#editCountry').val(result.data.country_id).trigger('change', [{
            stateId: result.data.state_id,
            cityId: result.data.city_id
          }]);
          $('#editStartDate').val(moment(result.data.start_date).format('YYYY-MM-DD'));
          $('#editDescription').val(result.data.description);

          if (result.data.currently_working == 1) {
            $('#editWorking').prop('checked', true);
            $('#editEndDate').val('');
          } else {
            $('#editWorking').prop('checked', false);
            $('#editEndDate').val(moment(result.data.end_date).format('YYYY-MM-DD'));
            $('#editRequiredText').removeClass('d-none');
          }

          if (result.data.currently_working == 1) {
            $('#editEndDate').prop('disabled', true);
          }

          $('#editExperienceModal').appendTo('body').modal('show');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  };

  $(document).on('submit', '#editExperienceForm', function (event) {
    event.preventDefault();
    var startDateExperience = new Date($('#editStartDate').val());
    var endDateExperience = new Date($('#editEndDate').val());

    if (endDateExperience < startDateExperience) {
      displayErrorMessage('The start date must be a date before end date.');
      return false;
    }

    processingBtn('#editExperienceForm', '#btnEditExperienceSave', 'loading');
    var id = $('#experienceId').val();
    $.ajax({
      url: experienceUrl + id,
      type: 'put',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#editExperienceModal').modal('hide');
          setTimeout(function () {
            location.reload();
          }, 3000);
          $('.candidate-experience-container').children('.candidate-experience').each(function () {
            var candidateExperienceId = $(this).attr('data-id');

            if (candidateExperienceId == result.data.id) {
              $(this).remove();
            }
          });
          renderExperienceTemplate(result.data.candidateExperience);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#editExperienceForm', '#btnEditExperienceSave');
      }
    });
  });
  $('#addExperienceModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewExperienceForm', '#validationErrorsBox');
    $('#countryId, #stateId, #cityId').val('');
    $('#stateId, #cityId').empty();
    $('#countryId').trigger('change.select2');
  });
  $('#addEducationModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewEducationForm', '#validationErrorsBox');
    $('#degreeLevelId').val('');
    $('#degreeLevelId').select2({
      'width': '100%',
      'placeholder': 'Select Degree Level'
    });
    $('#educationCountryId, #educationStateId, #educationCityId').val('');
    $('#educationStateId, #educationCityId').empty();
    $('#educationCountryId').trigger('change.select2');
  });
  $(document).on('click', '.delete-experience', function (event) {
    var experienceId = $(event.currentTarget).data('id');
    deleteItem(experienceUrl + experienceId, 'Experience', '.candidate-experience-container', '.candidate-experience', '#notfoundExperience');
  });

  window.renderEducationTemplate = function (educationArray) {
    var candidateEducationCount = $('.candidate-education-container .candidate-education:last').data('education-id') != undefined ? $('.candidate-education-container .candidate-education:last').data('experience-id') + 1 : 0;
    var template = $.templates('#candidateEducationTemplate');
    var data = {
      candidateEducationNumber: candidateEducationCount,
      id: educationArray.id,
      degreeLevel: educationArray.degree_level.name,
      degreeTitle: educationArray.degree_title,
      year: educationArray.year,
      country: educationArray.country,
      institute: educationArray.institute
    };
    var stageTemplateHtml = template.render(data);
    $('.candidate-education-container').append(stageTemplateHtml);
    $('#notfoundEducation').addClass('d-none');
  };

  $(document).on('submit', '#addNewEducationForm', function (e) {
    e.preventDefault();
    processingBtn('#addNewEducationForm', '#btnEducationSave', 'loading');
    $.ajax({
      url: addEducationUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          $('#notfoundEducation').addClass('d-none');
          displaySuccessMessage(result.message);
          $('#addEducationModal').modal('hide');
          renderEducationTemplate(result.data);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addNewEducationForm', '#btnEducationSave');
      }
    });
  });
  $(document).on('click', '.edit-education', function (event) {
    var educationId = $(event.currentTarget).data('id');
    renderEducationData(educationId);
  });

  window.renderEducationData = function (id) {
    $.ajax({
      url: candidateUrl + id + '/edit-education',
      type: 'GET',
      success: function success(result) {
        if (result.success) {
          $('#educationId').val(result.data.id);
          $('#editDegreeLevel').val(result.data.degree_level.id).trigger('change');
          $('#editDegreeTitle').val(result.data.degree_title);
          $('#editEducationCountry').val(result.data.country_id).trigger('change', [{
            stateId: result.data.state_id,
            cityId: result.data.city_id
          }]);
          $('#editInstitute').val(result.data.institute);
          $('#editResult').val(result.data.result);
          $('#editYear').val(result.data.year).trigger('change');
          $('#editEducationModal').appendTo('body').modal('show');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      }
    });
  };

  $(document).on('submit', '#editEducationForm', function (event) {
    event.preventDefault();
    processingBtn('#editEducationForm', '#btnEditEducationSave', 'loading');
    var id = $('#educationId').val();
    $.ajax({
      url: educationUrl + id,
      type: 'put',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#editEducationModal').modal('hide');
          setTimeout(function () {
            location.reload();
          }, 3000);
          $('.candidate-education-container').children('.candidate-education').each(function () {
            var candidateEducationId = $(this).attr('data-id');

            if (candidateEducationId == result.data.id) {
              $(this).remove();
            }
          });
          renderEducationTemplate(result.data.candidateEducation);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#editEducationForm', '#btnEditEducationSave');
      }
    });
  });
  $('#editEducationModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewEducationForm', '#validationErrorsBox');
  });
  $(document).on('click', '.delete-education', function (event) {
    var educationId = $(event.currentTarget).data('id');
    deleteItem(educationUrl + educationId, 'Education', '.candidate-education-container', '.candidate-education', '#notfoundEducation');
  });

  window.deleteItem = function (url, header, parent, child, selector) {
    var swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
        cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0'
      },
      buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
      title: Lang.get('messages.common.delete') + ' !',
      text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + header + '" ?',
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
        deleteItemAjax(url, header, parent, child, selector);
      }
    });
  };

  function deleteItemAjax(url, header, parent, child, selector) {
    $.ajax({
      url: url,
      type: 'DELETE',
      dataType: 'json',
      success: function success(obj) {
        if (obj.success) {
          $(parent).children(child).each(function () {
            var templateId = $(this).attr('data-id');

            if (templateId == obj.data) {
              $(this).remove();
            }
          });

          if ($(parent).children(child).length <= 0) {
            $(selector).removeClass('d-none');
          }
        }

        swal({
          title: Lang.get('messages.common.deleted') + ' !',
          text: header + Lang.get('messages.common.has_been_deleted'),
          type: 'success',
          confirmButtonColor: '#009ef7',
          timer: 2000
        }); // if (callFunction) {
        //     eval(callFunction);
        // }
      },
      error: function error(data) {
        swal({
          title: '',
          text: data.responseJSON.message,
          type: 'error',
          confirmButtonColor: '#009ef7',
          timer: 5000
        });
      }
    });
  }

  $('#countryId, #educationCountryId, #editCountry, #editEducationCountry').on('change', function (e, paramData) {
    var modalType = $(this).data('modal-type');
    var modalTypeHasEdit = typeof $(this).data('is-edit') === 'undefined' ? false : true;
    $.ajax({
      url: companyStateUrl,
      type: 'get',
      dataType: 'json',
      data: {
        postal: $(this).val()
      },
      success: function success(data) {
        $(modalType === 'experience' ? !modalTypeHasEdit ? '#stateId' : '#editState' : !modalTypeHasEdit ? '#educationStateId' : '#editEducationState').empty();
        $(modalType === 'experience' ? !modalTypeHasEdit ? '#stateId' : '#editState' : !modalTypeHasEdit ? '#educationStateId' : '#editEducationState').append('<option value="" selected>Select State</option>');
        $.each(data.data, function (i, v) {
          $(modalType === 'experience' ? !modalTypeHasEdit ? '#stateId' : '#editState' : !modalTypeHasEdit ? '#educationStateId' : '#editEducationState').append($('<option></option>').attr('value', i).text(v));
        });
        if (modalTypeHasEdit) $(modalType === 'experience' ? '#editState' : '#editEducationState').val(typeof paramData !== 'undefined' ? paramData.stateId : '').trigger('change', typeof paramData !== 'undefined' ? [{
          cityId: paramData.cityId
        }] : '');
      }
    });
  });
  $('#stateId, #educationStateId, #editState, #editEducationState').on('change', function (e, paramData) {
    var modalType = $(this).data('modal-type');
    var modalTypeHasEdit = typeof $(this).data('is-edit') === 'undefined' ? false : true;
    $.ajax({
      url: companyCityUrl,
      type: 'get',
      dataType: 'json',
      data: {
        state: $(this).val(),
        country: $(modalType === 'experience' ? !modalTypeHasEdit ? '#countryId' : '#editCountry' : !modalTypeHasEdit ? '#educationCountryId' : '#editEducationCountry').val()
      },
      success: function success(data) {
        $(modalType === 'experience' ? !modalTypeHasEdit ? '#cityId' : '#editCity' : !modalTypeHasEdit ? '#educationCityId' : '#editEducationCity').empty();
        $(modalType === 'experience' ? !modalTypeHasEdit ? '#cityId' : '#editCity' : !modalTypeHasEdit ? '#educationCityId' : '#editEducationCity').append('<option value="" selected>Select City</option>');
        $.each(data.data, function (i, v) {
          $(modalType === 'experience' ? !modalTypeHasEdit ? '#cityId' : '#editCity' : !modalTypeHasEdit ? '#educationCityId' : '#editEducationCity').append($('<option></option>').attr('value', i).text(v));
        });
        if (modalTypeHasEdit) $(modalType === 'experience' ? '#editCity' : '#editEducationCity').val(typeof paramData !== 'undefined' ? paramData.cityId : '').trigger('change.select2');
      }
    });
  });
});
/******/ })()
;