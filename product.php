<?php
include('includes/header.php'); 
include('includes/function.php');
$myfunction=new functions;           
?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Product Management</h1>
					<div class="col" align="right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter" name="add_product" id="add_product">
							<i class="fas fa-plus"></i>
						</button>
					</div>

					<!-- Modal to add new product-->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" name="product_name" id="product_name" class="form-control"/>
								</div>
								<div class="form-group">
									<label>Product Image</label>
									<input type="text" name="product_image" id="product_name" class="form-control"/>
								</div>
								<div class="form-group">
									<label>Category</label>
									<select name="category_name" class="form-control" required data-parsley-trigger="change">
										<option value="">Select Category</option>
										<?php
											foreach($category_result as $category){
												echo '<option value="'.$category["category_name"].'">'.$category["category_name"].'</option>';
											}
										?>
									</select>
								</div>
								
								<div class="form-group">
									<label>Product Price</label>
									<input type="text" name="product_price" id="product_price" class="form-control"/>
								</div>
							</div>
							<div class="modal-footer">
								<div class="row">
									<input type="submit" class="btn btn-primary" name="enterProduct" value="save">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
							</div>
						</div>
					</div>

					<div class="container">
						<?php 
							$connection = $myfunction->openConnection();
							$statement = $connection->prepare("SELECT * FROM product_table");
							$statement->execute();
							$product = $statement->fetchAll();
							$productCount = $statement->rowCount();
							foreach($product as $newProduct) {
						?>
							<div class="card" style="width: 18rem;">
								<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><?php echo $newProduct['product_name'] ?></h5>
									<p class="card-text">
										<?php echo $newProduct['product_name'] ?>
										<?php echo $newProduct['product_price'] ?>
									</p>
								</div>
								<div class="card-footer">
									<span class="row float-right pt-2 pl-2 pr-2 details">
										<input type="submit" class="btn btn-primary" name="prod_status" value="<?php echo $newProduct['product_status']?>">
										<a href="edit.php?editId=<?php echo""?>"><i class="fa fa-edit text-warning" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Edit Task"></i></a> &nbsp;
										<a href="index.php?deleteId=<?php echo ""?>"><i class="fa fa-trash text-danger" aria-hidden="true"  data-toggle="tooltip" data-placement="left" title="Delete Task"></i></a>
									</span>
								</div>
							</div>
						<?php 
						}
						?>
					</div>
				