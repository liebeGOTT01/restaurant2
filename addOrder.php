<?php 

    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->addOrder();
	$myfunction->deleteOrderedProduct();

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<style>
      .nopadding {
        padding:0 !important;
      }
	  .nomargin{
		margin-right:0 !important;
	  }

	.container-1{
		padding-left:6rem;
		padding-right:6rem;
	}
</style>
<body>
<div class="container-1">
	<div class="row mt-5 mb-4 ">
		<h1 class="h3 text-gray-800 ">Order Menu List</h1> <br><br>
		<a href="waiterTable.php" class="float-right">
			<button class="btn btn-primary" style="border-radius:20px;transform:translate(450%, 10%);">Back To Table List</button>
		</a>
	</div>
	<div class="row">
		<div class="col-6 scroll">
			<div class="row">
				<?php 
					$connection = $myfunction->openConnection();
					$statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
					$statement->execute();
					$product = $statement->fetchAll();
					$productCount = $statement->rowCount();
					foreach($product as $newProduct) {
				?>
				<div class="card col-5 m-3 mt-2 nopadding">
					<form  method="POST">
						<img class="card-img-top" style="height:10rem;" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text">
								<span class="prod_price" name="price">
									<div class="row">
										<div class="col-sm">
											<h5 style="font-size:0.95rem;color:#0A69F3;" class="card-title prod_name text-uppercase font-weight-bold" name="menu">
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
										<h7 class="text-capitalize font-weight-bold" style="color:#1F45FC"><?php echo $newProduct['category_name'] ?></h7>
								</span>
							</p>
							<div class="input-group">
								<div class="input-group-prepend">
									<!-- control-label -->
									<span class="input-group-text bg-info text-primary">Qty: </span>
								</div>
								<input name="qty" type="number" min="1" value="1" class="form-control text-right" step="any" id="qty" >
							</div>
							<button type="submit" class="btn add-order mt-3 glass-button " name="addOrder"><i class="material-icons" style="font-size:30px">playlist_add</i></button>
						</div>
					</form>
			
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-6 nopadding nomargin scroll">
			<form action="" method="POST">
				<div class="col">
					<div class="panel panel-default p-2">
						<h4><div class="panel-body p-2 text-white text-uppercase" name=""><?php echo $_GET['id']?></div></h4>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<table class="table table-bordered border-dark" id="list">
							<colgroup>
								<col width="3%">
								<col width="30%">
								<col width="10%">
								<col width="25%">
								<col width="25%">
								<col width="7%">
							</colgroup>
							<thead>
								<tr >
									<th class="text-dark text-right">#</th>
									<th class="text-dark text-right">Menu</th>
									<th class="text-dark text-right">Quantity</th>
									<th class="text-dark text-right">Price</th>
									<th class="text-dark text-right">Amount</th>
									<th class="text-dark text-right"></th>
								</tr>
							</thead>
							<tbody id="tbody">
								<?php
								    $table=$_GET['id'];
									$connection =$myfunction->openConnection(); 
									$statement=$connection->prepare("SELECT * FROM order_item_table WHERE table_name=?");
									$statement->execute([$table]);
									$order = $statement->fetchAll();
									$orderCount=$statement->rowCount();
									if($orderCount > 0){
									$i = 1;
										foreach($order as $order_list){
										?>
											<tr>
												<td class="text-warning"><?php echo $i++?></td>
												<td class="text-capitalize" style="color:#660033;"><?php echo $order_list["product_name"]?></td>
												<td class="text-right" style="color:white"><?php echo $order_list["product_quantity"]?></td>
												<td class="text-danger text-right">₱<?php echo $order_list["product_price"]?></td>
												<td class="text-right" style="color:maroon">₱<?php echo $order_list["product_quantity"]*$order_list["product_price"]?></td>
												<td>
													<button type="submit" name="deleteOrderedProduct" class="btn btn-danger text-white btn-circle">X
														<input type="hidden" name="p_id" value="<?php echo $order_list["order_item_id"]?>">
													</button>
												</td>
											</tr>
										<?php
										} 
									}else{
                                      echo '<center><p class="h2 text-center text-danger"> ------NO ORDER ADDED YET!------</p></center>';
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th class="text-right" style="color:#ffccff" colspan="4">Total</th>
									<th class="text-right tamount text-weight-bold" style="color:crimson">₱<?php $myfunction->getAddOrderTotal(); ?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
						<a href="waiterTable.php" class="w-100">
							<button type="button" class="btn btn-primary w-100">Confirm Order</button>
						</a>
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

<style>
.scroll {
    max-height: 500px;
    overflow-y: auto;
}

.card .add-order{
    position: absolute;
    top: -1%;
    left: 100%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    font-size: 16px;
    padding: 8px 10px;
    border: none;
    cursor: pointer;
    border-radius:30px;
    text-align: center;
}

.card .add-order:hover {
	color: white;
    	background-color: black;
}

  .card{
	  position:relative;
}
</style>
</body>
</html>