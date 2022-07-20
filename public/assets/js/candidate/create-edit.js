/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/js/candidate/create-edit.js ***!
  \******************************************************/
$(document).ready(function () {
  'use strict';

  $('#maritalStatusId, #countryId, #careerLevelId, #industryId, #functionalAreaId,#stateId,#cityId').select2({
    'width': 'calc(100% - 44px)'
  });
  $('#skillId').select2({
    width: 'calc(100% - 44px)',
    placeholder: 'Select Skill'
  });
  $('#languageId').select2({
    width: 'calc(100% - 44px)',
    placeholder: 'Select Languages'
  });
  $('#countryID,#stateID,#salaryCurrencyId').select2({
    width: '100%'
  });
  $('#birthDate').flatpickr({
    format: 'YYYY-MM-DD',
    useCurrent: true,
    sideBySide: true,
    maxDate: new Date()
  });
  $('#availableAt').flatpickr({
    format: 'YYYY-MM-DD',
    useCurrent: true,
    sideBySide: true,
    minDate: new Date()
  });
  setTimeout(function () {
    $('input[type=radio][name=immediate_available]').trigger('change');
  }, 300);
  $('#countryId').on('change', function () {
    $.ajax({
      url: companyStateUrl,
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
        }); // if (isEdit && stateId) {
        //     $('#stateId').val(stateId).trigger('change');
        // }
      }
    });
  });
  $('#stateId').on('change', function () {
    $.ajax({
      url: companyCityUrl,
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
          $('#cityId').append($('<option></option>').attr('value', i).text(v));
        }); // if (isEdit && cityId) {
        //     $('#cityId').val(cityId).trigger('change');
        // }
      }
    });
  }); // if (isEdit & countryId) {
  //     $('#countryId').val(countryId).trigger('change');
  // }

  $('#createCandidatesForm,#editCandidatesForm').submit(function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
  $('input[type=radio][name=immediate_available]').change(function () {
    var radioValue = $('input[name=\'immediate_available\']:checked').val();

    if (radioValue == 1) {
      $('.available-at').hide();
    } else {
      $('.available-at').show();
    }
  });
  $('#available').click(function () {
    radio();
  });
  $('#not_available').click(function () {
    radio();
  });

  function radio() {
    var radioValue = $('input[name=\'immediate_available\']:checked').val();

    if (radioValue == '0') {
      $('.available-at').show();
    } else {
      $('.available-at').hide();
    }
  }

  $(document).on('submit', '#createCandidatesForm,#editCandidatesForm', function (e) {
    e.preventDefault();
    $('#createCandidatesForm,#editCandidatesForm').find('input:text:visible:first').focus();
    var facebookUrl = $('#facebookUrl').val();
    var twitterUrl = $('#twitterUrl').val();
    var linkedInUrl = $('#linkedInUrl').val();
    var googlePlusUrl = $('#googlePlusUrl').val();
    var pinterestUrl = $('#pinterestUrl').val();
    var facebookExp = new RegExp(/^(https?:\/\/)?((m{1}\.)?)?((w{3}\.)?)facebook.[a-z]{2,3}\/?.*/i);
    var twitterExp = new RegExp(/^(https?:\/\/)?((m{1}\.)?)?((w{3}\.)?)twitter\.[a-z]{2,3}\/?.*/i);
    var googlePlusExp = new RegExp(/^(https?:\/\/)?((w{3}\.)?)?(plus\.)?(google\.[a-z]{2,3})\/?(([a-zA-Z 0-9._])?).*/i);
    var linkedInExp = new RegExp(/^(https?:\/\/)?((w{3}\.)?)linkedin\.[a-z]{2,3}\/?.*/i);
    var pinterestExp = new RegExp(/^(https?:\/\/)?((w{3}\.)?)pinterest\.[a-z]{2,3}\/?.*/i);
    urlValidation(facebookUrl, facebookExp);
    urlValidation(twitterUrl, twitterExp);
    urlValidation(linkedInUrl, linkedInExp);
    urlValidation(googlePlusUrl, googlePlusExp);
    urlValidation(pinterestUrl, pinterestExp);

    if (!urlValidation(facebookUrl, facebookExp)) {
      displayErrorMessage('Please enter a valid Facebook URL');
      return false;
    }

    if (!urlValidation(twitterUrl, twitterExp)) {
      displayErrorMessage('Please enter a valid Twitter URL');
      return false;
    }

    if (!urlValidation(googlePlusUrl, googlePlusExp)) {
      displayErrorMessage('Please enter a valid Google Plus URL');
      return false;
    }

    if (!urlValidation(linkedInUrl, linkedInExp)) {
      displayErrorMessage('Please enter a valid Linkedin URL');
      return false;
    }

    if (!urlValidation(pinterestUrl, pinterestExp)) {
      displayErrorMessage('Please enter a valid Pinterest URL');
      return false;
    }

    $('#createCandidatesForm,#editCandidatesForm')[0].submit();
    return true;
  });
}); // $('#description, #skillDescription, #martialDescription').summernote({
//     minHeight: 200,
//     height: 200,
//     toolbar: [
//         ['style', ['bold', 'italic', 'underline', 'clear']],
//         ['font', ['strikethrough']],
//         ['para', ['paragraph']]],
// });

var martialDescription = new Quill('#martialDescription', {
  modules: {
    toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
  },
  theme: 'snow'
}); //marital status

$(document).on('click', '.addMaritalStatusModal', function () {
  $('#addMaritalStatusModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addMaritalStatusForm', function (e) {
  e.preventDefault(); // if (!checkSummerNoteEmpty('#martialDescription',
  //     'Description field is required.', 1)) {
  //     return true;
  // }

  var editor_content = martialDescription.root.innerHTML;

  if (martialDescription.getText().trim().length === 0) {
    displayErrorMessage('Description field is required.');
    return false;
  }

  var input = JSON.stringify(editor_content);
  $('#marital_desc').val(input.replace(/"/g, ''));
  processingBtn('#addMaritalStatusForm', '#maritalStatusBtnSave', 'loading');
  $.ajax({
    url: maritalStatusSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addMaritalStatusModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.marital_status
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#maritalStatusId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addMaritalStatusForm', '#maritalStatusBtnSave');
    }
  });
});
$('#addMaritalStatusModal').on('hidden.bs.modal', function () {
  resetModalForm('#addMaritalStatusForm', '#maritalStatusValidationErrorsBox'); // $('#martialDescription').summernote('code', '');

  martialDescription.setContents([{
    insert: ''
  }]);
});
var skillDescription = new Quill('#skillDescription', {
  modules: {
    toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
  },
  theme: 'snow'
}); //skill

$(document).on('click', '.addSkillModal', function () {
  $('#addSkillModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addSkillForm', function (e) {
  e.preventDefault(); // if (!checkSummerNoteEmpty('#skillDescription',
  //     'Description field is required.')) {
  //     return true;
  // }

  var editor_content = skillDescription.root.innerHTML;

  if (skillDescription.getText().trim().length === 0) {
    displayErrorMessage('Description field is required.');
    return false;
  }

  var input = JSON.stringify(editor_content);
  $('#skill_desc').val(input.replace(/"/g, ''));
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
        $('#skillId').append(newOption).trigger('change');
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
$('#addSkillModal').on('hidden.bs.modal', function () {
  resetModalForm('#addSkillForm', '#skillValidationErrorsBox');
  skillDescription.setContents([{
    insert: ''
  }]); // $('#skillDescription').summernote('code', '');
}); //language

$(document).on('click', '.addLanguageModal', function () {
  $('#addLanguageModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addLanguageForm', function (e) {
  e.preventDefault();
  processingBtn('#addLanguageForm', '#languageBtnSave', 'loading');
  $.ajax({
    url: languageSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addLanguageModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.language
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#languageId').append(newOption).trigger('change');
        setTimeout(function () {
          $('#languageBtnSave').button('reset');
        }, 1000);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
      setTimeout(function () {
        $('#languageBtnSave').button('reset');
      }, 1000);
    },
    complete: function complete() {
      setTimeout(function () {
        processingBtn('#addLanguageForm', '#languageBtnSave');
      }, 1000);
    }
  });
});
$('#addLanguageModal').on('hidden.bs.modal', function () {
  resetModalForm('#addLanguageForm', '#languageValidationErrorsBox');
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
        $('#careerLevelId').append(newOption).trigger('change');
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
});
var industryDescription = new Quill('#industryDescription', {
  modules: {
    toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
  },
  theme: 'snow'
}); // industry

$(document).on('click', '.addIndustryModal', function () {
  $('#addModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addNewForm', function (e) {
  e.preventDefault(); // if (!checkSummerNoteEmpty('#description',
  //     'Description field is required.', 1)) {
  //     return true;
  // }

  var editor_content = industryDescription.root.innerHTML;

  if (industryDescription.getText().trim().length === 0) {
    displayErrorMessage('Description field is required.');
    return false;
  }

  var input = JSON.stringify(editor_content);
  $('#industry_desc').val(input.replace(/"/g, ''));
  processingBtn('#addNewForm', '#btnSave', 'loading');
  $.ajax({
    url: industrySaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addModal').modal('hide');
        var data = {
          id: result.data.id,
          text: result.data.name
        };
        var newOption = new Option(data.text, data.id, false, true);
        $('#industryId').append(newOption).trigger('change');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addNewForm', '#btnSave');
    }
  });
});
$('#addModal').on('hidden.bs.modal', function () {
  resetModalForm('#addNewForm', '#validationErrorsBox');
  industryDescription.setContents([{
    insert: ''
  }]);
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