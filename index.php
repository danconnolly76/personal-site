<?php
$servername = "localhost";
$username = "root";
$password = "";

class Connection{

public static function getConn(){
try {
  $conn = new PDO("mysql:host=$servername;dbname=personal-site", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
}

public static function closeConn()
{
  $conn=null;
}

}

?>