<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->addOrder();
?>

<div class="container">
	<div class="row">
    <div class="col-6">

    <?php 
		$connection = $myfunction->openConnection();
		$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
		$statement->execute();
		$product = $statement->fetchAll();
		$productCount = $statement->rowCount();
		foreach($product as $newProduct) {
	?>

	<form  method="POST">
		<div class="card mb-4" style="width:10rem;">
			<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
			<div class="card-body ">
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
	<div class="col-6">
	<form action="" method="POST">
		<div class="col">
			<label class="control-label">List of Tables</label>
			<select name="tableOrder" id="tableSelect" class="form-control" required data-parsley-trigger="change">
				<option value="">Select Table</option>
				<?php
					$myfunction->getTableName();
				?>
            </select>
		</div>
		<br>
		<br>
		<div class="col">
			<div class="panel panel-default p-2">

				<div class="panel-body p-3" name="tableNo"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<table class="table table-bordered" id="list">
					<colgroup>
						<col width="5%">
						<col width="30%">
						<col width="10%">
						<col width="25%">
						<col width="25%">
						<col width="5%">
					</colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>Menu</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Amount</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="tbody">
						<?php
							$myfunction->dispOrder();
						?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-right" colspan="4">Total</th>
							<th class="text-right tamount"></th>
							<th></th>
						</tr>
					</tfoot>
				</table>
				<button type="submit" class="btn btn-primary w-100">Submit to kitchen</button>
			</div>
		</div>
	</form>
	</div>
	</div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>