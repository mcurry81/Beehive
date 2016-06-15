<?php
session_start();

class SamplesModel extends DBModel{
    

   
    public function insertSample($hivename, $observationdate, $duration, $mitecount, $notes){
			

    	try{

			 $stmt = self::$connection->prepare("INSERT INTO samples(hive_id, collection_date, sample_period, num_mites, notes)VALUES(:name, :observationdate, :duration, :mitecount, :notes)");
                      
            $stmt->bindParam(':name', $hivename, POD::PARAM_STR);
            $stmt->bindParam(':observationdate', $observationdate, PDO::PARAM_STR);
            $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
            $stmt->bindParam(':mitecount', $mitecount, PDO::PARAM_INT);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
        
        	//Execute query
        	$stmt->execute();
        	echo $hivename . "  Data Recorded Successfully!";

        	
        }
        catch(PDOException $e){
        	print "Error: " . $e->getMessage() . "<br/>";
        	return false;
        }
    }

    public function convertToJSON($array){
    	return json_encode($array);
    }

    public function selectSample($hivename){
    	try{
      // Creates a prepared select statement
      $statement = self::$connection->prepare("select * from samples where hive_id = :name");
      
      $statement->bindParam(':name', $hivename, PDO::PARAM_STR);
      $statement->execute();

      // Returns selected rows
      $row = $statement->fetchAll();

    } catch(PDOException  $e ){
      print "Error!: " . $e->getMessage() . "<br/>";
      return false;
    }

    return $row;
  }


  public function getAllSamples(){
  
      $stmt = self::$connection->prepare("select hive_id,  collection_date, num_mites, notes FROM samples");
      $stmt->execute();
      return $stmt;

  }

    }


?>