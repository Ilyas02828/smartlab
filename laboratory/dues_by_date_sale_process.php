<?php
include 'includes/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  
<?php

 include 'includes/head.php' ?>

</head>
<style type="text/css">
@media print {

  #mainDD
  {
    width: 100%;
    display: flex;


  }
  #div1
  {
    width: 400px;
    
  }

 @page {

  margin-bottom: 0;
  }

  #div2
  {
    width: 400px;
    
    

  }
  #div3
  {
    width: 400px;
    

  }
  
  .btn-section
  {
    display: none;
  }
  .dataTables_length
  {
    display: none;
  }
  #sample_1_filter
  {
    display: none;
  }
  #sample_1_info
  {
    display: none;
  }
  #sample_1_paginate
  {
    display: none;
  }
}
</style>

<script language="javascript" type="text/javascript">
function printDiv(divID) {
  var divElements = document.getElementById(divID).innerHTML;
  var oldPage = document.body.innerHTML;
  document.body.innerHTML = 
    "<html><head><title></title></head><body><table> " + 
    divElements + "</table> </body>";
  window.print();
  document.body.innerHTML = oldPage;
}
</script>

<body class="skin-default">
<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<?php include 'includes/header.php' ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
<?php include 'includes/menu.php' ?>

<aside class="right-side">
    <section class="content p-l-r-15" id="invoice-stmt">
<div class="box-header with-border">
<h2 style="text-align: center;" class="font-weight-bold mb-1"><b> <i>SALE DUES REPORT BY DATE</i></b></h2><br>
</div>


<div>

     <div class="panel" style="margin-left:3%">
          <div class="panel-heading">
              <h3 class="panel-title">
                  <i class="fa fa-fw ti-credit-card"></i> Rport
              </h3>
              <span class="pull-right">
                  <i class="fa fa-fw ti-angle-up clickable"></i>
                  <i class="fa fa-fw ti-close removepanel clickable"></i>
              </span>
          </div>
          <div id="printablediv"  class="panel-body">
              <div id="mainDiv"  class="row">

                <?php
                if(isset($_POST['submit1']))
                {
                  $customer=$_POST['customer'];
                  $date1 = $_POST['date1'];
                  $date2 = $_POST['date2'];
                 
                ?>


                 <div class="col-md-2">
                    <img id="div1" src="img/ZARAK-logo.png" width="200px" height="160px" alt="clear"/>
                  </div>

                  <div class="col-md-1"></div>
                  <div id="div2" class="col-md-4 " style=" text-align: center;margin-top: 45px" >
                    <h4>Dr. Asma Arif <br> (Gynecologist, Obstetrician)</h4>
                    <h6>Noushera, Main GT Road, NLC Camp, Peshawar, Khyber Pakhtunkhwa</h6>
                  </div>

                  <div class="col-md-2"></div>

                  <div id="div3"  class="col-md-3 " style="margin-top: 45px">
                    <h5><strong>Customer Report <br>( Report Date: )</strong></h5>
                    <h4><strong> 
                      <?php
                      $date =  date('d-M-Y');
                      echo $date; 
                      ?>
                    </strong></h4>
                    <br>
                  </div>



                  

                </div>

                  <div  class="col-md-12">
                    <div class="panel ">
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="sample_1">
                              <thead>
                                <tr>
                                <th><strong>#</strong></th>
                                <th><strong>Customer</strong></th>
                                <th><strong>Grand Amount </strong></th>
                                <th><strong>Total Paid</strong></th>
                                <th><strong>Paid</strong></th>
                                <th><strong>Due</strong></th>
                                <th><strong>Date</strong></th>                                  
                                </tr>
                              </thead>
                              
                              <tbody>
                                <?php
                                  
                                $serial =0 ; 

$select_date = "
SELECT  sales_due_history.customer,sales_due_history.grand,sales_due_history.paid_total,sales_due_history.paid_new,
sales_due_history.due, sales_due_history.created_date
FROM sales_due_history
WHERE sales_due_history.created_date BETWEEN '$date1' AND '$date2' AND  sales_due_history.customer  ='$customer' ";
  $run_select = mysqli_query($connection,$select_date);
                                  while($row=mysqli_fetch_array($run_select))
                                  {
                                    $customer = $row['customer'];
                                    $Grand = $row['grand'];
                                    $paidtotal = $row['paid_total'];
                                    $paid = $row['paid_new'];
                                    $due = $row['due'];
                                    $date = $row['created_date'];
                                    $serial++;
                                   ?>
                                <tr>
                                  <td><?php echo $customer ; ?></td>
                                  <td><?php echo $supplier ; ?></td>
                                  <td><?php echo $Grand ; ?></td>
                                  <td><?php echo $paidtotal ; ?></td>
                                  <td><?php echo $paid ; ?></td>
                                  <td><?php echo $due ; ?></td>
                                  <td><?php echo $date ; ?></td>
                                </tr>

                              <?php } ?>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>

   <?php } ?>               
                  <div class="col-md-12">
                      <h4><Strong>Terms and conditions:</Strong></h4>
                      <ul class="terms_conditions">
                        <li>All goods returned for replacement/credit must be saleable condition with original packaging.
                        </li>
                      </ul>
                  </div>
              </div>

              <div class="btn-section">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <span class="pull-right">            
                      <button style="display: block" id="button1" onclick="javascript:printDiv('printablediv')" type="button" class="btn btn-responsive button-alignment btn-primary"
                               data-toggle="button">
                      <span style="color:#fff;" >
                        <i class="fa fa-fw ti-printer"></i> Print  
                      </span>
                      </button>
                    </span>
                  </div>
              </div>
          </div>
      </div>
</div>      
<?php include 'includes/right-menu.php' ?>
</div>
<script src="js/app.js" type="text/javascript"></script>
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/custom_js/datatables_custom.js"></script>
</body>
</html>
<script type="text/javascript">
document.onkeyup = function(e) {
if (e.which == 8) {
window.location.href = "sales_report.php";
}
};
</script>
