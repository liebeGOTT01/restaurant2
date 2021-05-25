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
    <h1 class="h3 mb-4 text-gray-800 mt-5">Customer Table</h1>
        <div class="row">
            <?php
                $myfunction->getTable();
            ?>
        </div>
</div>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
