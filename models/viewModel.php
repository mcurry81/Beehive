<?php

session_start();
$action = $_SESSION['action'];
$user = session_id();
$_SESSION['user'] = $user;

$hivename = $_POST['hivename'];
$observationdate = $_POST['observationdate'];
$duration = $_POST['duration'];
$mitecount = $_POST['mitecount'];
$notes = $_POST['notes'];


require('DBModel.php');

class ViewModel extends DBModel {
    

    public function insertSample($user, $hivename, $observationdate, $duration, $mitecount, $notes){
          
            $user = $_SESSION['user'];
            $hivename = $_POST['hivename'];
            $observationdate = $_POST['observationdate'];
            $duration = $_POST['duration'];
            $mitecount = $_POST['mitecount'];
            $notes = $_POST['notes'];


           $stmt = $this->connection->prepare("INSERT INTO samples(user, hive_id, collection_date, sample_period, num_mites, notes)VALUES(:user, :hivename, :observationdate, :duration, :mitecount, :notes)");
                      
                      $stmt->bindParam(':user', $user);
                      $stmt->bindParam(':hivename', $hivename);
                      $stmt->bindParam(':observationdate', $observationdate);
                      $stmt->bindParam(':duration', $duration);
                      $stmt->bindParam(':mitecount', $mitecount);
                      $stmt->bindParam(':notes', $notes);
        
        //Execute query
        $stmt->execute();

          echo "<strong>" . strtoupper($hivename) . "</strong>" . " has been recorded sucessfully!". "<br>";
  
    }


    public function convertToJSON($array){
    	return json_encode($array);
    }


    public function selectSamples($hivename){
  

      // Creates a prepared select statement
      $stmt = $this->connection->prepare("SELECT hive_id, collection_date, num_mites, notes from samples WHERE hive_id = :hivename");
      
      $stmt->bindParam(':hivename', $hivename, PDO::PARAM_STR);
      $stmt->execute();

      // Returns selected rows
      $row = $stmt->fetchAll();

      return $row;
  }




public function selectUserSamples($user){
      $user = $_SESSION['user'];
      // Creates a prepared select statement
      $statement = $this->connection->prepare("SELECT hive_id, collection_date, num_mites, notes FROM samples WHERE user = '{$user}'");
     
      //$statement->bindParam(':user', $user, PDO::PARAM_STR);
      $statement->execute();

      // Returns selected rows
      $row = $statement->fetchAll();

      return $row;
  }





      public function getAllSamples(){
      
        $stmt = $this->connection->prepare("SELECT hive_id, collection_date, num_mites FROM samples"); 
        $stmt->execute();
      

      // Returns selected rows
      $row = $stmt->fetchAll();

      return $row;


    }



    }


?>