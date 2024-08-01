<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white">TODAY PATIENTS LIST </h4>
</div>


<div class="col-lg-12">
<div class="panel ">

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="example1">
	<thead>
    <tr class="bg-primary">
		<th>#</th>
		<th>Name</th>
		<th>Contact</th>
		<th>Address </th>
		<th>Gender</th>
		<th>Age</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter=0;
		$today=date('Y-m-d');
$query=mysqli_query($connection,"SELECT * FROM patient WHERE created_at='$today' 
  ORDER BY created_at DESC ");
while ($row=mysqli_fetch_array($query)) {
	       $pname=$row['name'];
           $pcontact=$row['contact'];
           $paddress=$row['address'];
           $pgender=$row['gender'];
           $page=$row['age'];
           $counter++;

		?>
		<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $pname; ?></td>
		<td><?php echo $pcontact; ?></td>
		<td><?php echo $paddress; ?></td>
		<td><?php echo $pgender; ?></td>
		<td><?php echo $page; ?></td>
		<td class="text-center">
      <div class="btn-group">
        <a href="patient_test_list.php?id=<?php echo $row['id'];?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Test List"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-edit"></i>Tests List
        </span>  
        </a>
      </div>
    </td>
		</tr>
<?php } ?>
	</tbody>


</table>
</div>
</div>
</div>
</div>





                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

        <!-- footer -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>