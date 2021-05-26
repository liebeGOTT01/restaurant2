<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->addOrder();
?>

<div class="container">
	<div class="row justify-content-center">
		<?php 
			$connection = $myfunction->openConnection();
			$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
			$statement->execute();
			$product = $statement->fetchAll();
			$productCount = $statement->rowCount();
			foreach($product as $newProduct) {
		?>

		<form  method="POST">
			<div class="card mb-4 mr-5 border border-transparent mb-5" style="width:18rem;">
				<div class="float-right" style="margin-top:-5%; margin-bottom:-7%;color:blue;font-size:1rem;z-index:3;position:relative">
					<button style="border-radius:20px;background-color:#0D98BA;color:white" type="submit" class="btn add-order font-weight-bold" name="addOrder"><i class="fas fa-plus"></i></button>
				</div>
				<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
				<div class="card-body h-50">
					<div class="row">
						<div class="col">
							<h5 style="font-size:0.95rem;" class="card-title prod_name text-uppercase font-weight-bold" name="menu"><?php echo $newProduct['product_name'] ?></h5>
							<input type="hidden" name="menu"value="<?php echo $newProduct['product_name'] ?>">
						</div>
						<div class="col">
							<span class="prod_price float-right text-danger" name="price">
							₱<?php echo $newProduct['product_price'] ?>
								<input type="hidden" name="price"value="<?php echo $newProduct['product_price'] ?>">
							</span>
						</div>
					</div>
						<p class="card-text text-capitalize">
							<span class="">
								<?php echo $newProduct['category_name'] ?>
							</span>

							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text bg-primary text-white control-label">Quantity: </span>
								</div>
									<input name="qty" type="number" min="1" value="1"class="form-control text-right" step="any" id="qty" >
									<input name="tableNo" type="hidden"  id="tableno" >
							</div>
						</p>
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