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
	<h1 class="h3 mb-4 text-gray-800 mt-5">Order Menu List</h1>
	<a href="waiterTable.php">
		<button class="btn btn-primary" style="border-radius:20px">Back To Table List</button>
	</a>
	<div class="row mr-2">
		<div class="col-7" id="left">
			<div class="row">
				<?php 
					$connection = $myfunction->openConnection();
					$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
					$statement->execute();
					$product = $statement->fetchAll();
					$productCount = $statement->rowCount();
					foreach($product as $newProduct) {
						?>
				
				<div class="card col-4 m-5 nopadding" >
					<form  method="POST">
						<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">
								<span class="prod_price" name="price">
									<div class="row">
										<div class="col-sm">
											<h5 style="font-size:1.1rem;color:#0A69F3;" class="card-title prod_name text-capitalize" name="menu">
												<?php echo $newProduct['product_name'] ?>
											</h5>
												<input type="hidden" name="menu" value="<?php echo $newProduct['product_name'] ?>">
										</div>
										<div class="col-sm text-danger font-weight-bold">
											₱<?php echo $newProduct['product_price'] ?>
											<input type="hidden" name="price"value="<?php echo $newProduct['product_price'] ?>">
											<input type="hidden" name="tableNo" value="<?php echo $_GET['id']?>">
										</div>
									</div>
										<h7 class="text-capitalize font-weight-bold text-primary"><?php echo $newProduct['category_name'] ?></h7>
								</span>
							</p>
							<div class="input-group">
								<div class="input-group-prepend">
									<!-- control-label -->
									<span class="input-group-text bg-info text-primary">Qty: </span>
								</div>
								<input name="qty" type="number" min="1" value="1"class="form-control text-right" step="any" id="qty" >
							</div>
							<button type="submit" class="btn add-order mt-3 glass-button" name="addOrder">Add Order</button>
						</div>
				
					</form>
			
				</div>
				<?php
					}
				?>
			</div>
		</div>

		<div class="border-left border-dark" style="margin-left:-4%;"></div>
		<div class="col-5 h-100 fixed-top float-right offset-7" id="middle">
    			<!-- <a href="waiterTable.php">
				<button class="btn btn-primary float-right">Back To Table List</button>
			</a> -->
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
						<h4><div class="panel-body p-2 text-white text-uppercase" name=""><?php echo $_GET['id']?></div></h4>
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
												<td class="text-capitalize" style="color:#0A69F3;"><?php echo $order_list["product_name"]?></td>
												<td style=""><?php echo $order_list["product_quantity"]?></td>
												<td class="text-danger">₱<?php echo $order_list["product_price"]?></td>
												<td style="color:maroon">₱<?php echo $order_list["product_quantity"]*$order_list["product_price"]?></td>
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
									<th class="text-right tamount text-weight-bold" style="color:crimson">₱</th>
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