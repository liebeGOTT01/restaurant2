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

<!-- <div class="card mr-4">
        <div class="card-header bg-primary">
          <span class="text-white text-center">Table number</span>
        </div>
        <div class="card-body ">
          <table class="table table-striped w-auto">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
          <button type="submit" class="btn btn-light w-100 bg-primary text-white">Confirm Order</button>
      </div> -->

	  <script>
					$(document).ready(function(){
					    $('#tableSelect').on('change',function(){
						 console.log($(this).val());
						 $('#tableno').val($(this).val());
						 
						})
						$count=1;
						// $('.add-order').click(function(){	

						// 	$productName=$(this).parent().prev().children('.prod_name').html()
						// 	console.log("clicked")
						// 	$quantity=$('.qty').val();
						// 	$price= $(this).parent().prev().children('.card-text').children('.prod_price').html()
							
						// 	console.log($productName);
						// 	console.log($price);
						// 	$('#tbody').append('<tr class="tableRow">'+
						// 		'<td>'+$count+'</td>'+
						// 		'<td name="menu">'+$productName+'</td>'+
						// 		'<td>'+'<input type="number" min="1" value="1" class="w-100 quantity">'+'</td>'+
						// 		'<td name="price" class="price">'+$price+'</td>'+
						// 		'<td class="amount">'+'</td>'+
						// 		'<td>'+'<button type="submit" class="btn btn-danger text-white btn-circle delete">'+'X'+'</button>'+'</td>'+
						// 	'</tr>');
						// 	$count++;	
							
						// 	$('.quantity').click(function(){
						// 		$quantity=$('.quantity').val()
						// 		console.log($('.quantity').val())
						// 		$('.quantity').keyup(function(){
						// 			$quantity=$(this).val()
						// 			console.log($quantity)
						// 			$(this).parent().siblings('.amount').html($quantity*$(this).parent().siblings('.price').html())
						// 		})
						// 		$quantity=$(this).val()
						// 		$(this).parent().siblings('.amount').html($quantity*$(this).parent().siblings('.price').html())
						// 	})

						// 	$(".delete").click(function() {
						// 		$(this).parent().parent('.tableRow').remove();
						// 	});
					
						// })
						$('#tableSelect').change(function(){
							$('.panel-body').html($('#tableSelect').val())
						})
					})
				</script>	
				
 <a href="deleteOrder.php?idP=<?php echo $order_list['order_item_id']?>">
                        <button type="button" name="deleteOrderedProduct" class="btn btn-danger text-white btn-circle">X</button>
                    </a>