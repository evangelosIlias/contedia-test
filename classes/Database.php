<?php
/*
 * PDO Database Class
 * Connect to Database
 */
session_start();

class Database
{
    // Database connection parameters
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $dbname = "contedia";

    /**
     * Establishes a connection to the database using PDO.
     *
     * @return PDO The PDO instance representing the database connection.
     */
    public function connect(): PDO
    {
        // Set DSN (Data Source Name)
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        // PDO connection options
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,          // Enable error reporting
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Set default fetch mode to associative array
            PDO::ATTR_EMULATE_PREPARES => false,                  // Disable emulated prepared statements
        ];

        // Create PDO instance
        try {
            $pdo = new PDO($dsn, $this->user, $this->password, $options);
            // echo "Connection established";  // Uncomment this line for testing the connection

            return $pdo;
        } catch (PDOException $e) {
            // Handle connection error
            die("Connection failed: " . $e->getMessage());
        }
    }
}




