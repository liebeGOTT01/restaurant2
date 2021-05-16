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
    public function openConnection(){
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
    public function closeConnection(){
        $this->$connection= null;
    }

    //function for log in based on the role
    public function login(){
        if(isset($_POST['login'])){
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $role = $_POST['role'];
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM user_table WHERE user_email= $email AND user_password = $password");
            $statement->execute();
            $user = $statement->fetch();
            $total = $statement->rowCount();

            if($_SESSION['role'] == 'admin' ){
                header("Location: ../adminDash.php");
			}else{
				header("Location: ../waiter.php");
			}
            
        }
    }

    //function to add category
    public function addCat(){
        if(isset($_POST['enterCat'])){
            $category=$_POST['category'];
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("INSERT INTO  category_table(name) VALUES('$category')");
            $statement->execute();
        }
    }

    //function to update category
    public function updateCat(){
        if(isset($_POST['editCatBtn'])){
            $id=$_POST['ID']; 
            $newCategory=$_POST['newCat'];   
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE category_table SET name=('$newCategory') WHERE id=$id");
            $statement->execute();
        }
    }

    //function to delete category
    public function deleteCat(){
        if(isset($_POST['deleteBtn'])){
            $id=$_POST['id'];    
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("DELETE FROM category_table WHERE id= $id");
            $statement->execute();
        }
    }

    //function to get category which willl be use for dropdown in product modal
    public function getCateg(){
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT name FROM category_table ORDER BY name ASC ");
        $statement->execute();
        $category_result = $statement->fetchAll();
        foreach($category_result as $category){
            echo '<option value="'.$category["name"].'">'.$category["name"].'</option>';
        }
    }

    //function to get all product which willl be use for dropdown in adding order
    public function getProduct(){
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT * FROM product_table ORDER BY product_name ASC ");
        $statement->execute();
        $product_result = $statement->fetchAll();
        foreach($product_result as $product){
            echo '<option value="'.$product["product_name"].','.$product["product_price"].'">'.$product["product_name"].'<p> | </p>'.$product["product_price"].'</option>';
        } 
    }

    //function to add product
    public function addProduct(){
        if(isset($_POST['enterProduct'])){
            $name=$_POST['product_name'];
            $category=$_POST['product_category'];
            $image=$_POST['product_image'];
            $price=$_POST['product_price'];
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("INSERT INTO  product_table (product_name,category_name,product_image,product_price) VALUES('$name','$category','$image','$price')");
            $statement->execute();
        }
    }

    //function to update product
    public function updateProduct(){
        if(isset($_POST['editProd'])){
            $prod_id=$_POST['prod_id']; 
            $newName=$_POST['editProduct_name'];
            $newImage=$_POST['editProduct_image'];
            $newCategory=$_POST['editProduct_category'];
            $newPrice=$_POST['editProduct_price'];   
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE product_table SET product_name=('$newName') , product_image=('$newImage'), category_name= ('$newCategory'), product_price=('$newPrice') WHERE id=$prod_id");
            $statement->execute();
        }
    }

    //function to delete product
    public function deleteProduct(){
        if(isset($_POST['deleteProd'])){
            $prod_id= $_POST['prod_id'];    
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("DELETE FROM product_table WHERE product_id=$prod_id");
            $statement->execute();
        }
    }

    public function addOrder(){
        if(isset($_POST['add_order'])){
            $order= $_POST['productOrder'];  
            $qty= $_POST['qty'];  
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("SELECT * FROM product_table SET product_name=$order");
            $statement->execute();
            $product_order = $statement->fetchAll();

            foreach($product_order as $order){
            echo '<tr>
                <td>'.$order["product_name"].'</td>
                <td>'.$qty.'</td>
                <td>'.$order["price"].'</td>
            </tr>
            ';
            }
        }
    }
}
     


?>