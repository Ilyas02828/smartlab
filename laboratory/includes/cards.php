  <style type="text/css">
      h5{
        font-family:fangsong !important;
      }
  </style>

                <!-- Row -->
<?php include 'includes/connect.php'; ?>

                <div class="row" style="font-family:fangsong !important">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-success"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                              <?php
                                              $today=date('Y-m-d');
                        $product = "SELECT * FROM patient WHERE created_at='$today'";
                        $run_pro = mysqli_query($connection,$product);
                        
                        $pro_total =  mysqli_num_rows($run_pro);
                        echo $pro_total;
                        ?>
                                        </h3>
                                        <h5 class="text-muted m-b-0">Today Patient</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            <?php
                                           
                        $product = "SELECT * FROM patient";
                        $run_pro = mysqli_query($connection,$product);
                        
                        $pro_total =  mysqli_num_rows($run_pro);
                        echo $pro_total;
                        ?>
                                        </h3>
                                        <h5 class="text-muted m-b-0">All Patient</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                             <?php
                                   $date = date('Y-m-d');  
                               $Grand = "SELECT sum(paid) AS pur_payment 
                                         FROM `patient_payment`
                                         where created_at = '$date' OR  updated_at = '$date'";
                        $run_sales = mysqli_query($connection,$Grand);
                        while($row=mysqli_fetch_array($run_sales))
                        {  
                           echo $total = $row['pur_payment'];
                        }?>
                                        </h3>
                                        <h5 class="text-muted m-b-0">Today total Paid</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            
                                             <?php
                                $date = date('Y-m-d');  
                              $Grand = "SELECT sum(dues) AS pur_payment 
                                         FROM `patient_payment`
                                         where created_at = '$date' OR  updated_at = '$date'";
                        $run_sales = mysqli_query($connection,$Grand);
                        while($row=mysqli_fetch_array($run_sales))
                        {  
                           echo $total = $row['pur_payment'];
                        }?>
                                        </h3>
                                        <h5 class="text-muted m-b-0">Today Dues</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>










                  <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            
   <?php
   $Monthx='';
         $date = date('Y-m-d');  
            $Grand = "SELECT
            sum(paid) AS total,
            DATE_FORMAT(created_at, '%M %Y') AS MONTH
            FROM patient_payment
            GROUP BY DATE_FORMAT(created_at, '%M %Y')";

                        $run_sales = mysqli_query($connection,$Grand);
                        $pro_total =  mysqli_num_rows($run_pro);

                         while($row=mysqli_fetch_array($run_sales))
                        {
                            $total = $row['total'];
                            $Monthx = $row['MONTH'];
                        }
                        if ($pro_total>0) {
                            echo $Monthx.' ('.$total.')';
                        }
                           ?> 
                                        </h3>
                                        <h5 class="text-muted m-b-0">Monthly Paid</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            
 <?php
    $Monthy='';
         $date = date('Y-m-d');  
            $Grand = "SELECT
            sum(dues) AS total,
            DATE_FORMAT(created_at, '%M %Y') AS MONTH
            FROM patient_payment
            GROUP BY DATE_FORMAT(created_at, '%M %Y')";

                        $run_sales = mysqli_query($connection,$Grand);
                        $pro_total =  mysqli_num_rows($run_sales);

                         while($row=mysqli_fetch_array($run_sales))
                        {
                            $total = $row['total'];
                            $Monthy = $row['MONTH'];
                        }
                           if ($pro_total>0) {
                            echo $Monthy.' ('.$total.')';
                        }
                           ?> 
                                        </h3>
                                        <h5 class="text-muted m-b-0">Monthly Dues</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            
<?php
    $Monthz='';
         $date = date('Y-m-d');  
            $Grand = "SELECT
            sum(expance) AS total,
            DATE_FORMAT(created_at, '%M %Y') AS MONTH
            FROM expances
            GROUP BY DATE_FORMAT(created_at, '%M %Y')";

                        $run_sales = mysqli_query($connection,$Grand);
                        $pro_total =  mysqli_num_rows($run_sales);

                         while($row=mysqli_fetch_array($run_sales))
                        {
                            $total = $row['total'];
                            $Monthz = $row['MONTH'];
                        }
                          if ($pro_total>0) {
                            echo $Monthz.' ('.$total.')';
                        }
                           ?> 
                                        </h3>
                                        <h5 class="text-muted m-b-0">Monthly Expance</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            
                                          <?php
                                $date = date('Y-m-d');  
                              $Grand = "SELECT sum(expance) AS pur_payment 
                                         FROM `expances`
                                         where created_at = '$date'";
                        $run_sales = mysqli_query($connection,$Grand);
                        while($row=mysqli_fetch_array($run_sales))
                        {  
                           echo $total = $row['pur_payment'];
                        }?>  
                                        </h3>
                                        <h5 class="text-muted m-b-0">Today Expance</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>



<img src="../assets/images/bh.jpg" style="width: 100%; height:100% !important">
<!--<img src="../assets/images/bh.jpg" style="width: 100%; height: 315px !important">-->