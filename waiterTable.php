<?php 
    include('includes/waiterHeader.php'); 
    include('includes/function.php');
    $myfunction=new functions; 
?>

<style>
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

<div class="container">

    <?php
        $myfunction->getTable();
    ?>
</div>


<!-- <div class="container">
    <div class="row mt-5 ">
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">VACCANT</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 1</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">VACCANT</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 2</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">VACCANT</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 3</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">VACCANT</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 4</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 ">
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary  align-middle">
                <span class="text-white">VACCANT</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 5</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">VACCANT</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 6</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">OCCUPIED</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 7</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white text-center">OCCUPIED</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 8</div>
                </div>
                <div class="card-footer bg-primary">
                    <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white">RESERVED</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 9</div>
                </div>
                <div class="card-footer bg-primary">
                <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mr-4">
                <div class="card-header bg-primary">
                <span class="text-white">RESERVED</span>
                </div>
                <div class="position-relative">
                    <img class="img-fluid" src="img/table.png" alt="">
                    <div class="centered text-white h5">Table 10</div>
                </div>
                <div class="card-footer bg-primary">
                <a href="addOrder.php"><button type="button" class="btn btn-light w-100">Add Order</button></a>
                </div>
            </div>
        </div>
    </div>
</div> -->



<!-- Modal -->
<!-- <div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

