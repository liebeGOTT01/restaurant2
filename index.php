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
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
      	<form class="border shadow p-3 rounded" method="post" style="width: 450px;">
      	    <h1 class="text-center p-3">LOGIN</h1>
		  	<div class="mb-3">
				<label for="user_email" class="form-label">User email</label>
				<input type="email" class="form-control" name="user_email" id="user_email">
		  	</div>
		  	<div class="mb-3">
				<label for="user_password" class="form-label">user_password</label>
				<input type="password" name="user_password" class="form-control" id="user_password">
		  	</div>
			<div class="mb-1">
				<label class="form-label">Select User Type:</label>
			</div>
			<select class="form-select mb-3" name="role" aria-label="Default select example">
				<option selected value="waiter">Waiter</option>
				<option value="admin">Admin</option>
			</select>
			<button type="submit" class="btn btn-primary" name="login">LOGIN</button>
		</form>
    </div>
</body>
</html>
<?php 
// }else{
// 	header("Location: adminDash.php");
// }
 ?>