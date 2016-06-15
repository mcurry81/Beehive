<?php

include('dbcon.php');
/*function read(){
    
    $servername = "localhost";
    $username = "beetest";
    $password = "yi!P0RzP1x[m";
    $dbname = "beetest_beeTestdb";

    
    try {
        $conn = new PDO("mysql:host=$servername,dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; 
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
}
*/
//Establish database connection
$conn = read();

        
            $statement = $conn->prepare("SELECT SUM(num_mites) as mitecount,  MONTH(collection_date) AS month FROM samples WHERE YEAR(collection_date) = 2016 GROUP BY MONTH(collection_date)");
            // References namespace of dog to query
        
            $statement->execute();
            
    
        

   // $rows=array();

   /* while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $rows = $row;
    }*/
    foreach($row as $rows){
        $rows = $row;
    }
  //  print json_encode($rows);
print_r($rows);



?>