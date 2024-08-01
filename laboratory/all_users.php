<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">All User List</h4>
</div>

            	<div class="col-lg-12">
<div class="panel ">

<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
		<tr class="bg-primary">
		<th>#</th>
		<th>User Name</th>
		<th>Email</th>
		<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter=0;
$query1=mysqli_query($connection,"SELECT * FROM user ");
while ($row1=mysqli_fetch_array($query1)) {
	       $username=$row1['username'];
	       $email=$row1['email'];
           $counter++;
		?>
		<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $username; ?></td>
		<td><?php echo $email; ?></td>
		

		<td class="text-center">
      <div class="form-group">
<a href="user_delete.php?id=<?php echo $row1['id'];?>" type="button" class="btn btn_3d btn-primary pull-right btn-icon  btn-round m-r-50"><i class="fa fa-trash"></i></a>
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









                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

       
