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
      /*
      siteKey= '6Lf_3CETAAAAAFGGXtK7k423X9vjk-s9-qf8jm2u';
      secretKey = '6Lf_3CETAAAAAAqwgse4vEg-xG56Wae3R6ZdXRZ2';
      */

      $publicKey = '6LcAzh4TAAAAAAKLZGBjOcowZcCCpWFMUNWQY43_';
      $secretKey = "6LcAzh4TAAAAAJXLqrRsrQQI_YUNwmr6sslNKxVn";
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

  /*case "graph":

    unset($_POST['g-recaptcha-response']);
    (intVal($responseKeys == 1));
      header('Location:htbeetest.greenrivertech.net/views/chartRedo.php');
            //include_once('views/chart.php');

          //require_once'php/getData.php';
    
    include("models/chartModel.php");
    $db->disconnect();
            $db = new ChartModel();
            $db->connect();
            $miteCount = $db->mitecount(date(y));
            /*$averageMitesPerHive = round((int)$miteCount / (int)$numberofHivesAnnual(date(y)));

           $data = '[';
      foreach($miteCount as $row){
        $data .="[new Date(".$row['year'].",".$row['month'].",".$row['day']."),".$row['month']."]";
      }
      $data .= ']';
            break;*/


	case "add":
		include_once'views/hiveForm.php';
		break;

   		//display form as default view
		default:
			include('views/hiveForm.php');
			break;
}
 ?>