<?php
session_start();

$usernamme = $_SESSION['username'];

   require('DBModel.php');


     class AdminModel extends DBModel{


    public function getAllSamples(){
  
      $stmt = $this->connection->prepare("SELECT hive_id,  collection_date, sample_period, num_mites, notes FROM samples");
      $stmt->execute();

      $row=$stmt->fetchAll();

      return $row;

  }


        public function select($query){
            try{
        
                // Creates a prepared select statement
                $statement = $this->connection->prepare("select :query");
                $statement->bindParam(':query', $query, PDO::PARAM_STR);
                $statement->execute();

                // Returns selected rows
                $row = $statement->fetchAll();

            } catch(PDOException  $e ){
                print "Error!: " . $e->getMessage() . "<br/>";
                return false;
            }

            return $row;
        }


    public function validatePassword($username,$password){
        try{
         
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT password FROM admins WHERE username = :username LIMIT 1");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            // Returns selected rows
            $row = $statement->fetchAll();
        if($password == $row[0]['password']){
            return true;
        } else {
            return false;
        }
        } catch(PDOException  $e ){
            //print "Error!: " . $e->getMessage() . "<br>";
            return false;
        }   
  }

       public function getPassword($username){
         
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT password FROM admins WHERE username = :username LIMIT 1");
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
    
            $statement->execute();
            return $row; 
    }



    public function convertToJSON($array){
        return json_encode($array);
    }



    public function selectSample($hivename){
        try{
      // Creates a prepared select statement
      $statement = $this->connection->prepare("select * from samples where hive_id = :name");
      
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

    
}

?>