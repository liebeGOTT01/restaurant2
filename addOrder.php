<?php 
$tableNo=$_GET['id'];
// echo '<script>alert("'.$tableNo.'")</script>';
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
	$myfunction->addOrder();
	$myfunction->deleteOrderedProduct();
?>

<div class="container-fluid">
<!-- <form action="" method="Post"> -->
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">

					<h4 name="tableNo" id="tableNo"><?php echo $tableNo?></h4>

			</div>
			<div class="card-body">

					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-5">
								<label class="control-label">Customer</label>
                                <input type="text" id="customer" class="form-control" placeholder="Enter Customer Name">
							</div>
						</div>
						<hr>
						<div class="row mb-3">
								<div class="col-md-4">
									<label class="control-label">Product</label>
									<select name="productOrder" id="productSelect" class="form-control" required data-parsley-trigger="change">
									<option value="" >Select Product</option>
                                    <?php
										$myfunction->getProduct();
									?>
                                    </select>
								</div>
								<div class="col-md-2">
									<label class="control-label">Qty</label>
									<input name="qty" type="number" min="1" value="1"class="form-control text-right" step="any" id="qty" >
								</div>
								<div class="col-md-3">
									<label class="control-label">&nbsp</label>
									<button class="btn btn-block btn-sm btn-primary" type="submit" name="addOrder" id="add_order"><i class="fa fa-plus"></i>Add to List</button>
								</div>
						</div>

					</form>
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
										<th class="text-center">#</th>
										<th class="text-right">Product</th>
										<th class="text-right">Qty</th>
										<th class="text-right">Price</th>
										<th class="text-right">Amount</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody id="tableBody">
								<?php
									// $i = 1;
									// $connection =$myfunction->openConnection(); 
									// $statement=$connection->prepare("SELECT * FROM order_item_table");
									// $statement->execute();
									// $product_order = $statement->fetchAll();
									// foreach($product_order as $order){
								?>
								<script>
									$(document).ready(function(){
						$count=1;
						$('#add-order').click(()=>{
							$customer=$('#customer').val()
							console.log($customer)
							console.log("clicked")
																							
							$productName=$('#productSelect').val()
									
							console.log($price);
											
							$quantity=$('#qty').val();
							console.log($quantity)
							$('#tbody').append('<tr><td class="text-center id">'+$count+'</td><td class="text-right quantity">'+$productName+'</td><td class="text-right price">'+$quantity+'</td></tr>')
							$count++;	
						})
					})
								</script>	
									<!-- <tr>
										<td class="text-center id"><?php// echo $i++ ?>
									
									</td>
										<td class="text-right product">
											<?php //echo $order['product_name'] ?>
										</td>
										<td class="text-right quantity">
											<!-- <input type="number" min="1" value="1"class="form-control text-right" step="any" id="qty" value="<?php echo $order['product_quantity'] ?>"> -->
										<!-- </td>
										<td class="text-right price">
											<?php //echo "Php ".$order['product_price'] ?>
										</td>
										<td class="text-right amount">
											<?php //echo $order['product_quantity']*$order['product_price'] ?>
										</td>
										<td class="text-center">
											<form action="" method="POST">
												<button type="submit" name="deleteOrderedProduct">
													<input type="hidden" name="prod_id" value="<?php echo $order['order_item_id']?>">
													<i class="fa fa-trash text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Delete Product"></i>
												</button>
											</form>
										</td> -->
									</tr> -->
								<?php 
									//}
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
						</div>
						<div class="row">
							<button class="btn btn-primary btn-sm btn-block float-right " type="button" id="pay">Submit to Kitchen for Confirmation</button>
						</div>
					</div>
				
			</div>
		</div>
	</div>
</div>

<script>

</script>

