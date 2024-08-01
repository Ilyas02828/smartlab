<?php
include 'includes/connect.php';

?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
@media print {

  #mainDD
  { width: 100%;display: flex;}
  #div1{width: 400px; }
 @page {margin-bottom: 0;}
#div2{  width: 400px; }
  #div3{ width: 400px;}
  .btn-section{  display: none;}
  .dataTables_length{display: none;}
  #sample_1_filter{ display: none;}
  #sample_1_info {  display: none;}
  #sample_1_paginate{display: none;}
}
</style>
<?php include 'includes/head.php' ?>

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
</head>

<body class="skin-default">
<!-- <div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div> -->
<!-- header logo: style can be found in header-->
<?php include 'includes/header.php' ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
<?php include 'includes/menu.php' ?>

<aside class="right-side">
<section class="content">
<div class="box-header with-border">
<h2 style="text-align: center;" class="font-weight-bold mb-1"><b> <i>SALE DUES</i></b></h2><br>
</div>
<div class="panel" style="margin-left:3%">
  <div class="panel-heading">
      <h3 class="panel-title">
          <i class="fa fa-fw ti-credit-card"></i> Report
      </h3>
      <span class="pull-right">
          <i class="fa fa-fw ti-angle-up clickable"></i>
          <i class="fa fa-fw ti-close removepanel clickable"></i>
      </span>
  </div>
  <div id="printablediv"  class="panel-body">
      <div id="mainDiv"  class="row">

          <div class="col-lg-12">
              <div class="panel ">
                  
                  <div class="panel-body">
                      <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover" id="sample_1">
                              <thead>
                              <tr>
                                  <th><strong>#</strong></th>
                                  <th><strong>Patient Name</strong></th>
                                  <th ><strong>Total Amount</strong></th>
                                  <th><strong>Paid Amount</strong></th>
                                  <th ><strong>Due Amount </strong></th>
                                  <th ><strong>Date</strong>
                                  </th><th>Action</th>
                              </tr>
                              </thead>
                              <tbody id="display">
                                <?php
                                $value=0;
                                  $serial = 0;

                                  $fetch =  "SELECT * FROM  stock_sales WHERE due_amount>'$value' ";
                                    $run_name = mysqli_query($connection,$fetch);
                                    while($row=mysqli_fetch_array($run_name))
                                    {
                                      $serial++;
                                       $id = $row['id'];
                                       $supp = $row['customer'];
                                       $total = $row['grand_total_amount'];
                                       $paid = $row['paid_amount'];
                                      $due = $row['due_amount'];
                                      $date = $row['created_date'];
 ?>
                                    <tr>
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $supp; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $paid; ?></td>
                                        <td><?php echo $due; ?></td>
                                        <td><?php echo $date; ?></td>
                                         <td class="text-center">
                                          <div class="btn-group">
                                            <a href="update_sale_amount.php?gid=<?php echo $row['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                              <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                          
                                          </div>
                                        </td>
                                    </tr>
                                  <?php }   ?> 
                              </tbody>
                          </table> 
                      </div>
                  </div>
              </div>
          </div>

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
  

<?php include 'includes/right-menu.php' ?>
    <!-- /.right-side -->
</div>
<script src="js/app.js" type="text/javascript"></script>
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/custom_js/datatables_custom.js"></script>
</body>
</html>
<script type="text/javascript">
document.onkeyup = function(e) {
if (e.which == 27) {
window.location.href = "index.php";
}
};
</script>
<?php
if (isset($_GET['id'])) {
    $id=$_GET['id'];
$que2="DELETE FROM `purchase_amount` WHERE id='$id'";
$res2=mysqli_query($connection,$que2);
}?>