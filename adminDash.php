                <?php
                include('includes/adminHeader.php');
                include('includes/function.php');
                $myfunction=new functions; 

                ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 mt-5">Dashboard</h1>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class=" mb-4">
                            <div class="card border-left-primary shadow h-100 py-2 card1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Today Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <br>
                                            <h1 class="text-danger"><?php echo $myfunction->getDailySales();?></h1>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        

