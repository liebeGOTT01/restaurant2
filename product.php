<?php
include('includes/adminHeader.php'); 
include('includes/function.php');
$myfunction=new functions; 
$myfunction->addProduct();         
$myfunction->deleteProduct(); 
$myfunction->updateProduct();        
?>

<div class="container">
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
								<form action="" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label>Product Name</label>
											<input type="text" name="product_name" class="form-control"/>
										</div>
										<div class="form-group">
											<label>Product Image</label>
											<input type="text" name="product_image" class="form-control"/>
										</div>
										<div class="form-group">
											<label>Category</label>
											<select name="product_category" class="form-control" required data-parsley-trigger="change">
												<option value="">Select Category</option>
												<?php
													$myfunction->getCateg();
												?>
											</select>
										</div>
										<div class="form-group">
											<label>Product Price</label>
											<input type="text" name="product_price"class="form-control"/>
										</div>
									</div>
									<div class="modal-footer">
										<div class="row">
											<input type="submit" class="btn btn-primary" name="enterProduct" value="save">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end of Modal to add new product-->

					<!-- product list -->
						<?php 
							$connection = $myfunction->openConnection();
							$statement = $connection->prepare("SELECT * FROM product_table");
							$statement->execute();
							$product = $statement->fetchAll();
							$productCount = $statement->rowCount();
							foreach($product as $newProduct) {
						?>

                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
									<div class="card mt-5" style="width: 16rem;">
										<div class="card-body">
											<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
											<div class="card-body">
												<h5 class="card-title"><?php echo $newProduct['product_name'] ?></h5>
												<p class="card-text">
													<?php echo $newProduct['category_name'] ?>
													<?php echo $newProduct['product_price'] ?>
												</p>
											</div>
											<div class="card-footer">
												<span class="row float-right pt-2 pl-2 pr-2 details">
													<form action="" method="POST">
														<button  type="button"class="btn btn-info editBtn" data-toggle="modal" data-target="#editProd">Edit</button>
														<!-- <a><i class="fa fa-edit text-warning" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Edit Product" name="editProd"></i></a> &nbsp; -->
														<input type="hidden" name="prod_id" value="<?php echo $newProduct['product_id']?>">
														<!-- <a><i class="fa fa-trash text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Delete Product" name="deleteProd"></i></a> -->
														<button type="submit" class="btn btn-danger" name="deleteProd">Delete</button>
													</form>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>



							<!-- Modal to edit product -->
							<div class="modal fade editModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="editProd">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="post">
												<input type="hidden" name="prod_id" value="<?php echo $newProduct['product_id'] ?>">
												<div class="form-group input-group-lg">
													<label for="exampleInputEmail1">Product name</label>
													<input type="text" class="form-control" name="editProduct_name" aria-label="Large" value="<?php echo $newProduct['product_name'] ?>">
												</div>
												<div class="form-group">
													<label>Category</label>
													<select name="editProduct_category" class="form-control" required data-parsley-trigger="change">
														<option value="">Select Category</option>
														<?php
															$myfunction->getCateg();
														?>
													</select>
												</div>
												<div class="form-group input-group-lg">
													<label for="exampleInputEmail1">Product Image</label>
													<input type="text" class="form-control" name="editProduct_image" aria-label="Large" value="<?php echo $newProduct['product_image'] ?>">
												</div>
												<div class="form-group input-group-lg">
													<label for="exampleInputEmail1">Product Price</label>
													<input type="text" class="form-control" name="editProduct_price" aria-label="Large" value="<?php echo $newProduct['product_price'] ?>">
												</div>
												<div class="modal-footer">
													<button type="submit"  name="editProduct" class="btn btn-primary">Submit</button>
													<button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- End of Modal to edit product -->
						<?php 
						}
						?>
					</div>
					<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
				