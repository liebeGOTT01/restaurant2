                <?php
                include('includes/adminHeader.php');

                ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Today Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

<script>

$(document).ready(function(){

    reset_table_status();

    setInterval(function(){
        reset_table_status();
    }, 5000);

    function reset_table_status()
    {
        $.ajax({
            url:"order_action.php",
            method:"POST",
            data:{action:'dashboard_reset'},
            success:function(data){
                $('#table_status').html(data);
            }
        });
    }

});

</script>