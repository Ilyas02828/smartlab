<?php
include 'includes/connect.php';
?>
<?php 
$dati=date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'includes/head.php'; ?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">

</head>

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
    <section class="content">
<div class="box-header with-border">
<h2 style="text-align: center;" class="font-weight-bold mb-1"><b> <i>SALE DUES REPORT</i></b></h2><br>
</div>
        <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6 col-sm-4">
                <div class="panel">
                  <div class="panel-heading">
                    <h3>Generate Dues by Choosing Date </h3>
                  </div>
                  <div class="panel-body">
                      <form class="clearfix" method="post" action="dues_by_date_sale_process.php">
                        <div class="form-group">
                          <div class="row">

                         <div class="col-md-12">
  <div class="form-group">
    
       <label><b>Chose Customer </b><span class="text-danger">*</span></label>
<select name="customer" id="select2" class="form-control select2 " required>
         <option value="">Choose</option>
          <optgroup >
              <?php
               $query4="SELECT DISTINCT (customer) 
              FROM sales_due_history";
               $db4=mysqli_query($connection,$query4);
               while ($row4=mysqli_fetch_array($db4)) {?>
                 <option value="<?php echo $row4['customer']; ?>"> <?php echo $row4['customer']; ?> </option>
               <?php } ?> 
          </optgroup> 
      </select>
  </div>
</div>
</div>

  
                            <div class="row">
                            <div class="col-md-5">
    <input name="date1" value="<?php echo $dati;?>"  type='date' class="form-control" />
                            </div>
                            <div class="col-md-1"  style='font-size: 20px;padding-right: 5px'>To</div>
                            
                            <div class="col-md-5">
    <input name="date2"  value="<?php echo $dati;?>" type='date' class="form-control" />
                              
                            </div>
                          </div> 
                        </div>
                        <div style="padding-left: 140px" class="form-group">
                             
                             <input type="submit"  id="save" name="submit1" class="btn btn-primary" value="Generate Report" >
                        </div>

                      </form>
                      
                </div>
            </div>
        </div>
</div>
<?php include 'includes/right-menu.php' ?>
</div>


<script src="js/app.js" type="text/javascript"></script>
<script src="vendors/select2/js/select2.js" type="text/javascript"></script>
<script src="js/autosearch/bootstrap3-typeahead.min.js"></script> 
<script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="js/custom_js/datatables_custom.js"></script>


<script type="text/javascript">
  $(document).ready(function(){

    $(".select2").select2({
            theme: "bootstrap",
            placeholder: "Select"
        });
});


</script>
</body>
</html>
<script type="text/javascript">
document.onkeyup = function(e) {
if (e.which == 13) {
  document.getElementById("save").click();
}
if (e.which == 27) {
window.location.href = "index.php";
}
};
</script>
