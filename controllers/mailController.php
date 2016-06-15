<?php
session_start();
include('models/mailModel.php');




$_SESSION['email'] = $_POST['email'];
$_SESSION['subject'] = $_POST['subject'];
$_SESSION['body'] = $_POST['body'];
$_SESSION['name'] = $_POST['name'];

if(isset($_GET['action'])){
	$action = $_GET['action'];
}


$db = new mailModel();
$db->connect();
//help pass samples to various switches


switch($action){



	case "mail":

   		include'views/mailForm.php';
   		break;

	case "send":
		// My email address

      $recipient = 'mcurry4@mail.greenriver.edu';
      $email = $_SESSION['email'];
	  $subject = $_SESSION['subject'];
	  $body = $_SESSION['body'];
	  $name = $_SESSION['name'];
   
   		$mail = $db->sendMail($email, $subject, $body, $name);
   		include'views/confirmMail.php';
   		break;


		default:
			include('views/hiveForm.php');
			break;


}






   

 ?>