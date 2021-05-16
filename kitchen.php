
<?php
    include('includes/function.php');
    $myfunction=new functions;        
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TO-DO LIST</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link rel="stylesheet" href="style.css">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
<br>
<div class="container w-50 mb-5">
  <h1 class="text-center header p-5 text-white position-static">Personalized To Do List</h1>
</div>
<div class="container">
    <div class="container col-md-7 h-100">
      <div class="overflow-scroll">
          <?php 
          ?>
        <div class="container mb-4 p-4 glass-container">
        <div class="row ">
          <div class="col-md-1 p-3">
            <input type="checkbox" class="done" class="w-100">
          </div>
          <div class="col-md-10 rounded">
            <h2 class="text-white"><?php echo"hgfhfghfghfghfgh"?></h2>
            <hr>
            <span class="small">Task description:</span> <br>
            <em class="text-dark"><?php echo"hgfhfghfghfghfgh"?></em>
          </div>
        </div>
            <span class="row float-right pt-2 pl-2 pr-2 details">
              <p class="small text-white">Created at: <?php?>gfdgfgdfg</p>&nbsp; &nbsp;
              <a href="edit.php?editId=<?php echo"hgfhfghfghfghfgh"?>"><i class="fa fa-pencil text-warning" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Edit Task"></i></a> &nbsp;
              <a href="index.php?deleteId=<?php echo"hgfhfghfghfghfgh"?>"><i class="fa fa-trash text-danger" aria-hidden="true"  data-toggle="tooltip" data-placement="left" title="Delete Task"></i></a>
            </span>
        </div>
          <?php ?>
      </div>
    </div>
  <div class="circle1"></div>
  <div class="circle2"></div>
  <div class="circle3"></div>
  <div class="circle4"></div>
  <div class="circle5"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$('.done').on('change', function(){
  if (this.checked){
    $(this).parent().parent().css("text-decoration","line-through");
    $(this).parent().parent().css("color","red");
  }else{
    $(this).parent().parent().css("text-decoration","none");
    $(this).parent().parent().css("color","black");
  }
})

</script>

</body>
</html>