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
	<div class="background-container">
		<h1 class="h3 mb-4 text-gray-800 mt-5">Product Management</h1>
		<div class="col" align="right">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter"
				name="add_product" id="add_product">
				<i class="fas fa-plus"></i>
			</button>
		</div>
	</div>

	<!-- Modal to add new product-->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="POST">
					<div class="modal-body">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Product Name</label>
										<input type="text" name="product_name" class="form-control" />
									</div>
									<div class="form-group">
										<label>Product Image</label>
										<input type="text" name="product_image" class="form-control" />
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Category</label>
										<select name="product_category" class="form-control" required
											data-parsley-trigger="change">
											<option value="">Select Category</option>
											<?php
																$myfunction->getCateg();
															?>
										</select>
									</div>
									<div class="form-group">
										<label>Product Price</label>
										<input type="text" name="product_price" class="form-control" />
									</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<input type="submit" class="btn btn-primary mr-2" name="enterProduct" value="Save">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end of Modal to add new product-->

	<!-- product list -->
	<div class="container">
			<div class="row">
				<?php 
					$connection = $myfunction->openConnection();
					$statement = $connection->prepare("SELECT * FROM product_table");
					$statement->execute();
					$product = $statement->fetchAll();
					$productCount = $statement->rowCount();
					foreach($product as $newProduct) {
				?>
				<div class="background-container">

				<div class="card mb-4 mr-5 border border-transparent h-200" style="width:16rem;">
					<div class="con1">
						<img class="card-img-top" src="<?php echo $newProduct['product_image'] ?>"
							style="height:10rem;">
						<div class="middle">
							<div class="texts">
								<div class="category-card1 d-flex justify-content-center">
									<span class="row pt-2 pl-2 pr-2 details">
										<form action="" method="POST">
											<button type="button" class="btn btn-info editBtn"
												data-toggle="modal" data-target="#editProd">Edit</button>
											<input type="hidden" name="prod_id"
												value="<?php echo $newProduct['product_id']?>">
											<button type="submit" class="btn btn-danger"
												name="deleteProd">Delete</button>
										</form>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<h5 class="card-title text-uppercase font-weight-bold"
									style="font-size:0.95rem;">
									<?php echo $newProduct['product_name'] ?>
								</h5>
								<input type="hidden" name="menu"
									value="<?php echo $newProduct['product_name'] ?>">
							</div>
							<div class="col">
								<span class="prod_price float-right text-danger" name="price">
									₱
									<?php echo $newProduct['product_price'] ?>
									<input type="hidden" name="price"
										value="<?php echo $newProduct['product_price'] ?>">
								</span>
							</div>
						</div>
						<p class="card-text text-capitalize font-weight-bold" style="color:#1F45FC">
							<span class="">
								<?php echo $newProduct['category_name'] ?>
							</span>
							<!-- <div class="category-card1 d-flex justify-content-center">
									<span class="row pt-2 pl-2 pr-2 details">
										<form action="" method="POST">
											<button  type="button"class="btn btn-info editBtn" data-toggle="modal" data-target="#editProd">Edit</button>			
											<input type="hidden" name="prod_id" value="<?php echo $newProduct['product_id']?>">
											<button type="submit" class="btn btn-danger" name="deleteProd">Delete</button>
										</form>
									</span>
							</div> -->
						</p>
					</div>
				</div>
			</div>

				<!-- Modal to edit product -->
				<div class="modal fade editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
					aria-hidden="true" id="editProd">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title text-white" id="exampleModalLabel">Edit Category</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<form method="post">
									<div class="d-flex justify-content-center">
										<input
											class="rounded-pill text-center border border-info font-weight-bold"
											style="font-size:1.5rem:" type="text" name="eprod_id"
											value="<?php echo $newProduct['product_id'] ?>">
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group input-group-lg mt-1">
												<label for="exampleInputEmail1">Product name</label>
												<input type="text" class="form-control"
													name="editProduct_name" aria-label="Large"
													value="<?php echo $newProduct['product_name'] ?>">
											</div>
											<div class="form-group">
												<label>Category</label>
												<select name="editProduct_category" class="form-control"
													required data-parsley-trigger="change">
													<option value="">Select Category</option>
													<?php
																$myfunction->getCateg();
															?>
												</select>
											</div>
										</div>
										<div class="col">
											<div class="form-group input-group-lg">
												<label for="exampleInputEmail1">Product Image</label>
												<input type="text" class="form-control"
													name="editProduct_image" aria-label="Large"
													value="<?php echo $newProduct['product_image'] ?>">
											</div>
											<div class="form-group input-group-lg">
												<label for="exampleInputEmail1">Product Price</label>
												<input type="text" class="form-control"
													name="editProduct_price" aria-label="Large"
													value="<?php echo $newProduct['product_price'] ?>">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" name="editProduct"
											class="btn btn-primary">Submit</button>
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Cancel</button>
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
	</div>

	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
	<style>
		body.modal-open .background-container {
			-webkit-filter: blur(4px);
			-moz-filter: blur(4px);
			-o-filter: blur(4px);
			-ms-filter: blur(4px);
			filter: blur(4px);
			filter: url("https://gist.githubusercontent.com/amitabhaghosh197/b7865b409e835b5a43b5/raw/1a255b551091924971e7dee8935fd38a7fdf7311/blur".svg#blur);
			filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
			/* opacity: 5;
   filter: alpha(opacity=50);
   background-color: rgba(0, 0, 0, 0.5);
   transition: all 1s;
   -webkit-transition: all 1s; */
		}
	</style>