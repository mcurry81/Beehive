<?php

class DownloadModel{

  protected $db;

  public function __construct(PDO $db){
    $this->db = $db;
  }

    /*public function getAllSamples(){
      
        $stmt = $this->connection->prepare("SELECT hive_id, collection_date,sample_period, num_mites, notes FROM samples"); 
        $stmt->execute();
        return $stmt;
    }*/


      public function getAllSamples(){
      
        $stmt = $this->connection->prepare("SELECT hive_id, collection_date,sample_period, num_mites, notes FROM samples"); 
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $stmt;
    }
}
?>