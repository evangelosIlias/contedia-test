$(document).ready(function () {
    // Initialize form validation using the jQuery Validation plugin
    $('#myFormModal').validate({
        // Define validation rules for form fields
        rules: {
            title: {
                required: true,
            },
            email: {
                required: true,
            },
            file: {
                required: true,
            },
        },
        // Define custom error messages for each rule
        messages: {
            title: {
                required: 'Please Add Title',
            },
            email: {
                required: 'Please Add Email',
            },
            file: {
                required: 'Please Add a File',
            },
        },
        // Customize the placement and styling of error messages
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        // Highlight and unhighlight form elements based on validation status
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            console.log('Highlighting:', element.name);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            console.log('Unhighlighting:', element.name);
        },
    });
});
