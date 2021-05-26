<?php 
	include('includes/function.php');
	$myfunction=new functions; 
	//$myfunction->login();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Restaurant | login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
</head>
<body id="bg">
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
				<form class="login-div" method="post">
					<div class="logo mb-2"></div>
						<h1 class="text-center p-3 title">LOGIN</h1>
						<div class="fields">
							<div class="input-group mb-3 pr-4">
								<div class="input-group-prepend">
									<span for="user_email" class="form-label input-group-text" style="padding:0px 6px 0px 11px;border-top-left-radius:20px;border-bottom-left-radius:20px;">
										<i class="fa fa-user text-info" style="font-size:40px;"></i>
									</span>
								</div>
								<input type="email" class="form-control" name="user_email" id="user_email">
							</div>
							<div class="input-group mb-3 pr-4">
								<div class="input-group-prepend">
									<span for="user_password" class="form-label input-group-text" style="padding:0px 2px 0px 5px;border-top-left-radius:20px;border-bottom-left-radius:20px;">
										<i class="fa fa-key text-info" style="font-size:40px"></i>
									</span>
								</div>
									<input type="password" name="user_password" class="form-control" id="user_password">
							</div>
						</div>
						<div class="mb-1 pr-4">
							<label class="form-label">Select User Type:</label>
						</div>
						<select class="form-select mb-3" name="role" aria-label="Default select example">
							<option selected value="waiter">Waiter</option>
							<option value="admin">Admin</option>
						</select>
						<button type="submit" style="border-radius:20px;" class="btn btn-primary w-100" name="login">LOGIN</button>
	
				</form>
	
    </div>
</body>
</html>
<?php 
// }else{
// 	header("Location: adminDash.php");
// }
 ?>