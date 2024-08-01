<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>
all_users
        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">

<div class="card-header bg-info">
    <h4 class="mb-0 text-white">Main Test List</h4>
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
		<th class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter=0;
$query1=mysqli_query($connection,"SELECT * FROM main_test ");
while ($row1=mysqli_fetch_array($query1)) {
	       $title=$row1['title'];
	       $specimen=$row1['specimen'];
	       $cost=$row1['cost'];
           $counter++;
		?>
		<tr>
		<td><?php echo $counter; ?></td>
		<td><?php echo $title; ?></td>
		

		<td class="text-center">
      <div class="btn-group">
        <a href="subtest_list_view.php?id=<?php echo $row1['id'];?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="View"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-eye"></i>View
        </span>  
        </a>
    </div>
    <div class="btn-group">

         <a href="subtest_list_edit.php?id=<?php echo $row1['id'];?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Edit"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-edit"></i>Edit
        </span>  
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









                
            </div>
        </div>
<?php include 'includes/footer.php'; ?>

       
