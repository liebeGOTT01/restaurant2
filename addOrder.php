<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Orders list for table --</h4>
			</div>
			<div class="card-body">
				<form action="" method="POST" id="manage-sales">
					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-5">
								<label class="control-label">Customer</label>
                                <input type="text" class="form-control" placeholder="Enter Customer Name">
							</div>
						</div>
						<hr>
						<div class="row mb-3">
								<div class="col-md-4">
									<label class="control-label">Product</label>
									<select name="productOrder" class="form-control" required data-parsley-trigger="change">
									<option value="">Select Product</option>
                                    <?php
										$myfunction->getProduct();
									?>
                                    </select>
								</div>
								<div class="col-md-2">
									<label class="control-label">Qty</label>
									<input name="qty" type="number" class="form-control text-right" step="any" id="qty" >
								</div>
								<div class="col-md-3">
									<label class="control-label">&nbsp</label>
									<button class="btn btn-block btn-sm btn-primary" type="button" name="add_order" id="add_order"><i class="fa fa-plus"></i>Add to List</button>
								</div>
						</div>
						<div class="row">
							<table class="table table-bordered" id="list">
								<colgroup>
									<col width="40%">
									<col width="20%">
									<col width="30%">
									<col width="10%">
								</colgroup>
								<thead>
									<tr>
										<th class="text-center">Product</th>
										<th class="text-center">Qty</th>
										<th class="text-center">Price</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody id="table_body">
                                    <?php
                                        $myfunction->addOrder()
                                    ?>
								</tbody>
							</table>
						</div>
						<div class="row">
							<button class="btn btn-primary btn-sm btn-block float-right " type="button" id="pay">Submit to Kitchen for Confirmation</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

