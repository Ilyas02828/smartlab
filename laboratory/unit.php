<?php include 'includes/connect.php'; ?>
<?php include 'includes/header.php'; ?>
        <!-- End Topbar header -->
  
<?php include 'includes/sidebar.php'; ?>

        <!-- End Left Sidebar   -->

      
        <div class="page-wrapper">
            <div class="container-fluid">




<form action="" method="post">
    <div class="card-body">
        <h4 class="card-title">ADD UNITS</h4>
    </div>
    <hr>
    <div class="form-body">
        <div class="card-body">
    <div class="row" id="new_row">
      <div class="col-md-12" id="row1" style="border-bottom: solid 1px;">

        <input type="hidden"  name="row[]" value="1" id="total_fields">

            <div class="row pt-3">
               
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label"> Test Unit</label>
                        <input type="text" name="testunit[]" id="testunit1" class="form-control form-control-danger" placeholder="">
                         </div>
                </div>

                
                 


<div class="col-md-2">
<div class="form-group">
<button type="button" onclick="add_row();" class="btn btn_3d btn-primary pull-right btn-icon  btn-round m-r-50"><i class="icon fa fa-plus" aria-hidden="true"></i></button>
</div>
</div>
 
</div>

            <!--/row-->
   </div>
          </div>
      </div>
        </div>
        <div class="form-actions">
            <div class="card-body">
                <button type="submit" class="btn btn-success" name="save"> <i class="fa fa-check"></i> Submit</button>
                <button type="button" class="btn btn-dark">Cancel</button>
            </div>
</div>
</form>


                
            </div>
        </div>


<?php include 'includes/footer.php'; ?>

        <!-- footer -->


           <script type="text/javascript">
  var count=0;
var count=$('#total_fields').val();
    function add_row() {
        count++;

   $.ajax({
      url:'ajax_test_unit.php',
      type:'get',
      data:{'count':count},
      
      success(data){
      $('#new_row').append(data);
      }
   });
}

 function remove_item(id){
        var div = '#row'+id;
        $(div).remove();
    }

</script>

<?php
if (isset($_POST['save'])) {
	  // $=$_POST[''][$i];
	$count=count($_POST['row']);

	  for ($i=0; $i < $count ; $i++) { 

	  	$query="INSERT INTO `unit`( `t_unit`) 
       VALUES ( '".$_POST['testunit'][$i]."' )";
$result=mysqli_query($connection,$query);
  }

}
?>
