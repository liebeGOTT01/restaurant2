<?php 
	include('includes/db_conn.php');
   	session_start();
   	if (!isset($_SESSION['user_email']) && !isset($_SESSION['user_id'])) {
?>


<!DOCTYPE html>
<html>
<head>
	<title>Restaurant | login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
      	<form class="border shadow p-3 rounded" action="includes/check-login.php" method="post" style="width: 450px;">
      	    <h1 class="text-center p-3">LOGIN</h1>
      	    <?php if (isset($_GET['error'])) { ?>
      	    <div class="alert alert-danger" role="alert">
				<?=$_GET['error']?>
			</div>
			<?php } ?>
		  	<div class="mb-3">
				<label for="user_email" class="form-label">User email</label>
				<input type="text" class="form-control" name="user_email" id="user_email">
		  	</div>
		  	<div class="mb-3">
				<label for="user_password" class="form-label">user_password</label>
				<input type="user_password" name="user_password" class="form-control" id="user_password">
		  	</div>
			<div class="mb-1">
				<label class="form-label">Select User Type:</label>
			</div>
			<select class="form-select mb-3"name="role" aria-label="Default select example">
				<option selected value="waiter">Waiter</option>
				<option value="admin">Admin</option>
			</select>
			
			<button type="submit" class="btn btn-primary">LOGIN</button>
		</form>
      </div>

	  <script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
</script>	
</body>



</html>
<?php }else{
	header("Location: adminDash.php");
} ?>