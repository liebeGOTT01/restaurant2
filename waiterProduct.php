<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
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
		<div class="card mb-4" style="width:10rem;">
			<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
			<div class="card-body ">
				<h5 class="card-title prod_name" ><?php echo $newProduct['product_name'] ?></h5>
				<p class="card-text">
					<span>
						<?php echo $newProduct['category_name'] ?>
					</span>
					<span class="prod_price">
						<?php echo $newProduct['product_price'] ?>
					</span>
				</p>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success add-order" >Add Order</button>
			</div>
        </div>
    <?php
        }
    ?>
    </div>
	<div class="col-6">
	<form action="" method="POST">
		<div class="col">
			<label class="control-label">List of Tables</label>
			<select name="tableOrder" id="tableSelect" class="form-control" required data-parsley-trigger="change">
				<option value="" >Select Table</option>
				<?php
					$myfunction->getTableName();
				?>
            </select>
		</div>
		<br>
		<br>
		<div class="col">
			<div class="panel panel-default p-2">
				<div class="panel-body">table name goes here..</div>
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
				<script>
					$(document).ready(function(){
						$count=1;
						$('.add-order').click(function(){	

							$productName=$(this).parent().prev().children('.prod_name').html()
							console.log("clicked")
							$quantity=$('.qty').val();
							$price= $(this).parent().prev().children('.card-text').children('.prod_price').html()
							
							console.log($productName);
							console.log($price);
							$('#tbody').append('<tr class="tableRow">'+
								'<td>'+$count+'</td>'+
								'<td>'+$productName+'</td>'+
								'<td>'+'<input type="number" min="1" value="1" class="w-100 quantity">'+'</td>'+
								'<td class="price">'+$price+'</td>'+
								'<td class="amount">'+'</td>'+
								'<td>'+'<button type="submit" class="btn btn-danger text-white btn-circle delete">'+'X'+'</button>'+'</td>'+
							'</tr>');
							$count++;	
							
							$('.quantity').click(function(){
								$quantity=$('.quantity').val()
								console.log($('.quantity').val())
								$('.quantity').keyup(function(){
									$quantity=$(this).val()
									console.log($quantity)
									$(this).parent().siblings('.amount').html($quantity*$(this).parent().siblings('.price').html())
								})
								$quantity=$(this).val()
								$(this).parent().siblings('.amount').html($quantity*$(this).parent().siblings('.price').html())
							})

							$(".delete").click(function() {
								$(this).parent().parent('.tableRow').remove();
							});
					
						})
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