<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white"> PATIENT TEST LIST</h4>
</div>


            	<div class="col-lg-12">
<div class="panel ">

<div class="panel-body">
<div class="table-responsive">
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
        <a href="patient_test_result.php?id=<?php echo $pid;?>&testid=<?php echo $row['test_id'];?>&date=<?php echo $row['created_at'];?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Test Result"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-edit"></i>Test Result
        </span>  
        </a>
      </div>
    </td>
		</tr>

		
		
<?php } } } ?>


	</tbody>


</table>

	<div class="card-footer">
<a href="patient_list.php" class="btn btn-responsive button-alignment btn-primary" data-toggle="tooltip" title="" data-original-title="Back"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>
			</div>


</div>
</div>
</div>
</div>









                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

       
