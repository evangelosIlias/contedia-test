<?php
/*
 * Form Handling Class
 * Handles form data processing and storage
 */
class FormHandler
{
    private string $title;
    private string $email;
    private string $file;
    private int $adult;
    private int $notifications;

    public function __construct(private Database $db)
    {
        // Constructor with dependency injection for the Database class
    }

    // Set the title
    public function setTitle($title): self
    {
        // Sanitize and set the title
        $this->title = filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        return $this;
    }

    // Set the email
    public function setEmail($email): self
    {
        // Validate and set the email
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$this->email) {
            throw new ValidationError('Invalid email address');
        }
        return $this;
    }

    // Set the file and perform file validation
    public function setFile($file): self
    {
        // Check file extensions
        $allowedExtensions = ['pdf', 'jpg', 'png'];
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Check file type
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            throw new ValidationError('Invalid file type, please check your file and try again!');
        }

        // Check file size (less than 2MB)
        if ($file['size'] > 2 * 1024 * 1024) {
            throw new ValidationError('File size exceeds 2MB');
        }

        // Generate a unique filename and move the file to the uploads folder
        $this->file = $this->filePath($file);
        move_uploaded_file($file['tmp_name'], $this->file);

        return $this;
    }

    // Set the file path
    private function filePath($file): string
    {
        // Generate and return the file path
        $uploadDirectory = 'uploads/';
        $uploadedFileName = uniqid() . '_' . $file['name'];
        $targetPath = $uploadDirectory . $uploadedFileName;

        return $targetPath;
    }

    // Set the adult
    public function setAdult($adult): self
    {
        // Cast and set the adult value
        $this->adult = (int) $adult;
        return $this;
    }

    // Set notifications
    public function setNotifications($notifications): self
    {
        // Cast and set the notifications value
        $this->notifications = (int) $notifications;
        return $this;
    }

    // Store the data in the database
    public function store(): void
    {
        // Create a PDO instance by connecting to the database
        $pdo = $this->db->connect();

        // Prepare SQL statement for inserting data
        $stmt = $pdo->prepare("INSERT INTO user (title, email, file, adult, notifications) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $this->file);
        $stmt->bindParam(4, $this->adult);
        $stmt->bindParam(5, $this->notifications);

        // Execute the prepared statement to insert data into the database
        $stmt->execute();
    }
}

