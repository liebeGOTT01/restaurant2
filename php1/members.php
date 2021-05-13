<?php  
if (isset($_SESSION['user_email']) && isset($_SESSION['user_id'])) {
    $sql = "SELECT * FROM user_table ORDER BY user_id ASC";
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: index.php");
} 