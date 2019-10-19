<?php
class products{

//    private $conn;
    private $name;
    private $description;
    private $price;
    private $category_id;
    private $created;


    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function setCreated()
    {

        //date

        $date = new DateTime();
        $created_datetime = $date->format('Y-m-d H:i:s');

        $this->created = $created_datetime;

    }


    public  function  create(){
        $this->setCreated();

        echo 'yasmin';

        $sql = "INSERT INTO products(name,description,price,category_id,created)
                   VALUES('$this->name','$this->description',$this->price,'$this->category_id','$this->created')";

//        var_dump($sql);
        return   $this->conn->exec($sql);
    }



    public  function  getAll(){

        // for get data from database


        $stmt = $this->conn->prepare("select products.*, categories.name as category from products inner join categories on products.category_id = categories.id");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public  function delete($id){


        $sql = "DELETE FROM products WHERE id=$id" ;
        $r= $this->conn->exec($sql);
        return $r;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */





}