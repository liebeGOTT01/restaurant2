
<?php 
session_start();
if($_SESSION['user_email']==""){
    header("location:index.php");
}
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
    <link href="./css/style.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/parsley/parsley.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/bootstrap-select.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <section class="panel">
            <nav class="sticky-top">
                <!-- Sidebar -->
                <ul class="navbar-nav sidebar accordion" id="accordionSidebar">

                <!-- profile -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle justify-content-right" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="Log out">
                            <span class="" id="user_profile_name"><img src="./img/admin.jpg" class="img-profile rounded-circle"></span>  Admin 
                        </a>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                            </a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        </div>
                    </li>
                <!-- end profile -->

                <!-- Sidebar - Brand and logo -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminDash.php">
                        <div class="sidebar-brand-icon rotate-n-15"></div>
                            <i class="fas fa-laugh-wink"></i>
                        <div class="sidebar-brand-text mx-3">Fine Dine</div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" href="adminDash.php"><i class="fas fa-th-list"></i>
                            <span>Daily Sales</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php"><i class="fas fa-th-list"></i>
                            <span>Category</span>  <!--CATEGORY-->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.php">
                            <i class="fas fa-utensils"></i>
                            <span>Product</span>
                        </a>
                    </li>
                
                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0 glass-button" id="sidebarToggle"></button>
                    </div>

                </ul>
            </nav>
        </section>
            <div class="modal fade border border-warning" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-danger">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End of Sidebar -->

        <div class="container-fluid">
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/script.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
            <script type="text/javascript" src="vendor/parsley/dist/parsley.js"></script>
            <script type="text/javascript" src="vendor/bootstrap-select/bootstrap-select.min.js"></script>

<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>