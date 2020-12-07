<?php
class Connection
{

	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;
	
public static function getConnection(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "personal-site";
	$charset = "utf8mb4";

	$dsn = "mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset;

	try{
		   $conn = new PDO($dsn, $username, $password);
		   $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		   return $conn;
	    }
		catch (PDOException $exception)
		{
			echo "Oh no, there was a problem" . $exception->getMessage();
		}
	}

public static function closeConnection($conn)
{
	$conn = null;
}
}
?>