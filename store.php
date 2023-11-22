<?php
// Include necessary class files
require_once 'classes/Database.php';
require_once 'classes/FormHandler.php';
require_once 'classes/ValidationError.php';

// Create instances of Database and FormHandler classes
$db = new Database();
$formHandler = new FormHandler($db);

// Check if the request method is POST
if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the content type for the response
    header('Content-Type: application/json; charset=utf-8');

    try {
        // Set form data and store in the database using FormHandler
        $formHandler
            ->setTitle($_POST['title'])
            ->setEmail($_POST['email'])
            ->setFile($_FILES['file'])
            ->setAdult($_POST['adult'])
            ->setNotifications($_POST['notifications'])
            ->store();
        
        // Respond with success message if data is inserted successfully
        echo json_encode(['success' => true, 'message' => 'Data inserted successfully']);
    } catch(ValidationError $e) {
        // Respond with error message if validation fails
        echo json_encode(['error' => $e->getMessage()]);
    } catch (PDOException $e) {
        // Respond with error message if a database error occurs
        echo json_encode(['error' => $e->getMessage()]);
    }
}





