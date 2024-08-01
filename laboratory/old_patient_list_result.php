<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">PRINT PATIENT TEST RESULT</h4>
</div>

            	<div class="col-lg-12">
<div class="panel ">

<div class="panel-body">
<div class="table-responsive">
	<form method="post">
<table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
		<tr class="bg-primary">
		<th>#</th>
		<th>Main test</th>
		<th>Specimen</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php

if (isset($_GET['id'])) {
  	$pid=$_GET['id'];
 

		$counter=0;
$query=mysqli_query($connection,"SELECT * FROM patient_test WHERE pid='$pid'");
while ($row=mysqli_fetch_array($query)) {
	       $pid=$row['pid'];
	       $testid=$row['test_id'];

	       $query1=mysqli_query($connection,"SELECT * FROM main_test WHERE id=$testid");
while ($row1=mysqli_fetch_array($query1)) {
	       $title=$row1['title'];
	       $specimen=$row1['specimen'];
	       $cost=$row1['cost'];
           $counter++;
		?>
		<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $title; ?></td>
		<td><?php echo $specimen; ?></td>
		

		<td class="text-center">
      <div class="btn-group">
        <a href="print_result_invoice.php?id=<?php echo $pid;?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Print"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-edit"></i>Print Result
        </span>  
        </a>
        </div>
         <input type="hidden" name="patient_id[]" value="<?php echo $pid;?>">
      <div class="btn-group">
      	<label for="vehicle1"> Customise Print</label>
   
     <input type="checkbox" class="form-control" name="checkme[]"  value="<?php echo $testid;?>">
      </div>
    </td>
		</tr>

		
		
<?php } } } ?>
	</tbody>
</table>

	<div class="card-footer">
<a href="old_patient_list.php" class="btn btn-responsive button-alignment btn-primary" data-toggle="tooltip" title="" data-original-title="Back"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>


        <button  type="submit" name="multiplePrint" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="" data-original-title="Multiple"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-check"></i>Multiple Print 
        </span>  
        </button>
        <button  type="submit" name="PadPrint" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="" data-original-title="Pad"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-check"></i>Pad Print 
        </span>  
        </button>
			</div>

</form>
</div>
</div>
</div>
</div>









                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

       
<?php
if (isset($_POST['multiplePrint'])) {

$Maintest_id= $_POST['checkme'];
$patient_id= $_POST['patient_id'];
// print_r($patient_id);

$patient_array=urlencode(serialize($patient_id));
$test_array=urlencode(serialize($Maintest_id));

echo "<script>window.open('multiple_print.php?print_result_invoice=".$test_array."&Patient_ids=".$patient_array."')</script>";


}


if (isset($_POST['PadPrint'])) {

$Maintest_id= $_POST['checkme'];
$patient_id= $_POST['patient_id'];
// print_r($patient_id);

$patient_array=urlencode(serialize($patient_id));
$test_array=urlencode(serialize($Maintest_id));

echo "<script>window.open('pad_print.php?Main_test_ids=".$test_array."&Patient_ids=".$patient_array."')</script>";


}

?>
