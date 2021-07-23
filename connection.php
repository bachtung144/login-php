<?php
class Connection {
    // Hold the class instance.
    private static $instance = null;
    
    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct($config)
    {
       try{
           $dsn = 'mysql:dbname='.$config['db'].';host='.$config['host'];
           $options = [
               PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
           ];
           $con = new PDO($dsn, $config['user'], $config['pass'], $options);
       } catch(Exception $exception) {
            $mess = $exception->getMessage();
            die($mess);
       }
    }
   
    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance($config)
    {
      if (self::$instance == null)
      {
        self::$instance = new Connection($config);
      }
   
      return self::$instance;
    }
  }