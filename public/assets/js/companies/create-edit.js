/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/js/companies/create-edit.js ***!
  \******************************************************/


$(document).ready(function () {
  $('#locationId,#industryId,#ownershipTypeId,#companySizeId,#countryId,#stateId,#cityId').select2({
    width: !employerPanel ? 'calc(100% - 44px)' : '100%'
  });
  $('#establishedIn').select2({
    width: '100%'
  });
  $('#stateID').select2({
    'width': '100%',
    dropdownParent: $('#addCityModal')
  });
  $('#countryID').select2({
    width: '100%',
    dropdownParent: $('#addStateModal')
  });
  var editEmployee = '';

  if (isEdit) {
    editEmployee = new Quill('#editEmployeeDetails', {
      modules: {
        toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
      },
      placeholder: 'Enter Employer Details',
      theme: 'snow'
    });
    editEmployee.root.innerHTML = $('#editEmployerDetail').val();
  }

  var company;

  if ($('#details').length) {
    company = new Quill('#details', {
      modules: {
        toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
      },
      theme: 'snow',
      placeholder: 'Enter Employer Details...'
    });
  }

  var industry;

  if ($('#industryDescription').length) {
    industry = new Quill('#industryDescription', {
      placeholder: 'Enter Industry Details...',
      modules: {
        toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
      },
      theme: 'snow'
    });
  }

  var ownership;

  if ($('#ownershipDescription').length) {
    ownership = new Quill('#ownershipDescription', {
      placeholder: 'Enter Ownership Details...',
      modules: {
        toolbar: [['bold', 'italic', 'underline', 'strike'], ['clean']]
      },
      theme: 'snow'
    });
  }

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
        });
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
          $('#cityId').append($('<option ></option>').attr('value', i).text(v));
        });
      }
    });
  });
  $(document).on('change', '#logo', function () {
    var validFile = isValidFile($(this), '#validationErrorsBox');

    if (validFile) {
      displayPhoto(this, '#logoPreview');
      $('#btnSave').prop('disabled', false);
    } else {
      $('#btnSave').prop('disabled', true);
    }
  });
  $('#addCompanyForm,#editCompanyForm').submit(function () {
    if ($('#error-msg').text() !== '') {
      $('#phoneNumber').focus();
      return false;
    }
  });
  $(document).on('submit', '#addCompanyForm,#editCompanyForm', function (e) {
    e.preventDefault();

    if (isEdit) {
      var editor_content1 = editEmployee.root.innerHTML;

      if (editEmployee.getText().trim().length === 0) {
        displayErrorMessage('Employer Details field is required.');
        e.preventDefault();
        $('#btnSave').attr('disabled', false);
        return false;
      }

      var inputDetail = JSON.stringify(editor_content1);
      $('#editEmployerDetail').val(inputDetail.replace(/"/g, ''));
    } else {
      var editor_content = company.root.innerHTML;

      if (company.getText().trim().length === 0) {
        displayErrorMessage('Employer Details field is required.');
        e.preventDefault();
        $('#btnSave').attr('disabled', false);
        return false;
      }

      var input = JSON.stringify(editor_content);
      $('#company_desc').val(input.replace(/"/g, ''));
    }

    $('#addCompanyForm,#editCompanyForm').find('input:text:visible:first').focus();
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
      $('#btnSave').prop('disabled', false);
      return false;
    }

    if (!urlValidation(twitterUrl, twitterExp)) {
      displayErrorMessage('Please enter a valid Twitter URL');
      $('#btnSave').prop('disabled', false);
      return false;
    }

    if (!urlValidation(googlePlusUrl, googlePlusExp)) {
      displayErrorMessage('Please enter a valid Google Plus URL');
      $('#btnSave').prop('disabled', false);
      return false;
    }

    if (!urlValidation(linkedInUrl, linkedInExp)) {
      displayErrorMessage('Please enter a valid Linkedin URL');
      $('#btnSave').prop('disabled', false);
      return false;
    }

    if (!urlValidation(pinterestUrl, pinterestExp)) {
      displayErrorMessage('Please enter a valid Pinterest URL');
      $('#btnSave').prop('disabled', false);
      return false;
    }

    $('#addCompanyForm,#editCompanyForm')[0].submit();
    return true;
  }); // industry

  $(document).on('click', '.addIndustryModal', function () {
    $('#addModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addNewForm', function (e) {
    e.preventDefault();
    var editor_content = industry.root.innerHTML;

    if (industry.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#industry_desc').val(input.replace(/"/g, ""));
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
    industry.setContents([{
      insert: ''
    }]);
  }); //ownership type

  $(document).on('click', '.addOwnerShipTypeModal', function () {
    $('#addOwnershipModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addOwnershipForm', function (e) {
    e.preventDefault();
    var editor_content = ownership.root.innerHTML;

    if (ownership.getText().trim().length === 0) {
      displayErrorMessage('Description field is required.');
      return false;
    }

    var input = JSON.stringify(editor_content);
    $('#ownership_desc').val(input.replace(/"/g, ""));
    processingBtn('#addOwnershipForm', '#ownershipBtnSave', 'loading');
    $.ajax({
      url: ownerShipTypeSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addOwnershipModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.name
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#ownershipTypeId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addOwnershipForm', '#ownershipBtnSave');
      }
    });
  });
  $('#addOwnershipModal').on('hidden.bs.modal', function () {
    resetModalForm('#addOwnershipForm', '#ownershipValidationErrorsBox');
    ownership.setContents([{
      insert: ''
    }]);
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
          var newCountry = new Option(data.text, data.id, false, false);
          $('#countryID').append(newCountry).trigger('change');
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
          var newState = new Option(data.text, data.id, false, false);
          $('#stateID').append(newState).trigger('change');
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
  }); //company size

  $(document).on('click', '.addCompanySizeModal', function () {
    $('#addCompanySizeModal').appendTo('body').modal('show');
  });
  $(document).on('submit', '#addCompanySizeForm', function (e) {
    e.preventDefault();
    processingBtn('#addCompanySizeForm', '#companySizeBtnSave', 'loading');
    $.ajax({
      url: companySizeSaveUrl,
      type: 'POST',
      data: $(this).serialize(),
      success: function success(result) {
        if (result.success) {
          displaySuccessMessage(result.message);
          $('#addCompanySizeModal').modal('hide');
          var data = {
            id: result.data.id,
            text: result.data.size
          };
          var newOption = new Option(data.text, data.id, false, true);
          $('#companySizeId').append(newOption).trigger('change');
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
      },
      complete: function complete() {
        processingBtn('#addCompanySizeForm', '#companySizeBtnSave');
      }
    });
  });
  $('#addCompanySizeModal').on('shown.bs.modal', function () {
    $('#size').focus();
  });
  $('#addCompanySizeModal').on('hidden.bs.modal', function () {
    resetModalForm('#addCompanySizeForm', '#companySizeValidationErrorsBox');
  });
});
/******/ })()
;