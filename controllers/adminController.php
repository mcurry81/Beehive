<?php
session_start();

$username = $_SESSION['username'];

if(isset($_GET['update'])){
	$action=$_GET['update'];
}
if($_GET['action'] == "samples"){
	$action = "samples";
}else if ($_GET['action'] == "download")){
	$action = "download";
}


include('models/adminModel.php');

$db = new AdminModel();
$db->connect();

$samples = $db->getAllSamples();

switch($action){

	case showSamples:
		$samples = $db-getAllSamples();

		include('views/samples.php');
		break;


		  $db->insertSample($user, $hivename, $observationdate, $duration, $mitecount, $notes);
            $samples = $db->selectUserSamples($user);
            
            include_once'views/record.php';
        }

	//case stats:

	default:
		include('views/samples.php');
		break;

}
