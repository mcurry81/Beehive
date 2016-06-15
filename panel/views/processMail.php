<?php


 // My email address
      $recipient = //admin email
      $email = $_POST['email'];
      $name = $_POST['name'];
      $subject = $_POST['subject'];
      $body = $_POST['body'];
      
      //list of error messages in an array
      $messages = array();
    
    //validate email address
    if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
    $messages[] = "I'm sorry, that is not a valid email address.";
    }
    
    //validate name input
    if (!preg_match("/^[\w\ \+\-\'\"]+$/", $name)) {
    $messages[] = "I'm sorry, the name field must contain only " .
    "alphanumberical characters, spaces, and appropriate " .
    "punctuation.";
    }
   
    //replace special characters with empty string in subject line to prevent 
    $subject = preg_replace('/\s+/', ' ', $subject);

    //no blank subject
    if (preg_match('/^\s*$/', $subject)) {
    $messages[] = "Please specify a subject for your message.";
    }

    $body = $_POST['body'];
    
    //validate message content
    if (preg_match('/^\s*$/', $body)) {
    $messages[] = "I'm sorry, you can't send a blank message"; 
    }
      if (count($messages)) {

       //if there are validation errors don't send message
        foreach ($messages as $message) {
          echo("<p>$message</p>\n");
        }
        echo("<p>Please go back and correct the error and resend, thank you!</p>");
      } else {
        //passes validation then send
    mail($recipient,
          $subject,
          $body,
          "From: $name <$email>\r\n" .
          "Reply-To: $name <$email>\r\n"); 
        echo("<p>Your message has been sent. Thank you!</p>\n");
      }