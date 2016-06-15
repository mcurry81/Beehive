<?php
session_start();

$username = $_SESSION['username'];

if(isset($_GET['update'])){
	$action=$_GET['update'];
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



	default:
		include('views/samples.php');
		break;

}
