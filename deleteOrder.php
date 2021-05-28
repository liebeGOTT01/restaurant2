<?php

    include('includes/function.php');
    $myfunction=new functions; 

    $id=$_GET['idP'];
    echo '<script>alert("$id")</script>';
    $connection =$myfunction->openConnection(); 
        $statement=$connection->prepare("DELETE FROM order_item_table WHERE order_item_id=$id");
            $statement->execute();
            header("Location:addOrder.php");
?>