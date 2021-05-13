<?php 
   session_start();
   include "includes/db_conn.php";
   if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    WAITER

    <div class="card" style="width: 5rem;">
		<img src="img/user-default.png" class="card-img-top" alt="admin image">
		<div class="card-body text-center">
			<h5 class="card-title">
			    <?=$_SESSION['user_email']?>
			</h5>
			<a href="logout.php" class="btn btn-dark">Logout</a>
		</div>
	</div>

</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>