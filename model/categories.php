<?php
class categories{


    private $conn;
    private $name;
    private $created;


   public function __construct($conn)
   {
       $this->conn = $conn;

   }


    public function setCreated()
    {

        $date = new DateTime();
        $created_datetime = $date->format('Y-m-d H:i:s');

        $this->created = $created_datetime;

    }

    public  function  create(){
        $this->setCreated();

        echo 'yasmin';

        $sql = "INSERT INTO categories(name,created)
                   VALUES('$this->name','$this->created')";

//        var_dump($sql);
        return   $this->conn->exec($sql);
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }



   function  getAll()
   {
    $query= $this->conn->prepare("SELECT id,name,modified,created FROM categories" );
    $query->execute();

    $result=$query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
     }

    public  function delete($id){


        $sql = "DELETE FROM categories WHERE id=$id" ;
        $r= $this->conn->exec($sql);
        return $r;
    }


}