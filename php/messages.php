<?php

include_once 'connection.php';

class Messages {
    
    public function insertMessages($firstname, $lastname, $email, $message){
        $conn = Connection::getConnection();
        $query = 'INSERT INTO contactinfo (fname, lname, email, message) VALUES (:fname, :lname, :email, :message)';
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		$stmt=$conn->prepare($query);
        $stmt->bindparam(":fname", $firstname);
        $stmt->bindparam(":lname", $lastname);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":message", $message);
        $stmt->execute();
        Connection::closeConnection($conn);
        return $stmt;
    
    }
}
?>