/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/assets/js/job_published/create-edit.js ***!
  \**********************************************************/


$(document).ready(function () {
  if ($('#editDetails').length) {
    var editJobDescription = new Quill('#editDetails', {
      modules: {
        toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
      },
      placeholder: 'Enter Description',
      theme: 'snow'
    });
    editJobDescription.root.innerHTML = $('#editJobDescription').val();
    $(document).on('click', '#editBtnSave, #saveDraft', function (e) {
      processingBtn('#editJobForm', $(this), 'loading');
      var editor_content2 = editJobDescription.root.innerHTML;
      var input2 = JSON.stringify(editor_content2);

      if (editJobDescription.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        processingBtn('#editJobForm', '#editBtnSave');
        return false;
      }

      $('#editJobDescription').val(input2.replace(/"/g, ''));

      if ($('#salaryToErrorMsg').text() !== '') {
        $('#toSalary').focus();
        $('#saveJob,#draftJob').attr('disabled', false);
        processingBtn('#editJobForm', '#editBtnSave');
        return false;
      }

      $('#editJobForm')[0].submit();
    });
  }

  if ($('#details').length) {
    var details = new Quill('#details', {
      modules: {
        toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
      },
      placeholder: 'Enter Description',
      theme: 'snow'
    });
    $(document).on('click', '#btnSave, #saveDraft', function (e) {
      processingBtn('#createJobForm', $(this), 'loading');
      var editor_content1 = details.root.innerHTML;
      var input = JSON.stringify(editor_content1);

      if (details.getText().trim().length === 0) {
        displayErrorMessage('Description field is required.');
        processingBtn('#createJobForm', $(this));
        return false;
      }

      $('#job_desc').val(input.replace(/"/g, '')); // if (!checkSummerNoteEmpty('#details',
      //     'Job Description field is required.', 1)) {
      //     e.preventDefault();
      //     $('#saveJob,#draftJob').attr('disabled', false);
      //     return false;
      // }

      if ($('#salaryToErrorMsg').text() !== '') {
        $('#toSalary').focus();
        $('#saveJob,#draftJob').attr('disabled', false);
        processingBtn('#createJobForm', $(this));
        return false;
      }

      $('#createJobForm')[0].submit();
    });
  }

  new AutoNumeric('#toSalary', {
    maximumValue: 9999999999,
    currencySymbol: '',
    digitGroupSeparator: '\,',
    decimalPlaces: 1,
    currencySymbolPlacement: AutoNumeric.options.currencySymbolPlacement.suffix
  });
  new AutoNumeric('#fromSalary', {
    maximumValue: 9999999999,
    currencySymbol: '',
    digitGroupSeparator: '\,',
    decimalPlaces: 1,
    currencySymbolPlacement: AutoNumeric.options.currencySymbolPlacement.suffix
  });
  $('#toSalary').on('keyup', function () {
    var fromSalary = parseInt(Math.trunc(removeCommas($('#fromSalary').val())));
    var toSalary = parseInt(Math.trunc(removeCommas($('#toSalary').val())));

    if (toSalary < fromSalary) {
      $('#toSalary').focus();
      $('#salaryToErrorMsg').text(Lang.get('messages.job.please_enter_salary_range_to_greater_than_salary_range_from'));
      $('.actions [href=\'#next\']').css({
        'opacity': '0.7',
        'pointer-events': 'none'
      });
      $('#saveJob').attr('disabled', true);
    } else {
      $('#salaryToErrorMsg').text('');
      $('.actions [href=\'#next\']').css({
        'opacity': '1',
        'pointer-events': 'inherit'
      });
      $('#saveJob').attr('disabled', false);
    }
  });
  $('#toSalary').on('wheel', function (e) {
    $(this).trigger('keyup');
  });
  $('#fromSalary').on('keyup', function () {
    var fromSalary = parseInt(Math.trunc(removeCommas($('#fromSalary').val())));
    var toSalary = parseInt(Math.trunc(removeCommas($('#toSalary').val())));

    if (toSalary < fromSalary) {
      $('#fromSalary').focus();
      $('#salaryToErrorMsg').text(Lang.get('messages.job.please_enter_salary_range_to_greater_than_salary_range_from'));
      $('.actions [href=\'#next\']').css({
        'opacity': '0.7',
        'pointer-events': 'none'
      });
      $('#saveJob').attr('disabled', true);
    } else {
      $('#salaryToErrorMsg').text('');
      $('.actions [href=\'#next\']').css({
        'opacity': '1',
        'pointer-events': 'inherit'
      });
      $('#saveJob').attr('disabled', false);
    }
  });
  $('#fromSalary').on('wheel', function (e) {
    $(this).trigger('keyup');
  });
  $('#jobTypeId,#jobCategoryId,#careerLevelsId,#jobShiftId,#countryId,#stateId,#cityId,#salaryPeriodsId,#requiredDegreeLevelId,#functionalAreaId').select2({
    width: !employerPanel ? 'calc(100% - 44px)' : '100%'
  });
  $('#preferenceId,#currencyId,#stateID').select2({
    width: '100%'
  });
  $('#countryID').select2({
    width: '100%',
    dropdownParent: $('#addStateModal')
  });
  $('#stateID').select2({
    width: '100%',
    dropdownParent: $('#addCityModal')
  });
  $('#SkillId').select2({
    width: !employerPanel ? 'calc(100% - 44px)' : '100%',
    placeholder: 'Select Job Skill'
  });
  $('#tagId').select2({
    width: !employerPanel ? 'calc(100% - 44px)' : '100%',
    placeholder: 'Select Job Tag'
  });

  if (!$('#companyId').hasClass('.select2-hidden-accessible') && $('#companyId').is('select')) {
    $('#companyId').select2({
      width: '100%'
    });
  }

  var date = new Date();
  date.setDate(date.getDate() + 1);
  $('.expiryDatepicker').flatpickr({
    format: 'YYYY-MM-DD',
    useCurrent: false,
    minDate: new Date(new Date().valueOf() + 1000 * 3600 * 24)
  }); // $('#details').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     placeholder: 'Enter Job Details...',
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });
  // $('#jobCategoryDescription, #skillDescription, #salaryPeriodDescription, #jobShiftDescription, #jobTagDescription').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });
  // $('#editDetails').summernote({
  //     minHeight: 200,
  //     height: 200,
  //     placeholder: 'Enter Job Details...',
  //     toolbar: [
  //         ['style', ['bold', 'italic', 'underline', 'clear']],
  //         ['font', ['strikethrough']],
  //         ['para', ['paragraph']]],
  // });

  window.autoNumeric = function (formId, validationBox) {
    $(formId)[0].reset();
    $('select.select2Selector').each(function (index, element) {
      var drpSelector = '#' + $(this).attr('id');
      $(drpSelector).val('');
      $(drpSelector).trigger('change');
    });
    $(validationBox).hide();
  };
});
$('#countryId').on('change', function () {
  $.ajax({
    url: jobStateUrl,
    type: 'get',
    dataType: 'json',
    data: {
      postal: $(this).val()
    },
    success: function success(data) {
      $('#cityId').empty();
      $('#cityId').append($('<option value=""></option>').text('Select City'));
      $('#stateId').empty();
      $('#stateId').append($('<option value=""></option>').text('Select State'));
      $.each(data.data, function (i, v) {
        $('#stateId').append($('<option></option>').attr('value', i).text(v));
      });
    }
  });
});
$('#stateId').on('change', function () {
  $.ajax({
    url: jobCityUrl,
    type: 'get',
    dataType: 'json',
    data: {
      state: $(this).val(),
      country: $('#countryId').val()
    },
    success: function success(data) {
      $('#cityId').empty();
      $('#cityId').append($('<option value=""></option>').text('Select City'));
      $.each(data.data, function (i, v) {
        $('#cityId').append($('<option ></option>').attr('value', i).text(v));
      });
    }
  });
});

if ($('#jobTypeDescription').length) {
  var jobTypeDescription = new Quill('#jobTypeDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    theme: 'snow'
  });
  $('#addJobTypeModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobTypeForm', '#jobTypeValidationErrorsBox');
    jobTypeDescription.setContents([{
      insert: ''
    }]);
  });
  $(document).on('submit', '#addJobTypeForm', function (e) {
    e.preventDefault();
    processingBtn('#addJobTypeForm', '#jobTypeBtnSave', 'loading');
    var editor_content = jobTypeDescription.root.innerHTML;
    var input = JSON.stringify(editor_content);
    $('#job_type_desc').val(input.replace(/"/g, ''));
    $.ajax({
      url: jobTypeSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobTypeModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.name
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#jobTypeId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobTypeForm', '#jobTypeBtnSave');
      }
    });
  });
}

if ($('#jobCategoryDescription').length) {
  var jobCategoryDescription = new Quill('#jobCategoryDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    theme: 'snow'
  });
  $('#addJobCategoryModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobCategoryForm', '#jobCategoryValidationErrorsBox');
    jobCategoryDescription.setContents([{
      insert: ''
    }]); // $('#jobCategoryDescription').summernote('code', '');
  });
  $(document).on('submit', '#addJobCategoryForm', function (e) {
    e.preventDefault();
    processingBtn('#addJobCategoryForm', '#jobCategoryBtnSave', 'loading'); // if (!checkSummerNoteEmpty('#jobCategoryDescription',
    //     'Description field is required.')) {
    //     processingBtn('#addJobCategoryForm', '#jobCategoryBtnSave');
    //     return true;
    // }

    var editor_content = jobCategoryDescription.root.innerHTML;

    if (jobCategoryDescription.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#jobCategoryDescriptionValue').val(input.replace(/"/g, ''));
    $.ajax({
      url: jobCategorySaveUrl,
      type: 'POST',
      data: new FormData($(this)[0]),
      dataType: 'JSON',
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobCategoryModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.name
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#jobCategoryId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobCategoryForm', '#jobCategoryBtnSave');
      }
    });
  });
}

if ($('#skillDescription').length) {
  $('#addSkillModal').on('hidden.bs.modal', function () {
    resetModalForm('#addSkillForm', '#skillValidationErrorsBox');
    skillDescription.setContents([{
      insert: ''
    }]); // $('#skillDescription').summernote('code', '');
  });
  var skillDescription = new Quill('#skillDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    theme: 'snow'
  });
  $('#addSkillForm').on('submit', function (e) {
    var editor_content1 = skillDescription.root.innerHTML;
    var input = JSON.stringify(editor_content1);

    if (skillDescription.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    $('#skill_desc').val(input.replace(/"/g, '')); // if (!checkSummerNoteEmpty('#details',
    //     'Job Description field is required.', 1)) {
    //     e.preventDefault();
    //     $('#saveJob,#draftJob').attr('disabled', false);
    //     return false;
    // }

    if ($('#salaryToErrorMsg').text() !== '') {
      $('#toSalary').focus();
      $('#skillBtnSave').attr('disabled', false);
      return false;
    }
  });
  $(document).on('submit', '#addSkillForm', function (e) {
    e.preventDefault();
    var editor_content = skillDescription.root.innerHTML;

    if (skillDescription.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#skill_desc').val(input.replace(/"/g, '')); // if (!checkSummerNoteEmpty('#skillDescription',
    //     'Description field is required.')) {
    //     return true;
    // }

    processingBtn('#addSkillForm', '#skillBtnSave', 'loading');
    $.ajax({
      url: skillSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addSkillModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.name
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#SkillId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addSkillForm', '#skillBtnSave');
      }
    });
  });
}

if ($('#jobTagDescription').length) {
  var jobTagDescription = new Quill('#jobTagDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    theme: 'snow'
  });
  $('#addJobTagModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobTagForm', '#jobTagValidationErrorsBox'); // $('#jobTagDescription').summernote('code', '');

    jobTagDescription.setContents([{
      insert: ''
    }]);
  });
  $(document).on('submit', '#addJobTagForm', function (e) {
    e.preventDefault();
    processingBtn('#addJobTagForm', '#jobTagBtnSave', 'loading'); // if (!checkSummerNoteEmpty('#jobTagDescription',
    //     'Description field is required.')) {
    //     processingBtn('#addJobTagForm', '#jobTagBtnSave');
    //     return true;
    // }

    var editor_content = jobTagDescription.root.innerHTML;
    var input = JSON.stringify(editor_content);
    $('#job_tag_desc').val(input.replace(/"/g, ''));
    $.ajax({
      url: jobTagSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobTagModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.name
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#tagId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobTagForm', '#jobTagBtnSave');
      }
    });
  });
}

if ($('#jobShiftDescription').length) {
  $('#addJobShiftModal').on('hidden.bs.modal', function () {
    resetModalForm('#addJobShiftForm', '#jobShiftValidationErrorsBox'); // $('#jobShiftDescription').summernote('code', '');

    jobShiftDescription.setContents([{
      insert: ''
    }]);
  });
  var jobShiftDescription = new Quill('#jobShiftDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    theme: 'snow'
  });
  $(document).on('submit', '#addJobShiftForm', function (e) {
    e.preventDefault(); // if (!checkSummerNoteEmpty('#jobShiftDescription',
    //     'Description field is required.', 1)) {
    //     processingBtn('#addJobShiftForm', '#jobShiftBtnSave');
    //     return true;
    // }

    var editor_content = jobShiftDescription.root.innerHTML;
    var input = JSON.stringify(editor_content);
    $('#job_shift_desc').val(input.replace(/"/g, ''));
    processingBtn('#addJobShiftForm', '#jobShiftBtnSave', 'loading');
    $.ajax({
      url: jobShiftSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addJobShiftModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.shift
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#jobShiftId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addJobShiftForm', '#jobShiftBtnSave');
      }
    });
  });
}

if ($('#salaryPeriodDescription').length) {
  var salaryPeriodDescription = new Quill('#salaryPeriodDescription', {
    modules: {
      toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
    },
    theme: 'snow'
  });
  $('#addSalaryPeriodModal').on('hidden.bs.modal', function () {
    resetModalForm('#addSalaryPeriodForm', '#salaryPeriodValidationErrorsBox');
    salaryPeriodDescription.setContents([{
      insert: ''
    }]); // $('#salaryPeriodDescription').summernote('code', '');
  });
  $(document).on('submit', '#addSalaryPeriodForm', function (e) {
    e.preventDefault(); // if (!checkSummerNoteEmpty('#salaryPeriodDescription',
    //     'Description field is required.', 1)) {
    //     return true;
    // }

    var editor_content = salaryPeriodDescription.root.innerHTML;

    if (salaryPeriodDescription.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#salary_period_desc').val(input.replace(/"/g, ''));
    processingBtn('#addSalaryPeriodForm', '#salaryPeriodBtnSave', 'loading');
    $.ajax({
      url: salaryPeriodSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addSalaryPeriodModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.period
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#salaryPeriodsId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addSalaryPeriodForm', '#salaryPeriodBtnSave');
      }
    });
  });
} //job Type


$(document).on('click', '.addJobTypeModal', function () {
  $('#addJobTypeModal').appendTo('body').modal('show');
}); //job category

$(document).on('click', '.addJobCategoryModal', function () {
  $('#addJobCategoryModal').appendTo('body').modal('show');
}); //skill

$(document).on('click', '.addSkillModal', function () {
  $('#addSkillModal').appendTo('body').modal('show');
}); //salary period

$(document).on('click', '.addSalaryPeriodModal', function () {
  $('#addSalaryPeriodModal').appendTo('body').modal('show');
}); //country

$(document).on('click', '.addCountryModal', function () {
  $('#addCountryModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addCountryForm', function (e) {
  e.preventDefault();
  processingBtn('#addCountryForm', '#countryBtnSave', 'loading');
  $.ajax({
    url: countrySaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addCountryModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#countryId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addCountryForm', '#countryBtnSave');
    }
  });
});
$('#addCountryModal').on('hidden.bs.modal', function () {
  resetModalForm('#addCountryForm', '#countryValidationErrorsBox');
}); // state

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
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addStateModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#stateId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addStateForm', '#stateBtnSave');
    }
  });
});
$('#addStateModal').on('hidden.bs.modal', function () {
  $('#countryID').val('').trigger('change');
  resetModalForm('#addStateForm', '#StateValidationErrorsBox');
}); //city

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
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addCityModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#cityId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addCityForm', '#cityBtnSave');
    }
  });
});
$('#addCityModal').on('hidden.bs.modal', function () {
  $('#stateID').val('').trigger('change');
  resetModalForm('#addCityForm', '#cityValidationErrorsBox');
}); //career level

$(document).on('click', '.addCareerLevelModal', function () {
  $('#addCareerModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addCareerForm', function (e) {
  e.preventDefault();
  processingBtn('#addCareerForm', '#careerBtnSave', 'loading');
  $.ajax({
    url: careerLevelSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addCareerModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.level_name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#careerLevelsId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addCareerForm', '#careerBtnSave');
    }
  });
});
$('#addCareerModal').on('hidden.bs.modal', function () {
  resetModalForm('#addCareerForm', '#careerValidationErrorsBox');
}); //job shift

$(document).on('click', '.addJobShiftModal', function () {
  $('#addJobShiftModal').appendTo('body').modal('show');
}); //job tag

$(document).on('click', '.addJobTagModal', function () {
  $('#addJobTagModal').appendTo('body').modal('show');
}); //degree level

$(document).on('click', '.addRequiredDegreeLevelTypeModal', function () {
  $('#addDegreeLevelModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addDegreeLevelForm', function (e) {
  e.preventDefault();
  processingBtn('#addDegreeLevelForm', '#degreeLevelBtnSave', 'loading');
  $.ajax({
    url: requiredDegreeLevelSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addDegreeLevelModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#requiredDegreeLevelId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addDegreeLevelForm', '#degreeLevelBtnSave');
    }
  });
});
$('#addDegreeLevelModal').on('hidden.bs.modal', function () {
  resetModalForm('#addDegreeLevelForm', '#degreeLevelValidationErrorsBox');
}); //functional area

$(document).on('click', '.addFunctionalAreaModal', function () {
  $('#addFunctionalModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addFunctionalForm', function (e) {
  e.preventDefault();
  processingBtn('#addFunctionalForm', '#functionalBtnSave', 'loading');
  $.ajax({
    url: functionalAreaSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addFunctionalModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#functionalAreaId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addFunctionalForm', '#functionalBtnSave');
    }
  });
});
$('#addFunctionalModal').on('hidden.bs.modal', function () {
  resetModalForm('#addFunctionalForm', '#functionalValidationErrorsBox');
});
/******/ })()
;