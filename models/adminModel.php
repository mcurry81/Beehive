<?php
session_start();

$usernamme = $_SESSION['username'];

   require('DBModel.php');


     class AdminModel extends DBModel{

       
      public function getAllSamples(){
      
        $stmt = $this->connection->prepare("SELECT hive_id, collection_date,sample_period, num_mites, notes FROM samples"); 
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;


    }


        public function select($query){
            try{
        
                // Creates a prepared select statement
                $statement = $this->connection->prepare("select :query");
                // $statement = $this->connection->prepare("SELECT * FROM Dogs INNER JOIN Events ON Dogs.dogID = Events.dogID WHERE Dogs.unique_loginID =d41d8cd98f00b204e9800998ecf8427e order by dogs.name");
                // References namespace of dog to query
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
         
            // Creates a prepared select statement
            $statement = $this->connection->prepare("SELECT password FROM admins WHERE username = :username LIMIT 1");
            // References namespace of dog to query
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
    
            $statement->execute();
            while($r=$statement->fetch()){
                $p=$r['password'];
            }
              if($password == $p){
                return true;
              } else{
                return false;
              }    
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

    
}

?>