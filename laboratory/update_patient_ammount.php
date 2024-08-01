<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">



<?php
if (isset($_GET['id'])) {
    $pid=$_GET['id'];
$que4="SELECT * FROM `patient_payment` WHERE id='$pid' ";
$res3=mysqli_query($connection,$que4);
while ($row=mysqli_fetch_array($res3)) {
       
        $p_id = $row['p_id'];
        $grand = $row['grand'];
        $discount=$row['discount'];
        $paid = $row['paid'];
        $dues = $row['dues'];
        $total = $row['total'];


        $select_name =  "SELECT * FROM  patient WHERE id='$p_id'";
        $go = mysqli_query($connection,$select_name);
        while($row1=mysqli_fetch_array($go)){
        $name = $row1['name'];
        $date = $row1['created_at']; 

} } }?>
    <!-- Main content -->
    

   



   
    
     
<div class="card-header bg-info">
<h4 class="mb-0 text-white">update ammount</h4>
</div>


          <form action="" method="post" >
          <div class="card-body">
   

<div class="row pt-3">


<div class="col-md-3"><div class="form-group">
    <label><b>Patient Name</b><span class="text-danger">*</span></label>
<input type="hidden" name="patient_id"  value="<?php echo $p_id  ;?>" readonly>

<input type="text"  class="form-control input-sm" name="title" id="title"  value="<?php echo $name  ;?>" readonly>
</div></div>

<div class="col-md-2"><div class="form-group">
    <label><b>Total Amount</b><span class="text-danger">*</span></label>
<input type="text"  class="form-control input-sm" name="total" id="total" value="<?php echo $total  ;?>" readonly>
</div>
</div>

<div class="col-md-2"><div class="form-group">
    <label><b>Last Paid Amount</b><span class="text-danger">*</span></label>
<input type="text" class="form-control input-sm" name="oldpaid" id="oldpaid" value="<?php echo $paid  ;?>" readonly >
</div></div>

  <div class="col-md-2"><div class="form-group">
  <label><b>Last Due Amount</b><span class="text-danger">*</span></label>
<input type="text" class="form-control input-sm" name="olddue" id="olddue"  value="<?php echo $dues  ;?>" readonly>
  </div></div>



<div class="col-md-3"><div class="form-group">
    <label><b>New Date</b><span class="text-danger">*</span></label>
<input type="text" class="form-control input-sm" name="date" id="date"  value="<?php echo $date  ;?>" readonly>
</div></div>

 </div>


<div class="row pt-3">


<div class="col-md-3"><div class="form-group">
    <label><b>Pay New </b><span class="text-danger">*</span></label>
<input type="text" class="form-control input-sm" name="paidnew" id="paidnew"  >
</div></div>

  <div class="col-md-3"><div class="form-group">
  <label><b> Due New </b><span class="text-danger">*</span></label>
<input type="text" class="form-control input-sm" name="duenew" id="duenew" readonly >
  </div></div>
</div>

<div class="form-actions" >
      <div class="card-footer">
<a href="dues_patient_report.php" class="btn btn-responsive button-alignment btn-primary" data-toggle="tooltip" title="" data-original-title="Back"><span style="color:#fff;">
           <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>

<button  type="submit" name="save" id="save" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="Update" data-original-title="Update"><span style="color:#fff;">
           <i class="fa fa-fw fa-check"></i>Update 
        </span>  
        </button>
      </div>
    </div>
        </form>
        </div>
      </div>
      
</div>


<?php 
$datenew=date("Y-m-d");
if (isset($_POST['save'])) {
         $oldpaid = $_POST['oldpaid'];
         $olddue =  $_POST['olddue'];
         $paidnew = $_POST['paidnew'];
         $duenew =  $_POST['duenew'];
        $paidfinal= $paidnew+$oldpaid;
      
$query ="UPDATE `patient_payment` SET `paid`='$paidfinal',
`dues`='$duenew',`updated_at`='$datenew' WHERE id='$pid' ";
    $result = mysqli_query($connection, $query);
       $username= $_SESSION['username'];

$payment2="INSERT INTO patient_payment_history
          (`p_id`,`userName`,`grand`,`paid`,`dues`,`total`,`created_at`)
   VALUES('$p_id','$username','$grand','$paidnew','$duenew','$total','$date')";
 mysqli_query($connection,$payment2);
        

// $que6="UPDATE profit SET debit = '$paidfinal', credit = '$duenew'  WHERE purchase_id='$profit_id' ";

//   $res5=mysqli_query($connection,$que6);


echo' <script>window.location.href = "dues_patient_report.php";</script>';


   }
?>
                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

        <!-- footer -->

        

<script type="text/javascript">
  $("#paidnew").keyup(function(){
var dueold= $('#olddue').val();
var paid=$('#paidnew').val();
 var due = dueold - paid;
 $('#duenew').val(due);
  });
</script>

