<?php

namespace Framework\DB;



class Connection {

  static $CONN;
  public static function getConnection() {
      if(self::$CONN != null) {
        return self::$CONN;
      }

      $host = getenv('MYSQL_HOST');
      $username = getenv('MYSQL_USER');
      $passwd = getenv('MYSQL_PASSWORD');
      $dbname = getenv('MYSQL_DATABASE');
      

      $con =self::$CONN = new \mysqli($host, $username, $passwd, $dbname);
    
      if ($con->errno) {
        throw new \Exception("error on connection of database".$con->error);
      }

      return self::$CONN = $con;
  }
}