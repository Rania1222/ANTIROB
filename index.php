<?php 

include('security.php'); //db connection
include('includes/header.php');  //searching
include('includes/navbar.php');  //layout
?>
        
        
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-lg-6 col-lg-6 ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL REGISTERED ACCOUNT</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php

                                            
                                            $query = "SELECT id FROM register ORDER BY id";  
                                            $query_run = mysqli_query($connection, $query);
                                            $row = mysqli_num_rows($query_run); //returns the numer of rows presentaby the result
                                              echo '<h3> Total : '.$row.'</h3>';

                                            ?>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-lg-6 col-lg-6 ">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" >
                                                `Camera`</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-info" href="http://127.0.0.1:5000/ " role="button" target="_blank">LIVE STREAM</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-camera fa-2x text-gray-300"></i> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="col-lg-6 col-lg-6 ">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-successtext-uppercase mb-1" >
                                                `Camera`</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><a class="btn btn-info" href="Chart1.html">MOTION DETECTION</a></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-camera fa-2x text-gray-300"></i> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        
                       
                        

            
                        
                 </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>