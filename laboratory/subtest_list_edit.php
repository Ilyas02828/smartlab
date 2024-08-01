

<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">
<div class="card-header bg-info">
    <h4 class="mb-0 text-white"> Edit Test Information</h4>
</div>

<form method="post" action="">
 <div class="col-lg-12">
<div class="panel ">

<?php
if(isset($_GET['id'])){
		$getid=$_GET['id'];

	       $query3=mysqli_query($connection,"SELECT * FROM main_test WHERE id='$getid'");
           while ($row3=mysqli_fetch_array($query3)) {
	       $title=$row3['title'];
	       $specimen=$row3['specimen'];
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
		<td><input type="text" name="maintestname" class="form-control" value="<?php echo $title; ?>"></td>
		<td>   <select class="form-control"  name="maintestspeci" required>
                            <option>SELECT</option>
                             <?php
                                          $getname="SELECT * FROM specimen";
                                         $var= mysqli_query($connection,$getname);
                                          while($row=mysqli_fetch_array($var)){
                                          $spec=$row['speci'];  
                                          $id=$row['id'];  
                                    ?>
                                        <option value="<?php echo $id;?>"><?php echo $spec;?></option>
                                      <?php } ?>
                          

                           </select></td>
		<td><input type="text" name="maintestcost" class="form-control" value="<?php echo $cost; ?>"></td>
		</tr>
	</tbody>
</table>
<?php } ?>


<div class="panel-body">
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
		<tr class="bg-primary">
		<th>#</th>
		<th>Sub Test</th>
		<th>Range</th>
		<th>Unit</th>
		<th>Action</th>
		</tr>
		
	</thead>
	<tbody>
		<?php
		$counter=0;
		if(isset($_GET['id'])){
		$getid=$_GET['id'];

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
		<td><input type="text" name="name[]" class="form-control" id="name" value="<?php echo $name;?>"></td>
		<td><input type="text" name="range[]" class="form-control" id="range" value="<?php echo $rangi;?>"></td>
		<td><input type="text" name="unit[]" class="form-control" id="unit" value="<?php echo $unit;?>"></td>

		<td><a href="subtest_list_edit.php?main_id=<?php echo $getid;?>&sub_id=<?php echo $row1['id']; ?>"  class="btn btn-responsive button-alignment btn-primary"data-toggle="tooltip" title="delete"><span style="color:#fff;"  >
        	 <i class="fa fa-fw fa-trash"></i>
        </span>  
        </a></td>
		</tr>
	
<?php }  } ?>
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
   $maintestname=$_POST['maintestname'];
   $maintestspeci=$_POST['maintestspeci'];
   $maintestcost=$_POST['maintestcost'];

 $query4="UPDATE `main_test` SET `title`='$maintestname',`specimen`='$maintestspeci',`cost`='$maintestcost' 
             WHERE `id`='$getid'  ";
 $result4=mysqli_query($connection,$query4);

 for ($i=0; $i < $num ; $i++) {
 	$name=$_POST['name'][$i];
 	$range=$_POST['range'][$i];
 	$unit=$_POST['unit'][$i];
 	$hidid=$_POST['hidid'][$i];

 $query="UPDATE `sub_test` SET `name`='$name',`rangi`='$range',`unit`='$unit' 
             WHERE `id`='$hidid' AND `test_id`='$getid' ";
 $result=mysqli_query($connection,$query);
	
}

}


?>






<?php
if(isset($_GET['main_id']) AND isset($_GET['sub_id'])){
	 	 $mainid=$_GET['main_id'];
		    $subid=$_GET['sub_id'];

		$query1="DELETE FROM `sub_test` WHERE `id`='$subid' AND  `test_id`='$mainid'";
        $result1=mysqli_query($connection,$query1);

if ($result1) {
echo "<script>window.open('subtest_list_edit.php?id=".$mainid."','_self')</script>";
	}

 }
?>
