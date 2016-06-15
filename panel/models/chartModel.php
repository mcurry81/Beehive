<?php
include_once('DBModel.php');


/**
* TODO: Go through code and remove unused functions
*/
class ChartModel extends DBModel {
    



    public function miteCount($year){
        try{
        
            $statement = $this->connection->prepare("SELECT SUM(num_mites) as mitecount,  MONTH(collection_date) AS month FROM samples WHERE YEAR(collection_date) = :year GROUP BY MONTH(collection_date)");
            $statement->bindParam(':year', $year, PDO::PARAM_INT);
            $statement->execute();
    
            // Returns selected rows
            $row = $statement->fetchAll();
    
        } catch(PDOException  $e ){
          print "Error!: " . $e->getMessage() . "<br/>";
          return false;
        }
    
        return $row;
    }
  
    
    public function selectHives($currentMonth){
        try{
        
            $statement = $this->connection->prepare("SELECT YEAR(collection_date)AS year, MONTH(collection_date) AS month, DAY(collection_date) AS day, COUNT(*) AS count FROM samples WHERE MONTH(collection_date) = :month GROUP BY DAY(collection_date)");
            $statement->bindParam(':month', $currentMonth, PDO::PARAM_INT);
            $statement->execute();
    
            // Returns selected rows
            $row = $statement->fetchAll();
    
        } catch(PDOException  $e ){
          print "Error!: " . $e->getMessage() . "<br/>";
          return false;
        }
    
        return $row;
    }
  
  public function convertToJSON($array){
    return json_encode($array);
  }
  
    public function numberOfEntries($currentMonth){
        try{
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT * FROM samples WHERE MONTH(collection_date) = :month");
            $statement->bindParam(':month', $currentMonth, PDO::PARAM_INT);
            $statement->execute();
    
            // Returns selected rows
            $row = $statement->fetchAll();
    
        } catch(PDOException  $e ){
          print "Error!: " . $e->getMessage() . "<br/>";
          return false;
        }
    
        return count($row);
    }
    
    public function numberOfUsers($currentMonth){
        try{
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT user FROM samples WHERE MONTH(collection_date) = :month GROUP BY user"); 
            $statement->bindParam(':month', $currentMonth, PDO::PARAM_INT);
            $statement->execute();
    
            // Returns selected rows
            $row = $statement->fetchAll();
    
        } catch(PDOException  $e ){
          print "Error!: " . $e->getMessage() . "<br/>";
          return false;
        }
    
        return count($row);
    }

        public function numberOfHives($currentMonth){
        try{
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT hive_id FROM samples WHERE MONTH(collection_date) = :month GROUP BY hive_id");
            $statement->bindParam(':month', $currentMonth, PDO::PARAM_INT);
            $statement->execute();
    
            // Returns selected rows
            $row = $statement->fetchAll();
    
        } catch(PDOException  $e ){
          print "Error!: " . $e->getMessage() . "<br/>";
          return false;
        }
    
        return count($row);
    }


       public function numberOfHivesAnnual($year){
        try{
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT hive_id FROM samples WHERE YEAR(collection_date) = :year GROUP BY hive_id");
            // References namespace of dog to query
            $statement->bindParam(':year', $currentMonth, PDO::PARAM_INT);
            $statement->execute();
    
            // Returns selected rows
            $row = $statement->fetchAll();
    
        } catch(PDOException  $e ){
          print "Error!: " . $e->getMessage() . "<br/>";
          return false;
        }
    
        return count($row);
    }


      /*   public function miteCount($year){

            
            $statement = $this->connection->prepare("SELECT SUM(num_mites) as mitecount, MONTH(collection_date) as month FROM samples WHERE YEAR(collection_date) = :year GROUP BY MONTH(collection_date)");
            $statement->bindParam(':year', $year, PDO::PARAM_INT);
            $statement->execute();
  
            // Returns selected rows
          /*  $row = $statement->fetchAll();*/
    
           /* return $row;
  
    }*/  

}
?>