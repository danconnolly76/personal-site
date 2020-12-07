<?php
include 'php/messages.php';

class Controller {

public static function checkValidation($firstname, $lastname, $email, $message) {

  if($firstname == "" || $lastname == "" || $email == "" || $message == "") {
    header ('Location: index.php?=emptyFields');
  } else if (!preg_match("/^[a-zA-Z\s]+$/", $firstname)) {
    header ('Location: index.php?=invalidFirstName');
  } else if (strlen($firstname) >= 40) {
    header ('Location: index.php?=firstNameLength');
  } else if (!preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
    header ('Location: index.php?=invalidLastName');
  } else if(strlen($lastname) >= 50) {
    header ('Location: index.php?=lastNameLength');
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header ('Location: index.php?=invalidEmail');
  } else if(strlen($message) >= 250) {
    header ('Location: index.php?=messageLength');  
  } else {
      Messages::insertMessages($firstname, $lastname, $email, $message);
      header ('Location: index.php?=success');  
     }
   }
 }
  ?>