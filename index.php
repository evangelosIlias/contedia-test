<?php
// Include necessary class files
require_once 'classes/Database.php';
require_once 'classes/FormHandler.php'; 
require_once 'store.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Contedia-test</title>
</head>

<body>
    <!-- Container for messages -->
    <div class="message-content">
        <!-- Messages will be displayed here -->
    </div>

    <!-- Button to trigger the modal -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
            Add Details
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form starts here  -->
                    <form id="myFormModal" class="row g-3 needs-validation" novalidate method="post" action="store.php" enctype="multipart/form-data">
                        <!-- Rest of your form -->

                        <!-- Title Dropdown -->
                        <div class="container mt-3">
                            <div class="main-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-center">
                                                    <div><i class="bx bxs-user me-1 font-22"></i></div>
                                                    <h5 class="mb-0 ">Please Submit you Details</h5>
                                                </div>

                                                <!-- Dropdown for Title -->
                                                <div class="form-group col-6 text-secondary">
                                                    <label for="title" class="form-label">Title</label>
                                                    <select class="form-select mb-3" name="title" id="title" aria-label="Select Title" required>
                                                        <option value="" selected>Select Title</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Miss">Miss</option>
                                                    </select>
                                                </div>

                                                <!-- Email Input -->
                                                <div class="form-group col-6">
                                                    <label for="inputEmail" class="form-label">Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-transparent"><i class="fa-solid fa-envelope"></i></span>
                                                        <input type="email" name="email" class="form-control border-start-1" id="email" placeholder="Email" required>
                                                    </div>
                                                </div>

                                                <!-- File Input -->
                                                <div class="form-group col-6 text-secondary mt-3">
                                                    <label for="fileInput" class="form-label">Choose File</label>
                                                    <input type="file" class="form-control" id="file" name="file" accept="application/pdf, image/jpg, image/png" required>
                                                </div>

                                                <!-- Checkbox for Notifications -->
                                                <div class="form-group col-12 mt-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="notifications" name="notifications" value="1">
                                                        <label class="form-check-label" for="notifications">
                                                            I Agree to receive notifications
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Radio buttons for Adult -->
                                                <div class="form-group col-12 mt-3">
                                                    <label>Adult</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="adult" id="yes" value="1" checked required>
                                                        <label class="form-check-label" for="yes">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="adult" id="no" value="0" required>
                                                        <label class="form-check-label" for="no">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="col-12">
                                                    <button type="submit" id="submit-button" class="custom-submit-button mt-3">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Js Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/validate.min.js"></script>
    <script src="assets/js/script-validation.js"></script>
    <script src="assets/js/store.js"></script>

</body>

</html>

