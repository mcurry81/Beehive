<?php
session_start();
$action = $_SESSION['action'];
require('DBModel.php');
$_SESSION['isValid'] = $_POST['isValid'];
echo $_SESSION['isValid'];
class mailModel extends DBModel{
    
  
    public function sendMail($email, $subject, $body, $name){
        // My email address
      //$recipient = 'dnajera@greenriver.edu';
    $recipient = 'mcurry4@mail.greenriver.edu';
      //list of error messages in an array
      $messages = array();
     
      $isValid = true; 
      //validate email address
      if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
      $messages[] = "I'm sorry, that is not a valid email address.";
      $isValid = false;
      }
      
      //validate name input
      if (!preg_match("/^[\w\ \+\-\'\"]+$/", $name)) {
      $messages[] = "I'm sorry, the name field must contain only " .
      "alphanumberical characters, spaces, and appropriate " .
      "punctuation.";
      $isValid = false; 
     
      }
     
      //replace special characters with empty string in subject line to prevent 
      $subject = preg_replace('/\s+/', ' ', $subject);

      //no blank subject
      if (preg_match('/^\s*$/', $subject)) {
      $messages[] = "Please specify a subject for your message.";
       $isValid = false; 
      }

      $body = $_POST['body'];
      
      //validate message content
      if (preg_match('/^\s*$/', $body)) {
      
      }
        if (count($messages)) {

         //if there are validation errors don't send message
          foreach ($messages as $message) {
            echo("<p>$message</p>\n");
          }
          echo("<p>Please </p>");
        } 

        else {
          //passes validation then send
                   mail($recipient,
                          $subject,
                          $body,
                          "From: $name <$email>\r\n" .
                          "Reply-To: $name <$email>\r\n"); 
                          echo("<p>Your message has been sent. Thank you!</p>\n");
              }
          }
    }
?>