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

  // Database connection object
  private $conn;

  // Connection to the DB when instantiating the class
  private function __construct($db_token = null){

    /*
    $db_token stands for an encrypted identifier for the DB when the app uses more than one.
    When the token is not sent, the default DB is used (set in db_config.php or storage file(s)).
    */

    $credentials = $this->main($db_token);

    // TODO: Database connection
  }
}
?>