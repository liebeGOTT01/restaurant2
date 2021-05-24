
<?php
    include('includes/function.php');
    $myfunction=new functions;  
    $myfunction->confirmOrder();  
    $myfunction->rejectOrder();    
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
    <style>
      .card-horizontal {
          display: flex;
          flex: 1 1 auto;
      }
      .sm-padding {
        box-sizing: content-box !important;
      }

      .nopadding {
        padding:0 !important;
      }
    </style>
</head>

<body>
  <div class="container align-items-center">
    <h1 class="text-center">KITCHEN ORDER CONFIRMATION</h1>
    <div class="row">
    <?php 
      $connection = $myfunction->openConnection();
      $statement = $connection->prepare("SELECT * FROM order_item_table where order_status='pending'");
      $statement->execute();
      $order = $statement->fetchAll();
      $orderCount = $statement->rowCount();
      foreach($order as $newOrder) {
    ?>
   
        <div class="card mb-4 nopadding col-5 mr-2" style="width: 30rem;">
          <div class="card-horizontal">
            <div class="img-square-wrapper nopadding col-4">
                <form method="POST">
                  <input type="hidden" name="productName" value="<?php echo $newOrder['product_name']?>" >
                </form>
								<?php
                  $menu = $newOrder['product_name'];
                  echo '<script> alert('.$menu.')</script>';
									$connection =$myfunction->openConnection();
									$getImg=$connection->prepare("SELECT * FROM product_table WHERE product_name='$menu'");
									$getImg->execute();
									$prod_img=$getImg->fetchAll();
                  $imgCount = $statement->rowCount();
                  foreach($prod_img as $img) {
								?>
              <img class="w-100 h-100 rounded-left" src="<?php echo $img['product_image']?>" alt="Card image cap">
                <?php }?>
            </div>
            <div class="card-body col-7 sm-padding">
              <h4 class="card-title"><?php echo $newOrder['table_name'] ?></h4>
              <span><?php echo $newOrder['product_name'] ?></span> <br>
              <span><?php echo $newOrder['product_quantity'] ?></span>
              <br><br>
              <form  method="POST">
                <button type="submit" name="confirmOrder" class="btn btn-primary text-white position-right">Confirm Order
                  <input type="hidden" name="confirm_id" value="<?php echo $newOrder['order_item_id']?>">
                </button>
                <button type="submit" name="rejectOrder" class="btn btn-danger text-white position-right">Reject Order
                  <input type="hidden" name="reject_id" value="<?php echo $newOrder['order_item_id']?>">
                </button>
              </form>
            </div>
          </div>
        </div>
    <?php }?>
    </div>
  </div>
</body>
</html>