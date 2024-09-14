<?php
define("DB_HOST", "sql12.freesqldatabase.com");
define("DB_USER", "sql12730827");
define("DB_PASS", 'gFl3Jsliwg');
define("DB_NAME", "sql12730827");
define("DB_PORT", 3306);
?>
<?php
class Database
{
  public static $host   = DB_HOST;
  public static $user   = DB_USER;
  public static $pass   = DB_PASS;
  public static $dbname = DB_NAME;
  public static $port   = DB_PORT;

  public static $link;
  public static $error;

  public function __construct()
  {
    self::connectDB();
  }

  public static function connectDB()
  {
    self::$link = new mysqli(
      self::$host,
      self::$user,
      self::$pass,
      self::$dbname,
      self::$port
    );
    if (self::$link->connect_error) {
      self::$error = "Connection fail" . self::$link->connect_error;
      return false;
    }
  }

  // Select or Read data
  public static function select($query)
  {
    self::connectDB();
    $result = self::$link->query($query) or
      die(self::$link->error . __LINE__);
    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }

  // Insert data
  public static function insert($query)
  {
    self::connectDB();
    $insert_row = self::$link->query($query) or
      die(self::$link->error . __LINE__);
    if ($insert_row) {
      return $insert_row;
    } else {
      return false;
    }
  }

  // Update data
  public static function update($query)
  {
    self::connectDB();
    $update_row = self::$link->query($query) or
      die(self::$link->error . __LINE__);
    if ($update_row) {
      return $update_row;
    } else {
      return false;
    }
  }

  // Delete data
  public static function delete($query)
  {
    self::connectDB();
    $delete_row = self::$link->query($query) or
      die(self::$link->error . __LINE__);
    if ($delete_row) {
      return $delete_row;
    } else {
      return false;
    }
  }
}
