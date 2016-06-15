<?php
session_start();
ob_start();
include("models/viewModel.php");
require_once("views/recaptchalib.php");


//include('dependancies/models/SamplesModel.php');
$dateNow = date("Y.m.d");
//maybe to hold all values submitted today
$_SESSION['dateNow'] = $dateNow;
//$action = $_POST['event'];

$user = $_SESSION['user'];
$hivename = $_POST['hivename'];
$observationdate = $_POST['observationdate'];
$duration = $_POST['duration'];
$mitecount = $_POST['mitecount'];
$notes = $_POST['notes'];


//$action = $_SESSION['action'];
if($_GET['action']  == 'submit'){
	$action = 'submit';
}else if($_GET['action'] == 'add'){
	$action = 'add';
}else if($GET['action'] == 'graph'){
  $action = 'graph';
}


$db = new ViewModel();
$db->connect();

//help pass samples to various switches
$samples = $db->selectSamples($user);
switch($action){

	case "submit":


  if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
    

      $publicKey = //site public key
      $secretKey = //secret key
      $ip = $_SERVER['REMOTE_ADDR'];
      $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

      $responseKeys = json_decode($response,true);
      

        if(intval($responseKeys["success"]) >= 1) {
          echo '<h3>***You must pass recaptcha verification to submit data.***</h3>';
          include_once('views/hiveForm.php');
        } 
        else {
            $db->insertSample($user, $hivename, $observationdate, $duration, $mitecount, $notes);
            $samples = $db->selectUserSamples($user);
            
            include_once'views/record.php';
        }
     
          break;



	case "add":
		include_once'views/hiveForm.php';
		break;

   		//display form as default view
		default:
			include('views/hiveForm.php');
			break;
}
 ?>