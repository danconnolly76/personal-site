<?php
include("config.php");
class Connection
{
public static function getConn()
{
try{
 $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);	
}catch (PDOException $exception)
  {
	  echo "Problem with connection" . $exception->getMessage();
  }
  return $conn; 
}
public static function closeConn()
{
  $conn=null;
}

}