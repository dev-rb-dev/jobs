$(document).ready(function () {
    // $('#descriptionTerms').summernote({
    //     minHeight: 200,
    //     height: 200,
    //     toolbar: [
    //         // [groupName, [list of button]]
    //         ['style', ['bold', 'italic', 'underline', 'clear']],
    //         ['font', ['strikethrough']],
    //         ['para', ['paragraph']],
    //     ],
    // });

    let quill1 = new Quill('#termConditionId', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['clean']
            ],
        },
        placeholder: 'Terms & Conditions',
        theme: 'snow', // or 'bubble'
    });
    quill1.on('text-change', function (delta, oldDelta, source) {
        if (quill1.getText().trim().length === 0) {
            quill1.setContents([{ insert: '' }]);
        }
    });

    let quill2 = new Quill('#privacyPolicyId', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],
                ['clean']
            ],
        },
        placeholder: 'Privacy Policy',
        theme: 'snow', // or 'bubble'
    });
    quill2.on('text-change', function (delta, oldDelta, source) {
        if (quill2.getText().trim().length === 0) {
            quill2.setContents([{ insert: '' }]);
        }
    });

    let element = document.createElement('textarea');
    element.innerHTML = termConditionData;
    quill1.root.innerHTML = element.value;

    element.innerHTML = privacyPolicyData;
    quill2.root.innerHTML = element.value;

    $(document).on('submit', '#policyTerms', function () {
        let element = document.createElement('textarea');
        let editor_content_1 = quill1.root.innerHTML;
        element.innerHTML = editor_content_1;
        let editor_content_2 = quill2.root.innerHTML;

        if (quill1.getText().trim().length === 0) {
            displayErrorMessage('The Terms & Conditions is required.');
            return false;
        }

        if (quill2.getText().trim().length === 0) {
            displayErrorMessage('The Privacy Policy is required.');
            return false;
        }
        let dataTerm = JSON.stringify(editor_content_1);
        let dataPrivacy = JSON.stringify(editor_content_2);
        $('#termData').val(dataTerm.replace(/"/g, ''));
        $('#privacyData').val(dataPrivacy.replace(/"/g, ''));
    });

    // $('#privacyPolicy').submit(function (e) {
    //     if (!checkSummerNoteEmpty('#description',
    //         'Privacy Policy field is required.', 1)) {
    //         e.preventDefault();
    //
    //         return true;
    //     }
    // });
    //
    // $('#termsConditions').submit(function (e) {
    //     if (!checkSummerNoteEmpty('#description',
    //         'Terms Conditions field is required.', 1)) {
    //         e.preventDefault();
    //
    //         return true;
    //     }
    // });

    // $('#policyTerms').submit(function (e) {
    //     if (!checkSummerNoteEmpty('#descriptionPolicy',
    //         'Privacy Policy field is required.', 1)) {
    //         e.preventDefault();
    //
    //         return true;
    //     }
    //
    //     if (!checkSummerNoteEmpty('#descriptionTerms',
    //         'Terms Conditions field is required.', 1)) {
    //         e.preventDefault();
    //
    //         return true;
    //     }
    // });
});
