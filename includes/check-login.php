<?php  
session_start();
include "db_conn.php";
if (isset($_POST['user_email']) && isset($_POST['user_password']) && isset($_POST['role'])) {
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$user_email = test_input($_POST['user_email']);
	$user_password = test_input($_POST['user_password']);
	$role = test_input($_POST['role']);

	if (empty($user_email)) {
		header("Location: ../index.php?error=User Name is Required");
	}else if (empty($user_password)) {
		header("Location: ../index.php?error=user_password is Required");
	}else {

		// Hashing the user_password
		// $user_password = md5($password);
        
        $sql = "SELECT * FROM user_table WHERE user_email='$user_email' AND user_password='$user_password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['user_password'] === $user_password && $row['role'] == $role) {
        		$_SESSION['username'] = $row['username'];
        		$_SESSION['user_id'] = $row['user_id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['user_email'] = $row['user_email'];

				if ($_SESSION['role'] == 'admin'){
					header("Location: ../adminDash.php");
				}else {
					header("Location: ../waiter.php");
				}

        	}else {
        		header("Location: ../index.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location: ../index.php?error=Incorect User name or password");
        }
	}
	
}else {
	header("Location: ../index.php");
}

if (isset($_POST['user_email']) && isset($_POST['user_password']) && isset($_POST['role'])) {
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$role = $_POST['role'];

	if (empty($user_email)) {
		header("Location: ../index.php?error=User Name is Required");
	}else if (empty($user_password)) {
		header("Location: ../index.php?error=user_password is Required");
	}else {
		$connection = $this->openConnection();
		$statement = $connection->prepare("SELECT * FROM user_table WHERE user_email= $email AND user_password = $password");
		$statement->execute();
		$user = $statement->fetch();
		$total = $statement->rowCount();

        if ($total === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['user_password'] === $user_password && $row['role'] == $role) {
        		$_SESSION['user_name'] = $row['user_name'];
        		$_SESSION['user_id'] = $row['user_id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['user_email'] = $row['user_email'];

				if ($_SESSION['role'] == 'admin'){
					header("Location: ../adminDash.php");
				}else {
					header("Location: ../waiterDash.php");
				}

        	}else {
        		header("Location: ../index.php?error=Incorect User name or password");
        	}
        }else {
        	header("Location: ../index.php?error=Incorect User name or password");
        }
	}
	
}else {
	header("Location: ../index.php");
}




        // if(isset($_POST['login'])){
        //     $email = $_POST['user_email'];
        //     $password = $_POST['user_password'];
        //     $role = $_POST['role'];
        //     $connection = $this->openConnection();
        //     $statement = $connection->prepare("SELECT * FROM user_table WHERE user_email= $email AND user_password = $password");
        //     $statement->execute();
        //     $user = $statement->fetch();
        //     $total = $statement->rowCount();
        //     unset($_SESSION['errorMsg']);

        //     if($role['role'] == 'admin'){
        //         header("Location: ../adminDash.php");
        //     }else if($role['role'] == 'waiter'){
        //         header("Location: ../waiter.php");
        //     }else{
        //         $_SESSION['errorMsg']="* username or password is invalid";
        //     }  
        // }