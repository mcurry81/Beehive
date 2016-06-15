<?php

function readDatabase(){
$servername = "localhost";
$username = "mcurry";
$password = "Peyton#01";
$dbname = "mcurry_grcc";


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


//Establish database connection
$conn = readDatabase();

/*TODO:MOve code below to a model later*/
 $stmt= $conn->prepare("SELECT hive_id, num_mites, collection_date FROM samples WHERE hive_id = '{$hivename}'"); 
    $stmt->execute();
    $cols[] = array('id': '1' , 'hive_id' => "j", "date" => "", "mites" => "");
  

    $hiveData = array();
     while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC))
     {
      $hiveData[] = $row;
     }

     echo json_encode($hiveData);




    $hiveData= array();
    $hiveData['cols'] = 
      array(
        'label' => 'hive_id', 'type' => 'string'),
      array(
        'label' => 'num_mites', 'type' => 'number_format(number)'),
      array(
        'label'=> 'collection_date', 'type' => 'date(m/d/Y)' ), 


echo "the hive content is: " . $hiveData;

var_dump($hiveData);
 
                        /* while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                      {
                             echo "<tr>";
                             echo "<td>" . $row['hive_id'] . "</td>";
                             echo "<td>" . $row['num_mites'] . "</td>";
                             echo "<td>" . $row['collection_date'] . "</td>";
                             echo "</tr>";
                      }
                      echo "</table>";*/


/*
    $stmt2 = $conn->prepare("SELECT hive_id, num_mites, collection_date FROM samples"); 
    $stmt2->execute();
    $totalEvents = $stmt2->fetchAll();
    print_r($totalEvents);
    create json_encode($totalEvents);*/

?>