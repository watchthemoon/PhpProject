<?php
class m_Contact extends CI_Model{

  public function mail($data){

    ## Alles gaan doorsturen

    $to      = 'jana.devoecht@gmail.com';
    $subject = $data["TitelContact"];
    $message = "U heeft een contactbericht ontvangen:". " \n".
       "Naam:" . $data["FirstnameContact"] . " " . $data["LastnameContact"] . " \n" .
       "Telefoonnummer:" . $data["TelephoneContact"]. " \n" .
       "Onderwerp:" . $data["TitelContact"] . " \n" .
       "Bericht:". $data["MessageContact"];
    $headers = "From: " . $data["FirstnameContact"] . " " . $data["LastnameContact"] . " \n";

    mail($to, $subject, $message, $headers);
  }
}