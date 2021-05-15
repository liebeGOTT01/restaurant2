<?php
class functions{
    // Initializing varaibles to be used in connecting to the online database using phpmyadmin
    private $server = "mysql:host=remotemysql.com;dbname=Kfsv6dYlFX"; // server and db
    private $user = "Kfsv6dYlFX";                                     // username
    private $password = "jBU4up1WuP";                                 // password 

    // making some options
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    protected $connection; // initalized variable connection

    //Establishing connections 
    public function openConnection()
    {
        try {
           
            $this->connection= new PDO(
                $this->server,
                $this->user,
                $this->password,
                $this->options
            );
           
            return $this->connection;
        } catch (PDOException $error) {
            echo "Erro connection:" . $error->getMessage();
        }
    }

    // Function to close connection
    public function closeConnection()
    {
        $this->$connection= null;
    }


    
    public function addCat(){
        if(isset($_POST['enterCat'])){
            $category=$_POST['category'];
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("INSERT INTO  category_table(name) VALUES('$category')");
            $statement->execute();
        }
    }

    public function updateCat(){
        if(isset($_POST['editCatBtn'])){
            $id=$_POST['ID']; 
            $newCategory=$_POST['newCat'];   
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE category_table SET name=('$newCategory') WHERE id=$id");
            $statement->execute();
        }
    }

    public function delete(){
        if(isset($_POST['deleteBtn'])){
            $id=$_POST['id'];    
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("DELETE FROM category_table WHERE id= $id");
            $statement->execute();
        }
    }
}
     

?>