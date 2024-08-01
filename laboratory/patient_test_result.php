<?php
if(isset($_GET['id']) AND isset($_GET['testid']) AND isset($_GET['date'])){
 include 'includes/connect.php';
 include 'includes/header.php';
 include 'includes/sidebar.php'; 
 ?>

        <!-- End Left Sidebar   -->
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">UPLOAD PATIENT TEST RESULT</h4>
</div>

<form method="post" action="">
            	<div class="col-lg-12">
<div class="panel ">

<div class="panel-body">
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
		<tr class="bg-primary">
		<th>#</th>
		<th>Sub Test</th>
		<th>Range</th>
		<th>Result</th>
		<th>Unit</th>
		</tr>
		
	</thead>
	<tbody>
		<?php
		
		$getid=$_GET['id'];
		$testid=$_GET['testid'];
		$date=$_GET['date'];
		
		$counter=0;
	       $query1=mysqli_query($connection,"SELECT * FROM sub_test WHERE test_id='$testid'");
	       $num=mysqli_num_rows($query1);
           while ($row1=mysqli_fetch_array($query1)) {

	       $name=$row1['name'];
	       $rangi=$row1['rangi'];
	       $unit=$row1['unit'];

           $counter++;

		?>
		<input type="hidden" name="hidid[]"  value="<?php echo $row1['id']; ?>">
		<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $name; ?></td>
		<td><?php echo $rangi; ?></td>
		<td><input type="text" name="result[]" class="form-control" id="result"></td>
		<td><?php echo $unit; ?></td>

		</tr>
	
<?php }   ?>


	</tbody>




</table>

			<div class="form-actions">
			<div class="card-footer">
<a href="patient_test_list.php?id=<?php echo $getid;?>" class="btn btn-responsive button-alignment btn-primary" data-toggle="tooltip" title="" data-original-title="Back"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>

   <button  type="submit" name="save" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="" data-original-title="Submit"><span style="color:#fff;"><i class="fa fa-fw fa-check"></i>Submit 
        </span>  
        </button></div></div>

</form>


</div>
</div>
</div>
</div>
                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

        <!-- footer -->

<?php 

if (isset($_POST['save'])) {	

 for ($i=0; $i < $num ; $i++) {
 	$result=$_POST['result'][$i];
 	$hidid=$_POST['hidid'][$i];
$query="INSERT INTO result( `p_id`, `main_test_id`, `sub_test_id`, `result`, `created_at`) values('$getid','$testid','$hidid','$result','$date') ";
 $result=mysqli_query($connection,$query);
}

 if ($result) {
 	echo " <script> window.open('print_result_invoice.php?id=$getid');  </script>  ";
 }



}
?>

<?php }   ?>