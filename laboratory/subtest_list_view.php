<?php
if(isset($_GET['id'])){
		$getid=$_GET['id'];?>
<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
<?php include 'includes/sidebar.php'; ?>
        <!-- End Left Sidebar   -->
        <div class="page-wrapper">
            <div class="container-fluid">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white"> View Test Information</h4>
</div>
<form method="post" action="">
            	<div class="col-lg-12">
<div class="panel ">

<?php
	       $query3=mysqli_query($connection,"SELECT main_test.title,specimen.speci,main_test.cost
	        FROM main_test 
	        INNER JOIN specimen ON specimen.id=main_test.specimen
	        WHERE main_test.id='$getid'");
           while ($row3=mysqli_fetch_array($query3)) {
	       $title=$row3['title'];
	       $specimen=$row3['speci'];
	       $cost=$row3['cost'];   } ?>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr class="bg-primary">
		<th>Test</th>
		<th>Specimen</th>
		<th>Cost</th>		
		</tr>
		
	</thead>
	<tbody>
		<tr>
		<td><?php echo $title; ?></td>
		<td><?php echo $specimen; ?></td>
		<td><?php echo $cost; ?></td>
		</tr>
	</tbody>
</table>


<div class="panel-body">
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
		<tr class="bg-primary">
		<th>#</th>
		<th>Sub Test</th>
		<th>Range</th>
		
		<th>Unit</th>
		
		</tr>
		
	</thead>
	<tbody>
		<?php
		$counter=0;
	       $query1=mysqli_query($connection,"SELECT * FROM sub_test WHERE test_id='$getid'");
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
		
		<td><?php echo $unit; ?></td>
		

		</tr>
	
<?php }   ?>


	</tbody>




</table>

			<div class="form-actions" >
			<div class="card-footer">
 
<a href="test_list_view.php"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Back"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>


  <button  type="submit" name="save" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="" data-original-title="Submit"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-check"></i>Submit 
        </span>  
        </button>

<a href="subtest_list_edit.php?id=<?php echo $getid; ?>"  class="btn btn-responsive button-alignment btn-warning"data-toggle="tooltip" title="Edit"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-edit"></i>Edit
        </span>  
        </a>



			</div>
			</div>

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
$query="INSERT INTO result( `p_id`, `main_test_id`, `sub_test_id`, `result`, `created_at`)
                     values('$getid','$testid','$hidid','$result','$date') ";
 $result=mysqli_query($connection,$query);
 if ($result) {
 	echo " <script> window.open('print_result_invoice.php?id=$getid ');  </script>  ";
 }
	
}




}
?>

<?php }   ?>