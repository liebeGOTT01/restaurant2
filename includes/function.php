<?php

class functions{
    // Initializing variables to be used in connecting with the online database 
    private $server = "mysql:host=remotemysql.com;dbname=Kfsv6dYlFX"; // server and db
    private $user = "Kfsv6dYlFX";                                     // username
    private $password = "jBU4up1WuP";                                 // password 

    // PDO options
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
            // echo $email;
            // echo $password;
           
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM user_table WHERE user_email=? AND user_password=?");
            $statement->execute([$email, $password]);
            $user = $statement->fetch();
            $total = $statement->rowCount();
            $role = $_POST['role'];

            if($total > 0){
                if ($user['user_password'] === $password && $user['user_email']== $email && $user['role'] == $role) {
                    echo "true";
					$_SESSION['role'] = $user['role'];
					$_SESSION['user_email'] = $user['user_email'];
	
					if ($_SESSION['role'] == 'admin'){
						header("Location: ./adminDash.php");
					}else if($_SESSION['role'] == 'waiter'){
						header("Location: ./waiterDash.php");
					}
	
				}else {
                    echo "false";
				}
            }else{
                echo "<div class='alert alert-danger' role='alert'> 
                        Login failed! 
            
                    </div> ";
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

    //function to get all product which will be use for dropdown in adding order
    public function getProduct(){
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT * FROM product_table ORDER BY product_name ASC ");
        $statement->execute();
        $product_result = $statement->fetchAll();
        foreach($product_result as $product){
            echo '<option value="'.$product["product_name"].'">'.$product["product_name"].' '.'<span class="price">'.$product["product_price"].'</span>'.'</option>';
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
        if(isset($_POST['editProduct'])){
            $eprod_id=$_POST['eprod_id']; 
            $newName=$_POST['editProduct_name'];
            $newImage=$_POST['editProduct_image'];
            $newCategory=$_POST['editProduct_category'];
            $newPrice=$_POST['editProduct_price'];  
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE product_table SET product_name='$newName' , product_image='$newImage', category_name= '$newCategory', product_price='$newPrice' WHERE product_id=$eprod_id");
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

    
    //function to get the list of table and adding it to waiter table
    public function getTable(){
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT * FROM table_data ORDER BY table_name ASC ");
        $statement->execute();
        $table_result = $statement->fetchAll();
        
        foreach($table_result as $table){
            ?>
            <div class="col mb-4 pb-4">
                    <div class="card" style="width:18rem;">
                        <!-- <div class="card-header bg-primary">
                            <span class="text-center d-flex justify-content-center" style="text-transform:uppercase;color:#0AF3C8;font-weight:bold">
                                <?php echo $table["table_status"]?>
                            </span>
                        </div> -->
                        <div class="position-relative">
                            <img class="img-fluid" src="img/table.png" alt="">
                            <div class="centered text-white h5"><?php echo $table["table_name"]?></div>
                        </div>
                 
                        <div class="card-footer bg-primary">
                            <div class="row d-flex justify-content-center">
                            <div class="tab-card">
                                <a href="addOrder.php?id=<?php echo $table['table_name']?>"><button type="button" class="btn btn-info btn-m mr-2 text-white" style="border-radius:20px">Add Order</button></a>
                                <a href="seeOrder.php?tableId=<?php echo $table['table_name']?>"><button type="button" class="btn btn-warning btn-m text-danger" style="border-radius:20px">Order Details</button></a>
                            </div>  
                        </div>

                        </div>
                    </div>
                </div>
            <?php  
        } 
    }

    
    //function to get all product which will be use for dropdown in adding order
    public function getTableName(){
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT table_name FROM table_data ORDER BY table_name ASC ");
        $statement->execute();
        $table = $statement->fetchAll();
        foreach($table as $table_name){
            echo '<option value="'.$table_name["table_name"].'">'.$table_name["table_name"].'</option>';
        } 
    }   

    //function to add order which is to be submitted to the kitchen
    public function addOrder(){
        if(isset($_POST['addOrder'])){
            $order= $_POST['menu'];  
            $qty= $_POST['qty'];
            $status = "pending";
            $price= $_POST['price'];
            $table= $_POST['tableNo'];
            $amount= $_POST['qty']*$_POST['price'];
            $connection =$this->openConnection();
            $statement=$connection->prepare("INSERT INTO  order_item_table(table_name,product_name,product_quantity,product_price,amount,order_status) VALUES('$table','$order','$qty','$price','$amount','$status')");
            $statement->execute();
        }
    }  

    //function to delete a specific ordered product
    public function deleteOrderedProduct(){
        if(isset($_POST['deleteOrderedProduct'])){
            $product_id= $_POST['p_id'];    
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("DELETE FROM order_item_table WHERE order_item_id = $product_id");
            $statement->execute();
        }
    }

    //function to delete a specific ordered product
    public function cancelOrder(){
        if(isset($_POST['cancelOrder'])){
            $cancel_id= $_POST['cancel_id'];    
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("DELETE FROM order_item_table WHERE order_item_id=$cancel_id");
            $statement->execute();
        }
    } 

    //function to confirm an order made by the kitchen
    public function confirmOrder(){
        if(isset($_POST['confirmOrder'])){
            $confirm_id= $_POST['confirm_id'];  
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE order_item_table SET order_status='confirmed' WHERE order_item_id=$confirm_id");
            $statement->execute();
        }
    }

    //function to deliver a confirmed order made by the waiter
    public function deliverOrder(){
        if(isset($_POST['deliverOrder'])){
            $deliver_id= $_POST['deliver_id'];  
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE order_item_table SET order_status='delivered' WHERE order_item_id=$deliver_id");
            $statement->execute();
        }
    }
    //function to reject an order made by the kitchen
    public function rejectOrder(){
        if(isset($_POST['rejectOrder'])){
            $reject_id= $_POST['reject_id'];  
            $connection =$this->openConnection(); 
            $statement=$connection->prepare("UPDATE order_item_table SET order_status='rejected' WHERE order_item_id=$reject_id");
            $statement->execute();
        }
    }

    //function to get the total amount
    public function getTotal(){
        $table=$_GET['tableId'];  
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT SUM(amount) AS totalAmount FROM  order_item_table WHERE order_status='delivered' and table_name='".$table."'");
        $statement->execute();
        $totalAmount = $statement->fetch();
        echo $totalAmount['totalAmount'];
    }

    public function getAddOrderTotal(){
        $tablename=$_GET['id']; 
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT SUM(amount) as totalAmount from  order_item_table  WHERE table_name='".$tablename."'");
        $statement->execute();
        $total = $statement->fetch();
        echo $total['totalAmount'];
    }

    public function payOrder(){
        if(isset($_POST['payBtn'])){
            $salesTable= $_POST['salesTable'];
            $salesAmount= $_POST['salesAmount'];
            $payDate = date("Y/m/d");
            $table=$_GET['tableId']; 
            $connection =$this->openConnection();
            $statement=$connection->prepare("INSERT INTO  sales_table(table_name,amount,sold_at) VALUES('$salesTable','$salesAmount','$payDate')");
            $statement->execute();

            $statement2=$connection->prepare("DELETE FROM order_item_table WHERE table_name='".$salesTable."'");
            $statement2->execute();
        }
    }

    public function getDailySales(){
        $today = date("Y/m/d");
        $connection =$this->openConnection(); 
        $statement=$connection->prepare("SELECT SUM(amount) AS todaySales FROM  sales_table WHERE sold_at='".$today."'");
        $statement->execute();
        $todaySales = $statement->fetch();
        echo "₱". $todaySales['todaySales'];
    }
    
}
?>