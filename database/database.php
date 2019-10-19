<?php
class database{

private $servername="localhost";
private $username = "root";
private $password = "asd=fg44";
private $dbname = "store";




    public function connect() {


       try {
           $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username,$this->password);
           // set the PDO error mode to exception
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//           echo "Connected successfully";
           return $conn;
       }
       catch(PDOException $e)
       {
           echo "Connection failed: " . $e->getMessage();
       }

   }


}