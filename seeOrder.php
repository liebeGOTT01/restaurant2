<?php  
    include('includes/function.php');
    $myfunction=new functions; 
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


</head>
<body>
<div class="container">
	<a href="waiterTable.php">
        <button class="btn btn-primary float-right">Back To Table List</button>
    </a>
	<table class="table table-bordered bg-warning" id="list">
			<colgroup>
				<col width="5%">
				<col width="23%">
				<col width="10%">
				<col width="15%">
				<col width="15%">
				<col width="15%">
				<col width="17%">
			</colgroup>
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-right">Product</th>
					<th class="text-right">Qty</th>
					<th class="text-right">Price</th>
					<th class="text-right">Amount</th>
					<th class="text-right">Status</th>
					<th class="text-right"></th>
				</tr>
			</thead>
			<tbody id="tableBody">
				<?php
					$myfunction->showOrder();
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
	<button class="btn btn-primary btn-sm btn-block float-right " type="button" id="pay">Pay</button>

</div>
</body>
</html>