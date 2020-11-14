<?php

include_once 'connection.php';

class Messages {
    
    public function insertMessages($firstname, $lastname, $email, $message){
        $conn = Connection::getConnection();
        $query = 'INSERT INTO contactinfo (fname, lname, email, message) VALUES (?, ?, ?, ?)';
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$stmt=$conn->prepare($query);
        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $message);
        $stmt->execute();
        Connection::closeConnection($conn);
        return $stmt;
    
    }
}
?>