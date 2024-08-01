
<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white">Equipment List Edit</h4>
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
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter=0;
		if(isset($_GET['id'])){
		$getid=$_GET['id'];
	       $query1=mysqli_query($connection,"SELECT * FROM eqiupment WHERE test_id='$getid'");
	       $num=mysqli_num_rows($query1);
           while ($row1=mysqli_fetch_array($query1)) {

	       $name=$row1['equip'];
	       $rangi=$row1['unit'];
	       

           $counter++;

		?>
		<input type="hidden" name="hidid[]"  value="<?php echo $row1['id']; ?>">
		<tr>
		<td><?php echo $counter; ?></td>
		<td><input type="text" class="form-control" name="name[]" id="name" value="<?php echo $name;?>"></td>
		<td><input type="text" class="form-control" name="range[]" id="range" value="<?php echo $rangi;?>"></td>
		<td><a href="equipment_list_edit.php?main_id=<?php echo $getid;?>&sub_id=<?php echo $row1['id']; ?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="delete"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-trash"></i>
        </span>  
        </a></td>
		</tr>
	
<?php } }  ?>
	</tbody>
</table>

			<div class="form-actions" >
			<div class="card-footer">
 <a href="equipment_list.php"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="Back"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-arrow-left"></i>Back
        </span>  
        </a>
  <button  type="submit" name="save" class="btn btn-responsive button-alignment btn-success" data-toggle="tooltip" title="" data-original-title="Submit"><span style="color:#fff;">
        	 <i class="fa fa-fw fa-check"></i>Submit 
        </span>  
        </button>


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
if(isset($_GET['id'])){
		$getid=$_GET['id'];
 }

if (isset($_POST['save'])) {
 for ($i=0; $i < $num ; $i++) {
 	$name=$_POST['name'][$i];
 	$range=$_POST['range'][$i];
 	
 	$hidid=$_POST['hidid'][$i];

 $query="UPDATE `eqiupment` SET `equip`='$name',`unit`='$range' 
             WHERE `id`='$hidid' AND `test_id`='$getid' ";
 $result=mysqli_query($connection,$query);
	
}

}
   ?>

<?php
if(isset($_GET['main_id']) AND isset($_GET['sub_id'])){
	 	 $mainid=$_GET['main_id'];
		    $subid=$_GET['sub_id'];

		$query1="DELETE FROM `eqiupment` WHERE `id`='$subid' AND  `test_id`='$mainid'";
        $result1=mysqli_query($connection,$query1);

if ($result1) {
echo "<script>window.open('equipment_list_edit.php?id=".$mainid."','_self')</script>";
	}

 }
?>