<?php 
    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->addOrder();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant POS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/parsley/parsley.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/bootstrap-select.min.css"/>


</head>
<style>
      .nopadding {
        padding:0 !important;
      }
</style>
<body>
<div class="container-fluid">
	<div class="row ">
		<div class="col-7">
			<div class="row">
			<?php 
				$connection = $myfunction->openConnection();
				$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
				$statement->execute();
				$product = $statement->fetchAll();
				$productCount = $statement->rowCount();
				foreach($product as $newProduct) {
			?>
				<div class="card col-3 m-2 nopadding" style="width:10rem;">
				<form  method="POST">
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
								<input type="hidden" name="price"value="<?php echo $newProduct['product_price'] ?>">
								<input type="hidden" name="tableNo" value="<?php echo $_GET['id']?>">
							</span>
							<label class="control-label">Qty</label>
							<input name="qty" type="number" min="1" value="1"class="form-control text-right" step="any" id="qty" >
						
						</p>
						<button type="submit" class="btn btn-success add-order" name="addOrder" >Add Order</button>
					</div>
					</form>
				</div>
			
			<?php
				}
			?>
			</div>
		</div>
	<div class="col-5 h-100 fixed-top float-right offset-7 border-left border-dark">
    <a href="waiterTable.php">
        <button class="btn btn-primary float-right">Back To Table List</button>
    </a>
	<form action="" method="POST">
		<!-- <div class="col">
			<label class="control-label">List of Tables</label>
			<select name="tableOrder" id="tableSelect" class="form-control" required data-parsley-trigger="change">
				<option value="">Select Table</option>
				<?php
					//$myfunction->getTableName();
				?>
            </select>
		</div> -->
		<br>
		<br>
		<div class="col">
			<div class="panel panel-default p-2">
				<div class="panel-body p-3" name=""><?php echo $_GET['id']?></div>
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
							$connection =$myfunction->openConnection(); 
							$statement=$connection->prepare("SELECT * FROM order_item_table ORDER BY table_name");
							$statement->execute();
							$order = $statement->fetchAll();
						
							$i = 1;
								foreach($order as $order_list){
								?>
									<tr>
										<td><?php echo $i++?></td>
										<td><?php echo $order_list["product_name"]?></td>
										<td><?php echo $order_list["product_quantity"]?></td>
										<td><?php echo $order_list["product_price"]?></td>
										<td><?php echo $order_list["product_quantity"]*$order_list["product_price"]?></td>
										<td>
											<form method="POST">
												<button type="submit" name="deleteOrderedProduct" class="btn btn-danger text-white btn-circle">X
													<input type="hidden" name="prod_id" value="<?php echo $order_list["order_item_id"]?>">
												</button>
											</form>
										</td>
									</tr>
								<?php
								} 
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
				<button type="submit" class="btn btn-primary w-100">Confirm Order</button>
				<script>
					$(document).ready(function(){
					    $('#tableSelect').on('change',function(){
						 console.log($(this).val());
						 $('#tableno').val($(this).val());
						 
						})
						$count=1;
						$('#tableSelect').change(function(){
							$('.panel-body').html($('#tableSelect').val())
						})
					})
				</script>	
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
</body>
</html>