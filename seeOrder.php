<?php  
    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->cancelOrder();
	$myfunction->deliverOrder();
	
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
<body>
<div class="container">
	<a href="waiterTable.php">
        <button class="btn float-right mt-4 mb-3 glass-button">Back To Table List</button>
    </a>
	<table class="table table-bordered" id="list">
			<colgroup>
				<col width="5%">
				<col width="23%">
				<col width="10%">
				<col width="15%">
				<col width="15%">
				<col width="15%">
				<col width="17%">
			</colgroup>
			<thead style="font-size:1.2rem;">
				<tr>
					<th class="text-center">#</th>
					<th class="text-right">Product</th>
					<th class="text-right">Qty</th>
					<th class="text-right">Price</th>
					<th class="text-right">Amount</th>
					<th class="text-right">Status</th>
					<th class="text-right"></th>
				</tr>
			</thead>
			<tbody id="tableBody">
				<?php
					$connection =$myfunction->openConnection(); 
					$statement=$connection->prepare("SELECT * FROM order_item_table ORDER BY table_name");
					$statement->execute();
					$order = $statement->fetchAll();
					$i = 1;
					foreach($order as $order_list){
						$orderStatus = $order_list["order_status"];
				?>
					<tr class="text-right text-uppercase" style="font-size:0.95rem;">
						<td> <?php echo $i++ ?></td>
						<td><?php echo $order_list["product_name"] ?></td>
						<td><?php echo $order_list["product_quantity"] ?></td>
						<td><b>₱</b><?php echo $order_list["product_price"] ?></td>
						<td class="totalAmount"><b>₱</b><?php echo $order_list["amount"]?></td>
						<td ><?php echo $order_list["order_status"] ?></td>
						<td class="action">
						<form class="form1" action="" method="POST">
							<div class="row">
							<?php
								if($orderStatus=='pending'||$orderStatus=='rejected'){
							?>
								<button type="submit" name="deliverOrder" class="btn btn-success mr-3 ml-2 text-white deliver" disabled> Deliver
									<input type="hidden" name="deliver_id" value="<?php echo $order_list["order_item_id"]?>">
								</button>
							<?php 
							}else{
							?>
								<button type="submit" name="deliverOrder" class="btn btn-success mr-3 ml-2 text-white deliver"> Deliver
									<input type="hidden" name="deliver_id" value="<?php echo $order_list["order_item_id"]?>">
								</button>
							<?php
							}
							?>
								<button type="submit" name="cancelOrder" class="btn btn-danger text-white"> Cancel
									<input type="hidden" name="cancel_id" value="<?php echo $order_list["order_item_id"]?>">
								</button>
							</div>
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
					<th class="text-right tamount"><?php $myfunction->getTotal(); ?></th>
					<th></th>
				</tr>
			</tfoot>
	</table>
	<button class="btn btn-primary btn-m btn-block float-right mb-4" type="button" id="pay">Pay</button>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$(document).ready(function(){
		
	})
</script>
</body>
</html>