<?php
class Connection
{
public function getConnection(){
	try{
	       $conn = new PDO('mysql:host=localhost;dbname=personal-site', 'root', '');
	    }
		catch (PDOException $exception)
		{
			echo "Oh no, there was a problem" . $exception->getMessage();
		}
		return $conn;
	}

public function closeConnection($conn)
{
	$conn=null;
}
}
?>