<?php

  class Database {
    // assign variables
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'ajax_crud';

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
      // Set DSN 
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      // Set Option
      $option = array (
        PDO::ATTR_PERSISTENT    => true,
        PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
      );
      // Create new pdo
      try {
        $this->dbh = new PDO($dsn, $this->user, $this->password, $option);
      } catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
      }
    }

    // Query function
    public function query($query) {
      $this->stmt = $this->dbh->prepare($query);
    }

    // bind function
    public function bind($param, $value, $type = null) {
      if(is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }
      $this->stmt->bindValue($param, $value, $type);
    }

    // Execute function
    public function execute() {
      return $this->stmt->execute();
    }

    // result set
    public function resultset() {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // single result
    public function singleresult() {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // row count
    public function rowcount(){
        $this->execute();
        return $this->stmt->rowCount();
    }


  }