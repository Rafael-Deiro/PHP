<?php
/*

Database configuration file
PHP 7.3.2

Author: Rafael Deiro
Date: 2019 March 8th
Description: Configuration file that delivers sensitive information about the application databases (primarily credentials).

*/

// db_config class for storing the databases configurations
class db_config{

  // __construct() calls and returns main() when the class is instantiated
  public function __construct($token = null){
    return $this->config_main($token);
  }

  // main() handles the credentials delivery
  protected function config_main($token = null){

    // If a token is received, the function retrieves the respective credentials and returns it.
    if ($token){
      return $this->get_credentials($token);
    }

    // If no token is received, the function retrieves the default database credentials and returns it.
    else {
      return $this->default_credentials();
    }
  }

  // Default database credentials function
  private function default_credentials(){

    // Credentials array
    $credentials = array(
      'DB_NAME' => 'corp_database',
      'HOST' => '192.168.1.1',
      'PORT' => '1234',
      'USERNAME' => 'corp_user',
      'PASSWORD' => 'evilcorp123'
    );

    /*
    // If no credentials are set in the function
    if (empty($credentials)){

      // Fetches default credentials
      $credentials = $this->fetch_credentials();

      // If there are still no credentials, the function returns false
      if (empty($credentials)){
        return false;
      }
    }
    */

    // Returns the credentials
    return $credentials;
  }

  // Token related database credentials function
  private function get_credentials($token){

    /*
    // Fetches saved credentials
    $file_credentials = $this->fetch_credentials($token);

    // Merges the function credentials array with the fetched credentials array
    array_merge($credentials, $file_credentials);
    */

    // Credentials array
    $credentials = array(

      // Indexed by the tokens
      'TOKEN_1' => array(
        'DB_NAME' => 'corp_database',
        'HOST' => '192.168.1.1',
        'PORT' => '1234',
        'USERNAME' => 'corp_user',
        'PASSWORD' => 'evilcorp123'
      ),
      'TOKEN_2' => array(
        'DB_NAME' => 'corp_database_2',
        'HOST' => '192.168.10.1',
        'PORT' => '5678',
        'USERNAME' => 'corp_user_2',
        'PASSWORD' => 'evilcorp123'
      ),
      'TOKEN_3' => array(
        'DB_NAME' => 'corp_database_3',
        'HOST' => '192.168.0.1',
        'PORT' => '4321',
        'USERNAME' => 'corp_user_3',
        'PASSWORD' => 'evilcorp123'
      )
    );

    // Token check
    if (array_key_exists($token, $credentials)){

      // If the token is valid, the function returns the respective credentials
      return $credentials[$token];
    }
    else {

      // If the token is invalid, the function returns null
      return false;
    }
  }

  /*
  // Seek in the storage file(s) for credentials
  private function fetch_credentials($token = null){

  }
  */
}
?>