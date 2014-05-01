<?php
// display form if user has not clicked submit
if ($_POST["submit"]){
  if (isset($_POST["EmailContact"])) {
      $email = $_POST["EmailContact"]; // sender
      $firstname = $_POST["FirstnameContact"];
      $lastname = $_POST["LastnameContact"];
      $telephone = $_POST["TelephoneContact"];
      $subject = $_POST["TitelContact"];
      $message = $_POST["MessageContact"];
      // message lines should not exceed 70 characters (PHP rule), so wrap it
      $message = wordwrap($message, 70);
      // send mail
      mail("jana.devoecht@gmail.com",$firstname,$lastname,$telephone,$subject,$message,"From: $email\n");
      echo "Uw formulier is verstuurd.";
    }
}
