<?php
/*

Data Access Object with PDO (PHP Data Object)
PHP 7.3.2

Author: Rafael Deiro
Date: 2019 March 8th
Description: DAO for safe access to relational databases throught PDO. Requires config file for the DB credentials and other informations.

*/

// Imports db_config.php, who stores sensitive data such as db names, passwords, hosts, usernames, tokens, etc.
require_once ('db_config.php');

// MySQL class that extends db_config for the database information
class MySQL extends db_config{

  // Database connection object (PDO object)
  private $conn;

  // Calls and returns main() when the class is instantiated
  public function __construct($db_token = null){
    return $this->main($db_token);
  }

  // Creates the PDO connection and returns self or false when something goes wrong
  private function main($db_token = null){

    /*
    $db_token stands for an encrypted identifier for the DB when the app uses more than one.
    When the token is not sent, the default DB is used (set in db_config.php or storage file(s)).
    */

    // Gets the credentials from db_config
    $credentials = $this->config_main($db_token);

    // MySQL dsn for PDO connection
    $dsn = 'mysql: host=' . $credentials['HOST'] . ';port=' . $credentials['PORT'] . ';dbname=' . $credentials['DB_NAME'] . ';charset=utf8';
    
    // Database username and password
    $username = $credentials['USERNAME'];
    $password = $credentials['PASSWORD'];

    // Tries connection sending to $this->conn
    try {
      $this->conn = new PDO($dsn, $username, $password);
    } catch (PDOException $e){

      // If something goes wrong, the connection is closed, an error message is shown and the function returns false
      $this->conn = null;
      echo 'An error ocurred when connecting to the database: ' . $e->getMessage() . '<br>';
      return false;
    }

    // If the connection is successful, the function returns the MySQL object;
    return self;
  }
}
?>