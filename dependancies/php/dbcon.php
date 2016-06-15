<?php
/*Used to begin a connectino with the TODO: modify files to be class es of thier own th that would act as the BaseModel*/
function readDatabase(){
/*$servername = "localhost";
$username = "beetest";
$password = "yi!P0RzP1x[m";
$dbname = "beetest_beeTestdb";*/
function readDatabase(){
$servername = "localhost";
$username = "beetest";
$password = "yi!P0RzP1x[m";
$dbname = "beetest_beeTestdb";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}

function writeDatabase($data){
$servername = "localhost";
$username = "beetest";
$password = "yi!P0RzP1x[m";
$dbname = "beetest_beeTestdb";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}


function selectData($currentYear){
    $stmt = $conn->prepare("SELECT MONTH(collection_date) AS month, DAY(collection_date) AS day, COUNT(*) AS count FROM samples WHERE YEAR(collection_date) = '2016' GROUP BY DAY(collection_date)");

     // $stmt = $conn->prepare("SELECT hive_id, num_mites, collection_date FROM samples");
      $stmt->execute();
}

?>
