<?php

include('includes/adminHeader.php');
include('includes/function.php');
$myfunction=new functions;
$myfunction->addCat();
$myfunction->updateCat();
$myfunction->deleteCat();

?>


<!-- <div class="card" id="card"> -->
<div class="background-container">
<h1 class="h3 mb-4 text-gray-800 mt-5">Restaurant Category </h1>
<div class="card-body">
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col-md-4">
                <form method="POST" id="manage-category">
                    <div class="card card1">
                        <div class="card-header text-xs font-weight-bold text-primary text-uppercase">
                            Menu Form
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label class="control-label text-uppercase font-weight-bold">Category</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="category-card">
                                <button type="submit" style="font-size:25px;" class="btn fa fa-hand-o-up text-white"
                                    name="enterCat" value="save"></button>
                                <i style="font-size:25px;" class="btn fa fa-times text-danger" type="button"
                                    onclick="$('#manage-category').get(0).reset()"></i>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <!-- end of FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-xs font-weight-bold text-primary text-uppercase">
                        Menu Category
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover table-striped" id="table-catmenu">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
											$i = 1;
											$connection =$myfunction->openConnection(); 
											$statement=$connection->prepare("SELECT * FROM category_table order by name asc");
											$statement->execute();
											$categories = $statement->fetchAll();
											foreach($categories as $category) {
											

											<!-- modal for edit category -->
										
												<div class="modal fade editModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="editModal">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header bg-primary text-white">
																<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form method="post">
																<input type="hidden" name="ID" value="<?php echo $category['id'] ?>">
																<div class="form-group input-group-lg">
																	<label for="exampleInputEmail1">Category</label>
																	<input type="text" class="form-control" name="newCat" aria-label="Large" placeholder="<?php echo $category['name'] ?>">
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
																<button type="submit"  name="editCatBtn" class="btn btn-primary">Submit</button>
																</form>
															</div>
														</div>
													</div>
												</div>
										
											<!--end of modal for edit category -->
										<?php }?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- end of Table Panel -->
				</div>
			</div>	
		</div>
	<!-- </div> -->

										?>

                                <tr>

                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td class="text-capitalize">
                                        <?php echo $category['name'] ?>
                                    </td>
                                    <td class="text-center">
                                        <!-- actions -->
                                        <form method="post">
                                            <i type="button" style="font-size:25px;"
                                                class="btn editBtn fa fa-pencil-square-o" aria-hidden="true"
                                                ></i>
                                            <input type="hidden" class="id" name="id" value="<?php echo $category['id']?>">
                                            <button type="submit" style="font-size:25px;"
                                                class="btn fa fa-trash-o delBtn" name="deleteBtn"></button>
                                        </form>
                                    </td>
                                </tr>


                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end of Table Panel -->
        </div>
    </div>
</div>
	
</div>
<!-- </div> -->
<!-- modal for edit category -->
<div class="modal fade editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="id" name="ID" value="<?php echo $category['id']?>">
                    <div class="form-group input-group-lg">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" id="category" name="newCat" aria-label="Large" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="editCatBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--end of modal for edit category -->
<script>
	$(document).ready(function(){
		console.log("ready")
		$('.fa-pencil-square-o').click(function(){
			console.log("clicked")
			$('#editModal').modal('show');
			$('#category').attr('placeholder',$(this).parent().parent().siblings('.text-capitalize').html())
			$('#id').val($(this).siblings('.id').val())
		})
	})
</script>
<style>
td {
    vertical-align: middle !important;
}

body.modal-open .background-container{
    -webkit-filter: blur(4px);
    -moz-filter: blur(4px);
    -o-filter: blur(4px);
    -ms-filter: blur(4px);
    filter: blur(4px);
    filter: url("https://gist.githubusercontent.com/amitabhaghosh197/b7865b409e835b5a43b5/raw/1a255b551091924971e7dee8935fd38a7fdf7311/blur".svg#blur);
filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
/* opacity: 5;
   filter: alpha(opacity=50);
   background-color: rgba(0, 0, 0, 0.5);
   transition: all 1s;
   -webkit-transition: all 1s; */
}
</style>