<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->addOrder();
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
		<div class="card mb-3" style="width: 18rem;">
			<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title"><?php echo $newProduct['product_name'] ?></h5>
				<p class="card-text">
					<?php echo $newProduct['category_name'] ?>
					<?php echo $newProduct['product_price'] ?>
				</p>

	<div class="row">
		<?php 
			$connection = $myfunction->openConnection();
			$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
			$statement->execute();
			$product = $statement->fetchAll();
			$productCount = $statement->rowCount();
			foreach($product as $newProduct) {
		?>

		<form  method="POST">
			<div class="card mb-4 mr-4" style="width:18rem;">
				<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
				<div class="card-body h-100">
					<h5 class="card-title prod_name" name="menu"><?php echo $newProduct['product_name'] ?></h5>
					<input type="hidden" name="menu"value="<?php echo $newProduct['product_name'] ?>">
					<p class="card-text">
						<span>
							<?php echo $newProduct['category_name'] ?>
						</span>
						<span class="prod_price" name="price">
							<?php echo $newProduct['product_price'] ?>
							<input type="hidden" name="price"value="	<?php echo $newProduct['product_price'] ?>">
						</span>
						<label class="control-label">Qty</label>
						<input name="qty" type="number" min="1" value="1"class="form-control text-right" step="any" id="qty" >
						<input name="tableNo" type="hidden"  id="tableno" >
					</p>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success add-order" name="addOrder" >Add Order</button>
				</div>

			</div>
		</form>
		<?php
			}
		?>
	</div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>