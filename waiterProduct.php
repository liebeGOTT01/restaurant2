<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
?>

<div class="container">
    <div class="col">
    <?php 
		$connection = $myfunction->openConnection();
		$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
		$statement->execute();
		$product = $statement->fetchAll();
		$productCount = $statement->rowCount();
		foreach($product as $newProduct) {
	?>
		<div class="card" style="width: 18rem;">
			<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?php echo $newProduct['product_name'] ?></h5>
				<p class="card-text">
					<?php echo $newProduct['category_name'] ?>
					<?php echo $newProduct['product_price'] ?>
				</p>
			</div>
        </div>
    <?php
        }
    ?>
    </div>
</div>