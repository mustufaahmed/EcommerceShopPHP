<?php

class DatabaseConnection
{
    // Declare variable to hold datbase cridentials
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $database = 'ecommerceproject';

    // Hold the class instance.
    private static $instance = null;
    // Hold the database connection instance
    private $conn;
    // Class constructor 
    // private to create a single instance of database
    private function __construct(){
        // declare database connection using PDO
        try {
            //code...
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}",$this->user,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Connected successfully";
        } catch (Exception $e) {
            //exception $e;
            throw new Exception($e->getMessage());
            // echo "Connection failed: " . $e->getMessage();
        }
    }
    // get database class instance
    public static function getDbInstance ()
    {
        # code...
        // Validate the value of $instance variable
        if ( self::$instance == null ) {
            # code...
            // Intialize the class object instance
            self::$instance = new DatabaseConnection();
        }
        // return class instance
        return self::$instance;
    }

    // get database connection
    public function getDbConnection()
    {
        # code...
        // return connection variable
        return $this->conn;
    }

    public function closeDbConnection()
    {
        # code...
        // reset variables
        self::$instance = null;
        $this->conn = null;

        // return null 
        return null;
    }
}