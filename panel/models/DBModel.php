<?php
    class DBModel{

        // Place to store the database connection
      protected static $connection;

      public function connect(){
      
        try{
            $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../config/config.ini');
            $this->connection = new PDO($config['dbname'], $config['username'], $config['password']);
          }
        catch(PDOException $e){
          print "Error: " . $e->getMessage() . "</br>";
          die();
          return false;
        }
          return $this->connection;
          //return self::$connection;
        }


        public function disconnect(){
          self::$connection= null;
        } 
      }

    

      
