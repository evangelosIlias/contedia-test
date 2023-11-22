$(document).ready(function () {
    // Attach a submit event listener to the form with id 'myFormModal'
    $('#myFormModal').submit(function (e) {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Check if the form is valid using jQuery Validation plugin
        if ($(this).valid()) {
            // Create a FormData object to store form data including files
            var formData = new FormData(this);

            // Use AJAX to submit the form data to 'store.php'
            $.ajax({
                type: 'POST', // Use POST method
                url: 'store.php', // Target PHP script
                data: formData, // Form data
                enctype: 'multipart/form-data', // Set encoding type for file uploads
                contentType: false, // Disable automatic content type header for file uploads
                processData: false, // Disable automatic data processing for file uploads
                cache: false, // Disable caching

            }).then(function (response){
                // Handle the response from the server
                if (response.success) {
                    // Display a success message
                    $('.message-content').html('<div class="alert alert-success">' + response.message + '</div>');
                } else {
                    // Display an error message
                    $('.message-content').html('<div class="alert alert-danger">' + response.error + '</div>');
                }

                // Hide the modal after form submission
                $('#myModal').modal('hide');
            });
        }
    });
});

